@extends('master')
@section('title', 'Kabar Burung - Portal Berita')

@section('body')
<div class="d-flex justify-content-between align-items-center my-4 pb-2 border-bottom">
    <h1 class="fw-bold text-primary">Kabar Burung</h1>
    <div>
        @if (Route::has('login'))
            @auth
                <a href="{{ route('post.index') }}" class="btn btn-success me-2">Kelola CRUD Admin</a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Keluar</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-primary me-2">Log In</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                @endif
            @endauth
        @endif
    </div>
</div>

<div class="row">
    @forelse($posts as $post)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Gambar Berita" style="height: 200px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold">{{ $post->title }}</h5>
                    <p class="card-text text-muted small">Diposting pada: {{ $post->created_at->format('d M Y') }}</p>
                    <p class="card-text flex-grow-1">{{ Str::limit($post->content, 120, '...') }}</p>
                    
                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center my-5">
            <p class="text-muted fs-5">Belum ada berita yang diterbitkan saat ini.</p>
        </div>
    @endforelse
</div>
@stop