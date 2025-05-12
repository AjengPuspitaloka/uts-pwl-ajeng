@extends('layout')

@section('content')
<div class="container">
    <h2>Edit Pengaduan</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong><br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pengaduan.update', $pengaduan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="string" name="nama" class="form-control" value="{{ old('nama', $pengaduan->nama) }}" required>
        </div>

        <div class="form-group mt-3">
            <label for="isi">Isi Pengaduan:</label>
            <textarea name="isi" class="form-control" rows="5" required>{{ old('isi', $pengaduan->isi) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
        <a href="{{ route('pengaduan.index') }}" class="btn btn-secondary mt-3">Batal</a>
    </form>
</div>
@endsection
