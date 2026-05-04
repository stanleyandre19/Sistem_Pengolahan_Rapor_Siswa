<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;

/*
|--------------------------------------------------------------------------
| Web Routes - Sistem Rapor Siswa SD
|--------------------------------------------------------------------------
*/

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
// DATA SISWA (REAL CRUD)
// ======================
Route::get('/siswa', [SiswaController::class, 'index']);
Route::post('/siswa', [SiswaController::class, 'store']);
Route::get('/siswa/hapus/{id}', [SiswaController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| GURU (CRUD DATABASE)
|--------------------------------------------------------------------------
*/
Route::get('/guru', [GuruController::class, 'index'])->name('guru');
Route::post('/guru', [GuruController::class, 'store']);
Route::get('/guru/hapus/{id}', [GuruController::class, 'destroy']);


// halaman tambah
Route::get('/siswa/tambah', function () {
    return view('pages.tambah_siswa');
});

Route::get('/guru/tambah', function () {    
    return view('pages.tambah_guru');
});



// ======================
// DATA LAIN (MASIH STATIC DULU)
// ======================
Route::view('/guru', 'pages.guru')->name('guru');
Route::view('/mapel', 'pages.mapel')->name('mapel');
Route::view('/nilai', 'pages.nilai')->name('nilai');


// ======================
// RAPOR PDF
// ======================
Route::get('/rapor/{id}/pdf', function ($id) {
    return "Download Rapor PDF Siswa ID: " . $id;
});