<?php

use Illuminate\Support\Facades\Route;

// ======================
// HALAMAN UTAMA
// ======================
Route::view('/', 'pages.home');
Route::view('/home', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');

// ======================
// AUTH
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
// OPTIONAL (kalau dipakai)
// ======================
// Route::get('/barang', [BarangController::class, 'tampilkan'])->name('barang');