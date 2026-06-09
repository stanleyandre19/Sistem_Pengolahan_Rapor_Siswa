<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Controller
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\Auth\LoginController;

// Model
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Nilai;

// PDF
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

Route::get('/login', function () { return view('pages.login'); })->name('login');
Route::view('/register', 'pages.register')->name('register');

// PROSES LOGIN & LOGOUT
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

// RUTE SUNTIK WALI
Route::get('/suntik-wali', function () {
    $user = \App\Models\User::updateOrCreate(
        ['email' => 'wali@rapor.id'], 
        [
            'name' => 'Bapak Wali Kelas',
            'password' => \Illuminate\Support\Facades\Hash::make('wali123'), 
            'role' => 'walikelas' 
        ]
    );
    return 'SUNTIKAN BERHASIL! Silakan login dengan Email: wali@rapor.id | Password: wali123';
});


// =========================================================================
// JALUR BERSAMA (Bisa Diakses Admin, Guru, dan Wali Kelas)
// =========================================================================
Route::middleware(['auth', 'role:admin,guru,walikelas'])->group(function () {
    
    // Halaman utama melihat data (Sesuai request sidebar)
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::get('/guru', [GuruController::class, 'index']);
    Route::get('/mapel', [MapelController::class, 'index']);

    // 🔥 RUTE PDF SEKARANG DI SINI (Biar Admin & Wali Kelas sama-sama bisa klik)
    Route::get('/rapor/{id}/pdf', function ($id) {
        $siswa = Siswa::find($id);
        if (!$siswa) { return "Siswa tidak ditemukan"; }
        
        $nilai = Nilai::where('nama_siswa', $siswa->nama)->get();
        $pdf = Pdf::loadView('pages.rapor_pdf', compact('siswa', 'nilai'));
        
        return $pdf->download('rapor-' . $siswa->nama . '.pdf');
    })->name('rapor.pdf');
});


// ======================
// AREA KHUSUS ADMIN
// ======================
Route::middleware(['auth', 'role:admin'])->group(function () {
    
    // DASHBOARD ADMIN
    Route::get('/dashboard', function () {
        $data = Siswa::all();
        return view('pages.dashboard', [
            'data' => $data,
            'jumlah_siswa' => Siswa::count(),
            'jumlah_guru'  => Guru::count(),
            'jumlah_mapel' => Mapel::count(),
        ]);
    })->name('dashboard');

    // CRUD SISWA (Hanya Admin yang bisa manipulasi)
    Route::prefix('siswa')->group(function () {
        Route::post('/', [SiswaController::class, 'store']);
        Route::get('/tambah', function () { return view('pages.tambah_siswa'); });
        Route::get('/edit/{id}', [SiswaController::class, 'edit']);
        Route::post('/update/{id}', [SiswaController::class, 'update']);
        Route::get('/hapus/{id}', [SiswaController::class, 'destroy']);
    });

    // CRUD GURU
    Route::prefix('guru')->group(function () {
        Route::post('/', [GuruController::class, 'store']);
        Route::get('/tambah', function () { return view('pages.tambah_guru'); });
        Route::get('/edit/{id}', [GuruController::class, 'edit']);
        Route::post('/update/{id}', [GuruController::class, 'update']);
        Route::get('/hapus/{id}', [GuruController::class, 'destroy']);
    });

    // CRUD MAPEL
    Route::prefix('mapel')->group(function () {
        Route::get('/create', [MapelController::class, 'create']);
        Route::post('/', [MapelController::class, 'store']);
        Route::get('/edit/{id}', [MapelController::class, 'edit']);
        Route::post('/update/{id}', [MapelController::class, 'update']);
        Route::get('/hapus/{id}', [MapelController::class, 'destroy']);
    });

}); 


// ======================
// AREA KHUSUS GURU
// ======================
Route::middleware(['auth', 'role:guru'])->group(function () {
    
    // DASHBOARD GURU
    Route::get('/guru/dashboard', function () {
        return view('pages.dashboard_guru'); 
    });

    // NILAI (INPUT + HITUNG) 
    Route::get('/nilai', function () {
        $data = Nilai::all();
        return view('pages.nilai', compact('data'));
    });

    Route::post('/nilai/simpan', function (Request $request) {
        $nilai_akhir = ($request->tugas * 0.4) + ($request->uts * 0.3) + ($request->uas * 0.3);
        Nilai::create([
            'nama_siswa'  => $request->nama_siswa,
            'mapel'       => $request->mapel,
            'tugas'       => $request->tugas,
            'uts'         => $request->uts,
            'uas'         => $request->uas,
            'nilai_akhir' => $nilai_akhir,
        ]);
        return redirect('/nilai');
    });

}); 


// ======================
// AREA WALI KELAS
// ======================
Route::middleware(['auth', 'role:walikelas'])->group(function () {
    
    // DASHBOARD WALI KELAS
    Route::get('/walikelas/dashboard', function () { 
        return view('pages.dashboard_wali'); 
    });

});