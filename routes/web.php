<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Models\Siswa;
use App\Models\Guru;
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
// DASHBOARD (DINAMIS)
// ======================
Route::get('/dashboard', function () {

    $data = Siswa::all();

    $jumlah_siswa = Siswa::count();
    $jumlah_guru = Guru::count();
    $jumlah_mapel = 0; // nanti kita isi

    return view('pages.dashboard', compact(
        'data',
        'jumlah_siswa',
        'jumlah_guru',
        'jumlah_mapel'
    ));

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
// CRUD GURU
// ======================
Route::get('/guru', [GuruController::class, 'index']);
Route::post('/guru', [GuruController::class, 'store']);

Route::get('/guru/tambah', function () {
    return view('pages.tambah_guru');
});

Route::get('/guru/edit/{id}', [GuruController::class, 'edit']);
Route::post('/guru/update/{id}', [GuruController::class, 'update']);

Route::get('/guru/hapus/{id}', [GuruController::class, 'destroy']);


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
Route::view('/mapel', 'pages.mapel')->name('mapel');


// ======================
// RAPOR PDF
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