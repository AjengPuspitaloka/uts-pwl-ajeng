@extends('layout')

@section('content')
<div class="container">
    <h2 class="text-center text-pink mb-4">Tambah Pengaduan</h2>

    <form action="{{ route('pengaduan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi Pengaduan</label>
            <textarea name="isi" class="form-control" rows="4" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
