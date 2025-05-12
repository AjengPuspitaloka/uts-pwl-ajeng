@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();  // Ambil data user dari session
@endphp

@extends('layout')

@section('content')
    <div class="d-flex justify-content-center align-items-center" style="min-height: 80vh; background: linear-gradient(135deg, #f8cdda, #f2a6c0);">
        <div class="card shadow-lg p-4" style="max-width: 700px; width: 100%; background-color: #fff0f5; border-radius: 20px; border: none;">
            <h2 class="mb-4 text-center" style="color: #d63384;">Profil</h2>
            <div class="d-flex flex-column flex-md-row align-items-center">
                {{-- Foto Profil --}}
                @if(session('avatar'))
                    <img src="{{ asset('avatars/' . session('avatar')) }}" alt="Foto Profil" 
                        class="rounded-circle mb-3 mb-md-0 me-md-4 shadow" 
                        style="width: 130px; height: 130px; object-fit: cover; border: 4px solid #f8bbd0;">
                @else
                    <img src="{{ asset('avatars/admin.jpg') }}" alt="Foto Admin" 
                        class="rounded-circle mb-3 mb-md-0 me-md-4 shadow" 
                        style="width: 130px; height: 130px; object-fit: cover; border: 4px solid #f8bbd0;">
                @endif

                <div>
                    <p class="mb-2"><strong style="color: #d63384;">Nama:</strong> {{ session('name') ?? $user->name ?? 'Ajeng Puspitaloka' }}</p>
                    <p class="mb-2"><strong style="color: #d63384;">Username:</strong> {{ session('username') ?? $user->username ?? 'ajenggpl' }}</p>
                    <p class="mb-3"><strong style="color: #d63384;">Email:</strong> {{ $user->email ?? 'ajeng@pln.co.id' }}</p>

                    <a href="{{ route('profil.edit') }}" class="btn btn-secondary">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
@endsection
