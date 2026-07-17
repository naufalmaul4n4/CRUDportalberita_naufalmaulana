<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // Menampilkan halaman depan (Landing Page Kartu Berita)
    public function home()
    {
        $posts = Post::latest()->get();
        return view('welcome', compact('posts'));
    }

    // [READ - INDEX] Menampilkan Tabel Manajemen Berita Admin
    public function index()
    {
        $posts = Post::latest()->get();
        return view('post_index', compact('posts'));
    }

    // [CREATE - Halaman Form] Menampilkan form tambah berita baru
    public function create()
    {
        return view('post_create');
    }

    // [CREATE - Proses Simpan] Memasukkan data ke database
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Membuat objek Post baru secara manual agar pasti berhasil masuk database
    $post = new Post();
    $post->title = $request->title;
    $post->content = $request->content;
    $post->published = true; // Otomatis diset aktif agar tidak memicu error published vacant

    // Cek jika ada file gambar yang diunggah
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts', 'public');
        $post->image = $imagePath;
    }

    $post->save(); // Simpan ke database

    return redirect()->route('post.index')->with('success', 'Berita berhasil ditambahkan.');
}

    // [READ - DETAIL] Menampilkan seluruh konten isi berita saat diklik
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post_show', compact('post'));
    }

    // [UPDATE - Halaman Form] Menampilkan form edit berita
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post_edit', compact('post'));
    }

    // [UPDATE - Proses Simpan] Mengubah isi konten berita di database
    public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $post = Post::findOrFail($id);
    $post->title = $request->title;
    $post->content = $request->content;

    // Cek jika user mengunggah gambar baru
    if ($request->hasFile('image')) {
        // Hapus gambar lama dari penyimpanan jika ada
        if ($post->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($post->image);
        }
        // Simpan gambar baru
        $imagePath = $request->file('image')->store('posts', 'public');
        $post->image = $imagePath;
    }

    $post->save(); // Simpan perubahan ke database

    return redirect()->route('post.index')->with('success', 'Berita berhasil diperbarui.');
}

    // [DELETE] Menghapus keseluruhan dari satuan berita
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Berita berhasil dihapus.');
    }
}