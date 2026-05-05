<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // TAMPIL DATA
    public function index()
    {
        $data = Siswa::all();
        return view('pages.siswa', compact('data'));
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        Siswa::create($request->all());
        return redirect('/siswa');
    }

    // HALAMAN EDIT
    public function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('pages.edit_siswa', compact('siswa'));
    }

    // UPDATE DATA
    public function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->update($request->all());

        return redirect('/siswa');
    }

    // HAPUS DATA
    public function destroy($id)
    {
        Siswa::find($id)->delete();
        return redirect('/siswa');
    }
}