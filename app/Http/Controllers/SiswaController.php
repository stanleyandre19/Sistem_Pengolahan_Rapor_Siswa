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

        // FITUR SEARCH
        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('nis', 'like', '%' . $request->search . '%')
                  ->orWhere('kelas', 'like', '%' . $request->search . '%');
        }

        $data = $query->latest()->get();

        return view('pages.siswa', compact('data'));
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
        ]);

        Siswa::create($request->all());

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
            'nama' => 'required',
            'nis' => 'required',
            'kelas' => 'required',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->update($request->all());

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