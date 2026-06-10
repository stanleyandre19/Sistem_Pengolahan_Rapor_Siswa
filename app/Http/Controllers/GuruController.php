<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    public function index()
    {
        $data = Guru::all();
        return view('pages.guru', compact('data'));
    }

    public function store(Request $request)
    {
        // Simpan data guru
        Guru::create([
            'nama'  => $request->nama,
            'nip'   => $request->nip,
            'mapel' => $request->mapel,
        ]);

        // Otomatis buat akun login guru
        User::create([
            'name'     => $request->nama,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'guru',
        ]);

        return redirect('/guru')
            ->with('success', 'Guru dan akun login berhasil dibuat!');
    }

    public function edit($id)
    {
        $data = Guru::find($id);
        return view('pages.edit_guru', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::find($id);

        $guru->update([
            'nama'  => $request->nama,
            'nip'   => $request->nip,
            'mapel' => $request->mapel,
        ]);

        return redirect('/guru');
    }

    public function destroy($id)
    {
        Guru::destroy($id);

        return redirect('/guru');
    }
}