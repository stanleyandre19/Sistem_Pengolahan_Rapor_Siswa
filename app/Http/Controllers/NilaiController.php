<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Siswa;

class NilaiController extends Controller
{
    public function index()
    {
        $data = Nilai::all();
        $siswa = Siswa::all();

        return view('pages.nilai', compact('data', 'siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'mapel' => 'required',
            'tugas' => 'required|numeric|min:0|max:100',
            'uts' => 'required|numeric|min:0|max:100',
            'uas' => 'required|numeric|min:0|max:100',
        ]);

        Nilai::create([
            'nama_siswa' => $request->nama_siswa,
            'mapel'      => $request->mapel,
            'tugas'      => $request->tugas,
            'uts'        => $request->uts,
            'uas'        => $request->uas,
            'nilai_akhir'=> ($request->tugas + $request->uts + $request->uas) / 3,
        ]);

        return redirect('/nilai');
    }

    public function edit($id)
    {
        $data = Nilai::findOrFail($id);
        $siswa = Siswa::all();

        return view('pages.edit_nilai', compact('data', 'siswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_siswa' => 'required',
            'mapel' => 'required',
            'tugas' => 'required|numeric|min:0|max:100',
            'uts' => 'required|numeric|min:0|max:100',
            'uas' => 'required|numeric|min:0|max:100',
        ]);

        $data = Nilai::findOrFail($id);

        $data->update([
            'nama_siswa' => $request->nama_siswa,
            'mapel'      => $request->mapel,
            'tugas'      => $request->tugas,
            'uts'        => $request->uts,
            'uas'        => $request->uas,
            'nilai_akhir'=> ($request->tugas + $request->uts + $request->uas) / 3,
        ]);

        return redirect('/nilai');
    }

    public function destroy($id)
    {
        $data = Nilai::findOrFail($id);
        $data->delete();

        return redirect('/nilai');
    }
}