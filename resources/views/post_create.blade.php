@extends('master')
@section('title', 'Tambah Berita Baru')

@section('body')
<div class="row justify-content-center my-5">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white"><h5>Tambah Berita Baru</h5></div>
            <div class="card-body">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                 <div class="mb-3">
                    <label class="form-label fw-bold">Judul Berita</label>
                    <input type="text" name="title" class="form-control" required>
                 </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Isi Konten Berita</label>
                <textarea name="content" rows="6" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Upload Gambar Berita</label>
                <input type="file" name="image" class="form-control" accept="image/*">
    </div>
    <div class="d-flex justify-content-between">
        <a href="{{ route('post.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-success">Simpan Berita</button>
    </div>
</form>
            </div>
        </div>
    </div>
</div>
@stop