@extends('master')
@section('title', $post->title)

@section('body')
<div class="row justify-content-center my-5">
    <div class="col-md-8">
        <a href="{{ url('/') }}" class="btn btn-outline-secondary mb-4">← Kembali ke Portal</a>
        
        <h1 class="fw-bold text-dark mb-2">{{ $post->title }}</h1>
        <p class="text-muted small mb-4">Diposting pada: {{ $post->created_at->format('d M Y H:i') }} WIB</p>
        
    
        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="Gambar Berita" style="height: 200px; object-fit: cover;">    
        <div class="fs-5 text-secondary lh-lg" style="text-align: justify; white-space: pre-line;">
            {{ $post->content }}
        </div>
    </div>
</div>
@endsection