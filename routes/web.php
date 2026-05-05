<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SiswaController;
use App\Models\Nilai;
use Barryvdh\DomPDF\Facade\Pdf;

/*
|--------------------------------------------------------------------------
| WEB ROUTES - SISTEM RAPOR SISWA SD
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
// NILAI (INPUT + HITUNG)
// ======================
Route::get('/nilai', function () {
    $data = Nilai::all();
    return view('pages.nilai', compact('data'));
});

Route::post('/nilai/simpan', function (Request $request) {

    // 🔥 RUMUS NILAI
    $nilai_akhir = ($request->tugas * 0.4) 
                 + ($request->uts * 0.3) 
                 + ($request->uas * 0.3);

    Nilai::create([
        'nama_siswa' => $request->nama_siswa,
        'mapel' => $request->mapel,
        'tugas' => $request->tugas,
        'uts' => $request->uts,
        'uas' => $request->uas,
        'nilai_akhir' => $nilai_akhir,
    ]);

    return redirect('/nilai');
});


// ======================
// HALAMAN LAIN
// ======================
Route::view('/guru', 'pages.guru')->name('guru');
Route::view('/mapel', 'pages.mapel')->name('mapel');


// ======================
// RAPOR PDF (🔥 SUDAH JADI FILE PDF)
// ======================
Route::get('/rapor/{id}/pdf', function ($id) {

    $data = Nilai::find($id);

    if (!$data) {
        return "Data tidak ditemukan";
    }

    $pdf = Pdf::loadView('pages.rapor_pdf', compact('data'));

    return $pdf->download('rapor-'.$data->nama_siswa.'.pdf');
});