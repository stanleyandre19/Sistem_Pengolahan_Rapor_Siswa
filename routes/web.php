<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes - Sistem Rapor Siswa SD
|--------------------------------------------------------------------------
*/

// ======================
// HALAMAN PUBLIC (TIDAK LOGIN)
// ======================
Route::view('/', 'pages.home')->name('home');
Route::view('/home', 'pages.home');
Route::view('/about', 'pages.about');

Route::view('/login', 'pages.login')->name('login');
Route::view('/register', 'pages.register')->name('register');


// ======================
// HALAMAN SETELAH LOGIN
// ======================
Route::view('/dashboard', 'pages.dashboard')->name('dashboard');

Route::view('/siswa', 'pages.siswa')->name('siswa');
Route::view('/guru', 'pages.guru')->name('guru');
Route::view('/mapel', 'pages.mapel')->name('mapel');
Route::view('/nilai', 'pages.nilai')->name('nilai'); // 🔥 penting


// ======================
// FITUR RAPOR (SESUAI DOSEN)
// ======================
Route::get('/rapor/{id}/pdf', function ($id) {
    return "Download Rapor PDF Siswa ID: " . $id;
});

// ======================
// SISWA (SIMULASI CRUD)
// ======================
Route::get('/siswa/tambah', function () {
    return view('pages.tambah_siswa');
});

Route::get('/siswa/edit', function () {
    return view('pages.edit_siswa');
});

Route::get('/siswa/hapus', function () {
    return "Data siswa berhasil dihapus (simulasi)";
});