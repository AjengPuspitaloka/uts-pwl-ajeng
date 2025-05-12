@extends('layout') {{-- Ganti jika ada layout khusus admin --}}

@section('content')
<div class="container mt-4">
    <h2 class="text-center text-pink mb-2" style="color: #d63384;">Dashboard Admin Pengaduan PLN</h2>
    <div class="text-center mb-4">
        <span class="text-muted">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y - H:i') }}</span>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered bg-light shadow-sm">
            <thead class="table-dark text-center">
                <tr>
                    <th>Nama</th>
                    <th>Isi Pengaduan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pengaduan as $p)
                    <tr>
                        <td>{{ $p->nama }}</td>
                        <td>{{ $p->isi }}</td>
                        <td class="text-center">
                            @php
                                $warna = [
                                    'belum' => 'danger',
                                    'sedang' => 'warning',
                                    'selesai' => 'success',
                                ];
                            @endphp
                            <span class="badge bg-{{ $warna[$p->status] ?? 'secondary' }}">
                                {{ ucfirst($p->status) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('pengaduan.update', $p->id) }}" method="POST" class="d-flex align-items-center gap-2">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm">
                                    <option value="belum" {{ $p->status === 'belum' ? 'selected' : '' }}>Belum</option>
                                    <option value="sedang" {{ $p->status === 'sedang' ? 'selected' : '' }}>Sedang Dikerjakan</option>
                                    <option value="selesai" {{ $p->status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Tidak ada data pengaduan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
