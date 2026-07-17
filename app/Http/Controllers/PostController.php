<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function home()
    {
        $posts = Post::latest()->get();
        return view('welcome', compact('posts'));
    }

    public function index()
    {
        $posts = Post::latest()->get();
        return view('post_index', compact('posts'));
    }

    public function create()
    {
        return view('post_create');
    }


    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required|string',
        'content' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $post = new Post();
    $post->title = $request->title;
    $post->content = $request->content;
    $post->published = true;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('posts', 'public');
        $post->image = $imagePath;
    }

    $post->save();

    return redirect()->route('post.index')->with('success', 'Berita berhasil ditambahkan.');
}

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post_show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post_edit', compact('post'));
    }

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
    if ($request->hasFile('image')) {
        
        if ($post->image) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($post->image);
        }
        $imagePath = $request->file('image')->store('posts', 'public');
        $post->image = $imagePath;
    }

    $post->save();

    return redirect()->route('post.index')->with('success', 'Berita berhasil diperbarui.');
}

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Berita berhasil dihapus.');
    }
}