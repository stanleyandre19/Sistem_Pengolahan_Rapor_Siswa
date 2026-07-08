<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\TahunAjaran; // <-- PENTING: Panggil model TahunAjaran di sini
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::query();
        $user = \Illuminate\Support\Facades\Auth::user();
        
        // --- KODE BARU: Ambil Tahun Ajaran yang sedang Aktif ---
        $tahun_aktif = TahunAjaran::where('status', 'Aktif')->first();
        // -------------------------------------------------------

        // 1. AMBIL DAFTAR KELAS UNTUK DROPDOWN FILTER
        if ($user->role === 'walikelas') {
            $list_kelas = collect([$user->walikelas->kelas]);
        } elseif ($user->role === 'guru') {
            $guruId = $user->guru->id;
            $mengajars = \App\Models\Mengajar::where('guru_id', $guruId)->get();
            $list_kelas = $mengajars->pluck('kelas')->unique();
        } else {
            $list_kelas = Siswa::pluck('kelas')->unique();
        }

        // 2. FILTER HAK AKSES DASAR
        if ($user->role === 'walikelas') {
            $query->where('kelas', $user->walikelas->kelas);
        } elseif ($user->role === 'guru') {
            $guruId = $user->guru->id;
            $mengajars = \App\Models\Mengajar::where('guru_id', $guruId)->get();
            $kelas_diajar = $mengajars->pluck('kelas')->unique();
            $query->whereIn('kelas', $kelas_diajar);
        }

        // 3. FITUR FILTER BERDASARKAN DROPDOWN KELAS
        if ($request->filled('filter_kelas')) {
            $query->where('kelas', $request->filter_kelas);
        }

        // 4. FITUR SEARCH
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nis', 'like', '%' . $request->search . '%')
                  ->orWhere('kelas', 'like', '%' . $request->search . '%');
            });
        }

        $data = $query->latest()->get();

        // Tambahkan 'tahun_aktif' ke dalam compact agar bisa dibaca di file Blade
        return view('pages.siswa', compact('data', 'user', 'list_kelas', 'tahun_aktif'));
    }
    
    // ... method store, edit, update, destroy biarkan tetap sama ...
}