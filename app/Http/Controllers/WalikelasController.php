<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Walikelas;

class WalikelasController extends Controller
{
    public function index()
    {
        $data = Walikelas::all();
        return view('walikelas.index', compact('data'));
    }

    public function create()
    {
        return view('walikelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:walikelas',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        Walikelas::create($request->all());

        return redirect()->route('walikelas.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Walikelas::findOrFail($id);
        return view('walikelas.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Walikelas::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $data->update($request->all());

        return redirect()->route('walikelas.index')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        Walikelas::destroy($id);
        return redirect()->route('walikelas.index')->with('success', 'Data berhasil dihapus');
    }
}