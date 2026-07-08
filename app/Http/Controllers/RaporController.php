<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Nilai;
use App\Models\TahunAjaran; // <-- 1. PANGGIL MODEL TAHUN AJARAN

class RaporController extends Controller
{
    // 🔹 halaman list siswa (rapor)
    public function index()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        $query = Siswa::query();

        if ($user->role === 'walikelas') {
            // Memastikan relasi walikelas tidak error
            $kelas = $user->walikelas ? $user->walikelas->kelas : null;
            $query->where('kelas', $kelas);
        }

        $dataSiswa = $query->get();

        return view('rapor.index', compact('dataSiswa'));
    }

    // 🔹 cetak rapor per siswa (Sudah disaring berdasarkan periode aktif)
    public function cetak($id)
    {
        $siswa = Siswa::findOrFail($id);

        // 2. AMBIL TAHUN AJARAN YANG SEDANG AKTIF
        $tahun_aktif = TahunAjaran::where('status', 'Aktif')->first();

        if (!$tahun_aktif) {
            return redirect()->back()->with('error', 'Gagal mencetak! Belum ada tahun ajaran yang di-set Aktif oleh Admin.');
        }

        // 3. FILTER NILAI: Hanya ambil nilai yang punya tahun_ajaran_id sama dengan yang sedang aktif
        $nilai = Nilai::with('mapel')
            ->where('siswa_id', $id)
            ->where('tahun_ajaran_id', $tahun_aktif->id) // <-- Pengunci nilai semester berjalan
            ->get();

        // 4. OPER DATA 'tahun_aktif' KE VIEW RAPOR
        return view('rapor_pdf', compact('siswa', 'nilai', 'tahun_aktif'));
    }
}