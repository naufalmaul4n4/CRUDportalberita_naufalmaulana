@extends('master')
@section('title', 'Daftar Akun - Kabar Burung')

@section('body')
<div class="row justify-content-center my-5">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-header bg-success text-white text-center py-3">
                <h4 class="mb-0 fw-bold">Daftar Akun Baru</h4>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" required placeholder="Masukkan nama...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" required placeholder="nama@email.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password</label>
                        <input type="password" name="password" class="form-control" required placeholder="******">
                    </div>
                    <button type="submit" class="btn btn-success w-100 py-2 fw-bold">Daftar Sekarang</button>
                </form>
                
                <div class="text-center mt-3">
                    <p class="small text-muted mb-0">Sudah punya akun? <a href="{{ route('login') }}">Log In di sini</a></p>
                    <a href="{{ url('/') }}" class="d-block small mt-2">← Kembali ke Portal</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop