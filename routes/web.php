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
Route::view('/', 'pages.home')->name('home');
Route::view('/home', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');

// ======================
// Pages
// ======================
Route::view('/login', 'pages.login')->name('login');
Route::view('/register', 'pages.register')->name('register');

// ======================
// DASHBOARD & FITUR
// ======================
Route::view('/dashboard', 'pages.dashboard')->name('dashboard');
Route::view('/siswa', 'pages.siswa')->name('siswa');
Route::view('/guru', 'pages.guru')->name('guru');
Route::view('/mapel', 'pages.mapel')->name('mapel');
// ======================
// DATA / MODULE
// ======================
Route::get('/barang', [BarangController::class, 'tampilkan'])->name('barang');