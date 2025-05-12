@php
    use Illuminate\Support\Facades\Auth;
@endphp

@extends('layout')

@section('content')

<form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" style="background-color: #f8e0e6; padding: 20px; border-radius: 10px;">
    @csrf
    @method('PUT') <!-- This is required to send a PUT request for updating -->

    <div class="text-center mb-3">
        @if ($user->avatar)
            <img src="{{ asset('avatars/' . $user->avatar) }}" class="rounded-circle mb-2" width="100" height="100">
        @else
            <!-- Make sure to reference the default avatar from the public directory -->
            <img src="{{ asset('avatars/admin.jpg') }}" class="rounded-circle mb-2" width="100" height="100">
        @endif
        <div>
            <input type="file" name="avatar" class="form-control mt-2" style="border-color: #e60073;">
        </div>
    </div>

    <!-- Edit Nama -->
<div class="mb-3">
    <label for="name" class="form-label" style="color: #e60073;">Nama Lengkap</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required style="border-color: #e60073; background-color: #fce4f1;">
</div>


    <div class="mb-3">
        <label for="username" class="form-label" style="color: #e60073;">Username Baru</label>
        <input type="text" name="username" class="form-control" value="{{ old('username', $user->username) }}" required style="border-color: #e60073; background-color: #fce4f1;">
    </div>

    <div class="mb-3">
        <label for="password" class="form-label" style="color: #e60073;">Password Baru (opsional)</label>
        <input type="password" name="password" class="form-control" style="border-color: #e60073; background-color: #fce4f1;">
    </div>

    <button type="submit" class="btn w-100" style="background-color: #e60073; border-color: #e60073; color: white; transition: background-color 0.3s;">Simpan Perubahan</button>
</form>

@endsection
