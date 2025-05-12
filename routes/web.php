<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengaduanController;
use App\Models\Pengaduan; 

// --------------------
// AUTH ROUTES
// --------------------
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --------------------
// PENGADUAN CRUD
// --------------------
Route::resource('pengaduan', PengaduanController::class);




// --------------------
// PROFIL
// --------------------
Route::get('/profil', [ProfileController::class, 'show'])->name('profil.show');
Route::get('/profil/edit', [ProfileController::class, 'edit'])->name('profil.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');


// --------------------
// LOKASI PLN
// --------------------
Route::get('/lokasi-pln', [LokasiController::class, 'index'])->name('lokasi-pln');

// --------------------
// TESTING DASHBOARD TANPA MIDDLEWARE (JIKA DIBUTUHKAN)
// --------------------
Route::get('/admin/dashboard', function () {
    $pengaduan = Pengaduan::all();
    return view('admin.dashboard', compact('pengaduan'));
})->name('admin.dashboard');