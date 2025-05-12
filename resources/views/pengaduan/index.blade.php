@extends('layout')

@section('content')
    <h2 class="text-center text-pink mb-2" style="color: #d63384;">Dashboard User Pengaduan PLN</h2>
<div class="text-center mb-4">
    <span class="text-muted">{{ \Carbon\Carbon::now()->format('l, d F Y - H:i') }}</span>
</div>

<!-- Tombol Tambah -->
<div class="mb-3">
    <a href="{{ route('pengaduan.create') }}" class="btn btn-primary">+ Tambah Pengaduan</a>
</div>

<!-- Tabel Pengaduan -->
<table class="table table-bordered mt-3 bg-light shadow" style="background-color: #f8d9e6;">
    <thead class="table-dark">
        <tr>
            <th>Nama</th>
            <th>Isi Pengaduan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pengaduan as $p)
            <tr>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->isi }}</td>
                <td>
                    <!-- Tombol Edit -->
                    <a href="{{ route('pengaduan.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>

                    <!-- Tombol Hapus -->
                    <form action="{{ route('pengaduan.destroy', $p->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Iklan Berjalan -->
<div class="marquee-container mt-5">
    <div class="marquee">
        <span><strong>Promo Terbaru!</strong> Dapatkan diskon 20% untuk tagihan listrik Anda bulan ini! Cek info lebih lanjut di website kami. <strong>Segera daftarkan diri Anda sekarang!</strong></span>
    </div>
</div>
@endsection

@section('styles')
<style>
    .marquee-container {
        width: 100%;
        overflow: hidden;
        background-color: #f8d9e6;
        padding: 10px 0;
    }
    .marquee {
        display: inline-block;
        white-space: nowrap;
        animation: marquee 15s linear infinite;
        font-size: 18px;
        color: #d63384;
        font-weight: bold;
    }
    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
</style>
@endsection
