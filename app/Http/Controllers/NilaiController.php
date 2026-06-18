<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;

class NilaiController extends Controller
{
    // 📄 TAMPIL DATA
    public function index()
    {
        $data = Nilai::all();
        return view('nilai.index', compact('data'));
    }

    // ➕ SIMPAN DATA (CREATE)
    public function store(Request $request)
    {
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

    // ✏️ EDIT (ambil data)
    public function edit($id)
    {
        $data = Nilai::findOrFail($id);
        return view('nilai.edit', compact('data'));
    }

    // 💾 UPDATE (simpan edit)
    public function update(Request $request, $id)
    {
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

    // 🗑 DELETE
    public function destroy($id)
    {
        $data = Nilai::findOrFail($id);
        $data->delete();

        return redirect('/nilai');
    }
}