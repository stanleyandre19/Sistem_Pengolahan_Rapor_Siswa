<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // TAMPIL DATA + SEARCH
    public function index(Request $request)
    {
        $query = Siswa::query();

        // FILTER HAK AKSES
        $user = \Illuminate\Support\Facades\Auth::user();
        
        if ($user->role === 'walikelas') {
            // Wali kelas hanya melihat siswanya
            $query->where('kelas', $user->walikelas->kelas);
        } elseif ($user->role === 'guru') {
            // Guru hanya melihat siswa di kelas yang dia ajarkan
            $guruId = $user->guru->id;
            $mengajars = \App\Models\Mengajar::where('guru_id', $guruId)->get();
            $kelas_diajar = $mengajars->pluck('kelas')->unique();
            
            $query->whereIn('kelas', $kelas_diajar);
        }

        // FITUR SEARCH
        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nis', 'like', '%' . $request->search . '%')
                  ->orWhere('kelas', 'like', '%' . $request->search . '%');
            });
        }

        $data = $query->latest()->get();

        return view('pages.siswa', compact('data', 'user'));
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

        $siswa = Siswa::findOrFail($id);

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