<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

// ======================
// HALAMAN PUBLIC
// ======================
Route::view('/', 'pages.home')->name('home');
Route::view('/home', 'pages.home');
Route::view('/about', 'pages.about');

Route::view('/login', 'pages.login')->name('login');
Route::view('/register', 'pages.register')->name('register');


// ======================
// DASHBOARD
// ======================
Route::view('/dashboard', 'pages.dashboard')->name('dashboard');


// ======================
// CRUD SISWA (FULL)
// ======================
Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/siswa', [SiswaController::class, 'store']);

Route::get('/siswa/tambah', function () {
    return view('pages.tambah_siswa');
});

Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit']);
Route::post('/siswa/update/{id}', [SiswaController::class, 'update']);

Route::get('/siswa/hapus/{id}', [SiswaController::class, 'destroy']);


// ======================
// HALAMAN LAIN
// ======================
Route::view('/guru', 'pages.guru')->name('guru');
Route::view('/mapel', 'pages.mapel')->name('mapel');
Route::view('/nilai', 'pages.nilai')->name('nilai');


// ======================
// RAPOR PDF (SISWA TIDAK LOGIN)
// ======================
Route::get('/rapor/{id}/pdf', function ($id) {
    return "Download Rapor PDF Siswa ID: " . $id;
});