<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Walikelas;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        // 1. BUAT AKUN LOGIN
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'walikelas'
        ]);

        // 2. SIMPAN WALI KELAS
        Walikelas::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
            'user_id' => $user->id
        ]);

        return redirect('/walikelas')->with('success', 'Data & akun berhasil dibuat');
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
            'kelas' => 'required'
        ]);

        $data->update($request->all());

        return redirect('/walikelas');
    }

    public function destroy($id)
    {
        Walikelas::destroy($id);
        return redirect('/walikelas');
    }
}