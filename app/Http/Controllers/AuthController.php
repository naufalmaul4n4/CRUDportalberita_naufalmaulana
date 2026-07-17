<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. Menampilkan Halaman Formulir Login
    public function showLogin()
    {
        return view('login');
    }

    // 2. Memproses Data Input saat Tombol "Masuk" Ditekan
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Jika email & password cocok dengan database, masukkan pengguna ke dalam sistem
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // PENTING: Dialihkan langsung menuju halaman Dashboard CRUD Kelola Berita
            return redirect()->route('post.index');
        }

        // Jika salah, kembalikan ke halaman login dengan pesan peringatan
        return back()->with('error', 'Email atau Password yang Anda masukkan salah.');
    }

    // 3. Menampilkan Halaman Formulir Register Akun
    public function showRegister()
    {
        return view('register');
    }

    // 4. Memproses Data Input saat Tombol "Daftar Sekarang" Ditekan
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        // Membuat data akun user baru ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password demi keamanan
        ]);

        // Setelah mendaftar, otomatis buat user berstatus log in
        Auth::login($user);

        // Langsung dialihkan ke halaman dashboard CRUD Kelola Berita
        return redirect()->route('post.index');
    }

    // 5. Memproses Tombol Keluar (Logout)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Dikembalikan ke halaman portal berita utama terluar
        return redirect('/');
    }
}