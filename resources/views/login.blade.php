@extends('master')
@section('title', 'Log In - Kabar Burung')

@section('body')
<div class="row justify-content-center my-5">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white text-center py-3">
                <h4 class="mb-0 fw-bold">Log In Admin</h4>
            </div>
            <div class="card-body p-4">
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-bold">Email</label>
                        <input type="email" name="email" class="form-control" required placeholder="nama@email.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Password</label>
                        <input type="password" name="password" class="form-control" required placeholder="******">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold">Masuk</button>
                </form>
                
                <div class="text-center mt-3">
                    <p class="small text-muted mb-0">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
                    <a href="{{ url('/') }}" class="d-block small mt-2">← Kembali ke Portal</a>
                </div>
            </div>
        </div>
    </div>
</div>
@stop