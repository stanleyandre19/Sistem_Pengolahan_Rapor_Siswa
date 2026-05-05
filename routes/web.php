<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SiswaController;
use App\Models\Siswa;
use App\Models\Nilai;
use Barryvdh\DomPDF\Facade\Pdf;

// ======================
// HALAMAN PUBLIC
// ======================
Route::view('/', 'pages.home')->name('home');
Route::view('/home', 'pages.home');
Route::view('/about', 'pages.about');

Route::view('/login', 'pages.login')->name('login');
Route::view('/register', 'pages.register')->name('register');


// ======================
// DASHBOARD (🔥 SUDAH DINAMIS)
// ======================
Route::get('/dashboard', function () {
    $data = Siswa::all();
    return view('pages.dashboard', compact('data'));
})->name('dashboard');


// ======================
// CRUD SISWA
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
// NILAI
// ======================
Route::get('/nilai', function () {
    $data = Nilai::all();
    return view('pages.nilai', compact('data'));
});

Route::post('/nilai/simpan', function (Request $request) {

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
// RAPOR PDF (🔥 FIX SESUAI SISWA)
// ======================
Route::get('/rapor/{id}/pdf', function ($id) {

    $siswa = Siswa::find($id);

    if (!$siswa) {
        return "Siswa tidak ditemukan";
    }

    $nilai = Nilai::where('nama_siswa', $siswa->nama)->get();

    $pdf = Pdf::loadView('pages.rapor_pdf', compact('siswa', 'nilai'));

    return $pdf->download('rapor-'.$siswa->nama.'.pdf');
});