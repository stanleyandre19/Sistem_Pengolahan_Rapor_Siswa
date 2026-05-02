<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

/*
|--------------------------------------------------------------------------
| Web Routes - Sistem Rapot Siswa
|--------------------------------------------------------------------------
*/

// ======================
// HALAMAN UTAMA
// ======================
Route::view('/', 'home');
Route::view('/home', 'home')->name('home');
Route::view('/about', 'about')->name('about');

// ======================
// AUTH
// ======================
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');

// ======================
// DASHBOARD & FITUR
// ======================
Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::view('/siswa', 'siswa')->name('siswa');
Route::view('/guru', 'guru')->name('guru');
Route::view('/mapel', 'mapel')->name('mapel');

// ======================
// DATA / MODULE
// ======================
Route::get('/barang', [BarangController::class, 'tampilkan'])->name('barang');