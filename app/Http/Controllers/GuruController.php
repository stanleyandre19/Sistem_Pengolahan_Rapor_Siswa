<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    // TAMPIL DATA
    public function index()
    {
        $guru = Guru::all();
        return view('pages.guru', compact('guru'));
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'mapel' => 'required',
        ]);

        Guru::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'mapel' => $request->mapel,
        ]);

        return redirect('/guru')->with('success', 'Data guru berhasil ditambahkan');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        $guru = Guru::find($id);

        if ($guru) {
            $guru->delete();
        }

        return redirect('/guru')->with('success', 'Data guru berhasil dihapus');
    }
}