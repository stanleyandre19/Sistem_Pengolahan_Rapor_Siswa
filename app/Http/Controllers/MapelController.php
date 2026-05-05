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
        $guru = \App\Models\Guru::all();
        return view('pages.tambah_mapel', compact('guru'));
    }

    public function store(Request $request)
    {
        Mapel::create([
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'guru_id' => $request->guru_id
        ]);

        return redirect('/mapel');
    }

    public function edit($id)
    {
        $mapel = Mapel::findOrFail($id);
        $guru = Guru::all();

        return view('pages.edit_mapel', compact('mapel', 'guru'));
    }

    public function update(Request $request, $id)
    {
        $mapel = Mapel::findOrFail($id);

        $mapel->update([
            'kode_mapel' => $request->kode_mapel,
            'nama_mapel' => $request->nama_mapel,
            'guru_id' => $request->guru_id
        ]);

        return redirect('/mapel');
    }

    public function destroy($id)
    {
        Mapel::destroy($id);
        return redirect('/mapel');
    }
}