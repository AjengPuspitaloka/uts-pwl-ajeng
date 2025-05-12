<!-- resources/views/layouts/user.blade.php -->

@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User - PLN App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            background: linear-gradient(to bottom, #ffffff 0%, #f8d9e6 100%);
            color: #d63384;
            text-align: center;
            width: 250px;
            padding: 20px;
            position: fixed;
        }

        .sidebar a {
            color: #d63384;
            text-decoration: none;
            display: block;
            padding: 12px;
            font-size: 16px;
            transition: background 0.3s ease;
        }

        .sidebar a:hover {
            background: #f1c6d5;
        }

        .sidebar i {
            margin-right: 10px;
        }

        .sidebar h5 {
            font-size: 24px;
            color: #d63384;
            margin-top: 15px;
        }

        .btn-danger {
            background-color: #d63384;
            border-color: #d63384;
        }

        .btn-danger:hover {
            background-color: #c1356d;
            border-color: #c1356d;
        }

        .profile-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
        }

        .small-text {
            font-size: 12px;
            color: #6c757d;
        }

        .sidebar-logo {
            width: 80px;
            height: auto;
        }

        .profile-section {
            margin-bottom: 30px;
            text-align: center;
        }

        .profile-section img {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border: 4px solid #f8bbd0;
            margin-bottom: 10px;
        }

        .profile-section p {
            font-size: 16px;
            font-weight: bold;
            color: #d63384;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <div class="sidebar">
        <img src="{{ asset('images/logo-pln.jpg') }}" alt="Logo PLN" class="sidebar-logo mb-3">

        {{-- Foto Profil --}}
        <div class="profile-section">
            @if(session('avatar'))
                <img src="{{ asset('avatars/' . session('avatar')) }}" alt="Foto Profil" class="rounded-circle mb-3">
            @else
                <img src="{{ asset('avatars/admin.jpg') }}" alt="Foto User" class="rounded-circle mb-3">
            @endif

            <p>{{ session('name') ?? $user->name ?? 'User' }}</p>
        </div>

        <h5>PLN Menu</h5>

        {{-- Menu User --}}
        <ul class="sidebar-nav list-unstyled">
            <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard Admin</a></li>
            <li><a href="{{ route('pengaduan.index') }}"><i class="fas fa-user"></i> Dashboard User</a></li>
            <li><a href="{{ route('profil.show') }}"><i class="fas fa-user-circle"></i> Profil</a></li>
            <li><a href="{{ route('lokasi-pln') }}"><i class="fas fa-map-marked-alt"></i> Peta</a></li>
        </ul>

        <form action="{{ route('logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Logout</button>
        </form>
    </div>

    <div class="p-4 w-100" style="margin-left: 260px;">
        @yield('content')

        <div class="small-text mt-4">
            <p>Promo ini hanya berlaku hingga akhir bulan. Jangan lewatkan kesempatan untuk mendapatkan potongan harga!<br>
                <strong>UTS - PEMROGRAMAN WEB LANJUT - AJENG PUSPITALOKA - 202231043</strong>
            </p>
        </div>
    </div>
</div>
</body>
</html>
