<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

// Tampilan Halaman Depan Terbuka (Portal Berita Utama)
Route::get('/', [PostController::class, 'home'])->name('news.home');

// Proses Autentikasi Tugas Sebelumnya (Login/Register)
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Proteksi Fitur CRUD Admin (Hanya Bisa Diakses Setelah Login)
Route::middleware('auth')->group(function () {
    Route::resource('post', PostController::class);
});