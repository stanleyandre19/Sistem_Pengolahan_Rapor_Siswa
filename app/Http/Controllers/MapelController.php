<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Guru;

class MapelController extends Controller
{
    public function index()
    {
        $data = Mapel::with('guru')->get();
        return view('pages.mapel', compact('data'));
    }

    public function create()
    {
        $guru = Guru::all();
        return view('pages.tambah_mapel', compact('guru'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_mapel' => 'required|numeric|min:60|max:100',
            'nama_mapel' => 'required|string|max:255',
            'guru_id' => 'required|exists:gurus,id'
        ]);

        Mapel::create([
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'guru_id' => $request->guru_id
        ]);

        return redirect('/mapel')
            ->with('success', 'Data mapel berhasil ditambahkan');
    }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        $guru = Guru::all();

        return view('pages.edit_mapel', compact('mapel', 'guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_mapel' => 'required|numeric|min:60|max:100',
            'nama_mapel' => 'required|string|max:255',
            'guru_id' => 'required|exists:gurus,id'
        ]);

        $mapel = Mapel::findOrFail($id);

        $mapel->update([
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'guru_id' => $request->guru_id
        ]);

        return redirect('/mapel')
            ->with('success', 'Data mapel berhasil diupdate');
    }

    public function destroy($id)
    {
        Mapel::destroy($id);

        return redirect('/mapel')
            ->with('success', 'Data mapel berhasil dihapus');
    }
}