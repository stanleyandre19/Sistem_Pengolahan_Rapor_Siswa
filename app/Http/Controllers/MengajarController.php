<?php

namespace App\Http\Controllers;

use App\Models\Mengajar;
use App\Models\Guru;
use App\Models\Mapel;
use Illuminate\Http\Request;

class MengajarController extends Controller
{
    public function index()
    {
        $data = Mengajar::with(['guru', 'mapel'])->get();

        return view('mengajar.index', compact('data'));
    }

    public function create()
    {
        $gurus = Guru::all();
        $mapels = Mapel::all();

        return view('mengajar.create', compact('gurus', 'mapels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'kelas' => 'required',
        ]);

        Mengajar::create([
            'guru_id' => $request->guru_id,
            'mapel_id' => $request->mapel_id,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('mengajar.index')
            ->with('success', 'Data mengajar berhasil ditambahkan');
    }

    public function show(Mengajar $mengajar)
    {
        //
    }

    public function edit(Mengajar $mengajar)
    {
        $gurus = Guru::all();
        $mapels = Mapel::all();

        return view('mengajar.edit', compact(
            'mengajar',
            'gurus',
            'mapels'
        ));
    }

    public function update(Request $request, Mengajar $mengajar)
    {
        $mengajar->update([
            'guru_id' => $request->guru_id,
            'mapel_id' => $request->mapel_id,
            'kelas' => $request->kelas,
        ]);

        return redirect()->route('mengajar.index')
            ->with('success', 'Data berhasil diupdate');
    }

    public function destroy(Mengajar $mengajar)
    {
        $mengajar->delete();

        return redirect()->route('mengajar.index')
            ->with('success', 'Data berhasil dihapus');
    }
}