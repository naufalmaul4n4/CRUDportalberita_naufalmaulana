@extends('master')
@section('title', 'Edit Berita')

@section('body')
<div class="row justify-content-center my-5">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-warning text-white"><h5>Edit Konten Berita</h5></div>
            <div class="card-body">
                <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label class="form-label fw-bold">Judul Berita</label>
        <input type="text" name="title" value="{{ $post->title }}" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">Isi Konten Berita</label>
        <textarea name="content" rows="6" class="form-control" required>{{ $post->content }}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label fw-bold">Ubah Gambar Berita</label>
        @if($post->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $post->image) }}" width="150" class="img-thumbnail d-block">
                <small class="text-muted">Gambar saat ini</small>
            </div>
        @endif
        <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ route('post.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-warning text-white">Perbarui Berita</button>
    </div>
</form>
            </div>
        </div>
    </div>
</div>
@stop