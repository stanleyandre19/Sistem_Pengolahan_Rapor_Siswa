<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // TAMPIL DATA + SEARCH + FILTER KELAS
    public function index(Request $request)
    {
        $query = Siswa::query();
        $user = \Illuminate\Support\Facades\Auth::user();
        
        // 1. AMBIL DAFTAR KELAS UNTUK DROPDOWN FILTER
        // Kita siapkan variabel $list_kelas agar dropdown di web tidak hardcoded
        if ($user->role === 'walikelas') {
            $list_kelas = collect([$user->walikelas->kelas]);
        } elseif ($user->role === 'guru') {
            $guruId = $user->guru->id;
            $mengajars = \App\Models\Mengajar::where('guru_id', $guruId)->get();
            $list_kelas = $mengajars->pluck('kelas')->unique();
        } else {
            // Jika admin, ambil semua kelas unik yang terdaftar di tabel siswa
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

        // 3. TAMBAHAN: FITUR FILTER BERDASARKAN DROPDOWN KELAS YANG DIPILIH
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

        // Kirimkan variabel $list_kelas ke view
        return view('pages.siswa', compact('data', 'user', 'list_kelas'));
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required',
            'nis'   => 'required',
            'kelas' => 'required',
            'foto'  => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        Siswa::create($data);

        return redirect('/siswa')->with('success', 'Data siswa berhasil ditambahkan');
    }

    // HALAMAN EDIT
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('pages.edit_siswa', compact('siswa'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required',
            'nis'   => 'required',
            'kelas' => 'required',
        ]);

        $siswa = Sis5wa::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_siswa', 'public');
        }

        $siswa->update($data);

        return redirect('/siswa')->with('success', 'Data berhasil diupdate');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect('/siswa')->with('success', 'Data berhasil dihapus');
    }
}