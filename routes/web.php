<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Controller
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
// LIST RAPOR (Wali Kelas & Admin)
Route::middleware(['auth', 'role:admin,walikelas'])->group(function () {

    Route::get('/rapor', function () {
        return view('rapor.index', [
            'dataSiswa' => Siswa::all()
        ]);
    })->name('rapor.index');

    // CETAK PDF RAPOR
    Route::get('/rapor/{id}/pdf', function ($id) {

        $siswa = Siswa::findOrFail($id);

        $nilai = Nilai::where('siswa_id', $id)->get();

        $pdf = Pdf::loadView('pages.rapor_pdf', compact('siswa', 'nilai'));

        return $pdf->download('rapor-' . $siswa->nama . '.pdf');
    })->name('rapor.pdf');

});

// =========================================================================
// HALAMAN PUBLIC (Bisa diakses tanpa login)
// =========================================================================
Route::view('/', 'pages.home')->name('home');
Route::view('/home', 'pages.home');
Route::view('/about', 'pages.about');

Route::get('/login', function () { return view('pages.login'); })->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

// RUTE SUNTIK DATA WALI KELAS
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
// JALUR BERSAMA (Hanya untuk MELIHAT DATA - Admin, Guru, Wali Kelas)
// =========================================================================
Route::middleware(['auth', 'role:admin,guru,walikelas'])->group(function () {
    
    // Halaman utama melihat tabel data (Sesuai request menu sidebar)
    Route::get('/siswa', [SiswaController::class, 'index']);
    Route::get('/guru', [GuruController::class, 'index']);
    Route::get('/mapel', [MapelController::class, 'index']);

    // Rute cetak PDF agar Admin & Wali Kelas sama-sama bisa mengunduh rapor
    Route::get('/rapor/{id}/pdf', function ($id) {
        $siswa = Siswa::find($id);
        if (!$siswa) { return "Siswa tidak ditemukan"; }
        
        $nilai = Nilai::where('nama_siswa', $siswa->nama)->get();
        $pdf = Pdf::loadView('pages.rapor_pdf', compact('siswa', 'nilai'));
        
        return $pdf->download('rapor-' . $siswa->nama . '.pdf');
    })->name('rapor.pdf');
});


// =========================================================================
// JALUR ADMIN & WALI KELAS (Bisa Tambah/Edit/Hapus Mapel & KKM)
// =========================================================================
Route::middleware(['auth', 'role:admin,walikelas'])->group(function () {
    
    Route::prefix('mapel')->group(function () {
        Route::get('/create', [MapelController::class, 'create']);
        Route::post('/', [MapelController::class, 'store']);
        Route::get('/edit/{id}', [MapelController::class, 'edit']);
        Route::post('/update/{id}', [MapelController::class, 'update']);
        Route::get('/hapus/{id}', [MapelController::class, 'destroy']);
    });
});


// =========================================================================
// AREA KHUSUS ADMIN (Hanya Admin yang Bisa Masuk)
// =========================================================================
Route::middleware(['auth', 'role:admin'])->group(function () {
    
    // DASHBOARD ADMIN
    Route::get('/dashboard', function () {
        return view('pages.dashboard', [
            'data' => Siswa::all(), 
            'jumlah_siswa' => Siswa::count(),
            'jumlah_guru'  => Guru::count(), 
            'jumlah_mapel' => Mapel::count(),
        ]);
    })->name('dashboard');

    // REGISTRASI USER BARU (Pembuatan akun Guru / Wali Kelas oleh Admin)
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // CRUD SISWA
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
}); 


// =========================================================================
// AREA KHUSUS GURU
// =========================================================================
Route::middleware(['auth', 'role:guru'])->group(function () {
    
    // DASHBOARD GURU
    Route::get('/guru/dashboard', function () { return view('pages.dashboard_guru'); });
    
    // INPUT & HITUNG NILAI SISWA
    Route::get('/nilai', function () { return view('pages.nilai', ['data' => Nilai::all()]); });
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


// =========================================================================
// AREA WALI KELAS
// =========================================================================
Route::middleware(['auth', 'role:walikelas'])->group(function () {

    Route::get('/walikelas/dashboard', function () {

        return view('pages.dashboard_wali', [
            'jumlahSiswa' => Siswa::count(),
            'jumlahNilai' => Nilai::count(),
            'jumlahMapel' => Mapel::count(),
            'dataSiswa'   => Siswa::latest()->take(5)->get(),
        ]);

    });

});