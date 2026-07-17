@extends('master')
@section('title', 'Dashboard CRUD Admin')

@section('body')
<div class="d-flex justify-content-between align-items-center my-4">
    <h2>Dashboard Kelola Berita (CRUD)</h2>
    <div>
        <a href="{{ url('/') }}" class="btn btn-outline-secondary me-2">← Lihat Portal</a>
        <a href="{{ route('post.create') }}" class="btn btn-success">+ Tambah Berita Baru</a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered table-striped mt-3">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Judul Berita</th>
            <th>Tanggal Dibuat</th>
            <th width="300px">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($posts as $index => $post)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at->format('d M Y') }}</td>
            <td>
                <a href="{{ route('post.show', $post->id) }}" class="btn btn-info btn-sm text-white">Detail</a>

                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>

                <form action="{{ route('post.destroy', $post->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="4" class="text-center text-muted">Belum ada berita. Silakan klik tombol Tambah Berita.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@stop