@extends('master')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-4">
        <h2 class="fw-bold text-dark">Dashboard Berita</h2>
        
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
    @csrf
    <button type="submit" class="btn btn-danger btn-sm fw-semibold">
        Keluar
    </button>
</form>
    </div>

    <div class="alert alert-info py-3 mb-4">
        Selamat datang, <strong class="text-dark">{{ Auth::user()->name }}</strong>! Anda berhasil masuk ke area internal.
    </div>

    <div class="row g-4">
        @forelse($posts as $post)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm border-0 overflow-hidden">
                    @if($post->image)
                        <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}" style="height: 180px; object-fit: cover;">
                    @endif
                    <div class="card-body flex-column d-flex justify-content-between">
                        <div>
                            <span class="badge bg-primary text-uppercase mb-2" style="font-size: 0.75rem;">
                                {{ $post->category }}
                            </span>
                            <h5 class="card-title fw-bold text-dark mb-2">{{ $post->title }}</h5>
                            <p class="card-text text-muted small">
                                {{ Str::limit($post->content, 110, '...') }}
                            </p>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent border-top-0 pt-0 pb-3 px-3 d-flex justify-content-between align-items-center text-muted small">
                        <span>Oleh: <strong>{{ $post->publisher }}</strong></span>
                        <small>{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-warning text-center py-4">
                    Koneksi berhasil, namun data berita di dalam database masih kosong.
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection