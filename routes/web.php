<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// CONTROLLER
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\WalikelasController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\MengajarController;

// MODEL
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Nilai;

// PDF
use Barryvdh\DomPDF\Facade\Pdf;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/
Route::view('/', 'pages.home')->name('home');
Route::view('/home', 'pages.home');
Route::view('/about', 'pages.about');

Route::get('/login', fn() => view('pages.login'))->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| RAPOR (ADMIN + WALI KELAS)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin,walikelas'])->group(function () {

    Route::get('/rapor', function () {
        $user = Auth::user();
        $query = Siswa::query();

        if ($user->role === 'walikelas') {
            $query->where('kelas', $user->walikelas->kelas);
        }

        return view('rapor.index', [
            'dataSiswa' => $query->get()
        ]);
    });

    Route::get('/rapor/{id}/pdf', function ($id) {

        $siswa = Siswa::findOrFail($id);
        $nilai = Nilai::with('mapel')->where('siswa_id', $siswa->id)->get();

        $pdf = Pdf::loadView('pages.rapor_pdf', compact('siswa', 'nilai'));

        return $pdf->stream('rapor-' . $siswa->nama . '.pdf');

    })->name('rapor.pdf');

});

/*
|--------------------------------------------------------------------------
| SEMUA ROLE (ADMIN, GURU, WALI KELAS)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin,guru,walikelas'])->group(function () {

    // DATA LIST
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::get('/guru', [GuruController::class, 'index']);
    Route::get('/mapel', [MapelController::class, 'index']);

    /*
    |--------------------------------------------------------------------------
    | WALI KELAS CRUD (FIX 404 + FULL)
    |--------------------------------------------------------------------------
    */
    Route::get('/walikelas', [WalikelasController::class, 'index']);
    Route::get('/walikelas/create', [WalikelasController::class, 'create']);
    Route::post('/walikelas/store', [WalikelasController::class, 'store']);

    Route::get('/walikelas/edit/{id}', [WalikelasController::class, 'edit']);
    Route::post('/walikelas/update/{id}', [WalikelasController::class, 'update']);
    Route::get('/walikelas/delete/{id}', [WalikelasController::class, 'destroy']);

});

/*
|--------------------------------------------------------------------------
| ADMIN ONLY
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->group(function () {

    // DASHBOARD ADMIN
    Route::get('/dashboard', function () {
        return view('pages.dashboard', [
            'data' => Siswa::all(),
            'jumlah_siswa' => Siswa::count(),
            'jumlah_guru' => Guru::count(),
            'jumlah_mapel' => Mapel::count(),
        ]);
    })->name('dashboard');

    // REGISTER USER
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'register']);

    // SISWA
    Route::prefix('siswa')->group(function () {
        Route::post('/', [SiswaController::class, 'store']);
        Route::get('/tambah', fn() => view('pages.tambah_siswa'));
        Route::get('/edit/{id}', [SiswaController::class, 'edit']);
        Route::post('/update/{id}', [SiswaController::class, 'update']);
        Route::get('/hapus/{id}', [SiswaController::class, 'destroy']);
    });

    // GURU
    Route::prefix('guru')->group(function () {
        Route::post('/', [GuruController::class, 'store']);
        Route::get('/tambah', fn() => view('pages.tambah_guru'));
        Route::get('/edit/{id}', [GuruController::class, 'edit']);
        Route::post('/update/{id}', [GuruController::class, 'update']);
        Route::get('/hapus/{id}', [GuruController::class, 'destroy']);
    });

    // MAPEL
    Route::prefix('mapel')->group(function () {
        Route::get('/create', [MapelController::class, 'create']);
        Route::post('/', [MapelController::class, 'store']);
        Route::get('/edit/{id}', [MapelController::class, 'edit']);
        Route::post('/update/{id}', [MapelController::class, 'update']);
        Route::get('/hapus/{id}', [MapelController::class, 'destroy']);
    });

/*
|--------------------------------------------------------------------------
| MENGAJAR
|--------------------------------------------------------------------------
*/

Route::get('/mengajar', [MengajarController::class, 'index'])
    ->name('mengajar.index');

Route::get('/mengajar/create', [MengajarController::class, 'create'])
    ->name('mengajar.create');

Route::post('/mengajar/store', [MengajarController::class, 'store'])
    ->name('mengajar.store');

Route::get('/mengajar/edit/{mengajar}', [MengajarController::class, 'edit'])
    ->name('mengajar.edit');

Route::put('/mengajar/update/{mengajar}', [MengajarController::class, 'update'])
    ->name('mengajar.update');

Route::get('/mengajar/delete/{mengajar}', [MengajarController::class, 'destroy'])
    ->name('mengajar.destroy');
});

/*
|--------------------------------------------------------------------------
| GURU
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:guru'])->group(function () {

    Route::get('/guru/dashboard', fn() => view('pages.dashboard_guru'));

    Route::get('/nilai', [NilaiController::class, 'index']);
    Route::post('/nilai/simpan', [NilaiController::class, 'store']);
    Route::get('/nilai/edit/{id}', [NilaiController::class, 'edit']);
    Route::put('/nilai/update/{id}', [NilaiController::class, 'update']);
    Route::delete('/nilai/hapus/{id}', [NilaiController::class, 'destroy']);

});
    
/*
|--------------------------------------------------------------------------
| WALI KELAS DASHBOARD
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:walikelas'])->group(function () {

    Route::get('/walikelas/dashboard', function () {
        $user = Auth::user();
        $kelas = $user->walikelas->kelas;
        
        $siswaQuery = Siswa::where('kelas', $kelas);
        
        // Nilai query
        $nilaiQuery = Nilai::whereHas('siswa', function($q) use ($kelas) {
            $q->where('kelas', $kelas);
        });

        return view('pages.dashboard_wali', [
            'jumlahSiswa' => $siswaQuery->count(),
            'jumlahNilai' => $nilaiQuery->count(),
            'jumlahMapel' => Mapel::count(),
            'dataSiswa' => $siswaQuery->latest()->take(5)->get(),
        ]);

    });

});