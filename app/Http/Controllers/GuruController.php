<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    // Menampilkan semua data guru
    public function index()
    {
        $data = Guru::all();

        return view('pages.guru', compact('data'));
    }

    // Menyimpan data guru
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:gurus,nip',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'nama.required' => 'Nama guru wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
        ]);

        // Membuat akun login guru
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'guru',
        ]);

        // Menyimpan data guru
        Guru::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'nip' => $request->nip,
        ]);

        return redirect('/guru')
                ->with('success', 'Guru dan akun login berhasil dibuat!');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $data = Guru::findOrFail($id);

        return view('pages.edit_guru', compact('data'));
    }

    // Mengupdate data guru
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:gurus,nip,' . $id,
        ], [
            'nama.required' => 'Nama guru wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
        ]);

        $guru = Guru::findOrFail($id);

        $guru->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
        ]);

        return redirect('/guru')
                ->with('success', 'Data guru berhasil diperbarui.');
    }

    // Menghapus data guru
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        // Hapus akun login jika ada
        if ($guru->user_id) {
            User::destroy($guru->user_id);
        }

        // Hapus data guru
        $guru->delete();

        return redirect('/guru')
                ->with('success', 'Data guru berhasil dihapus.');
    }
}