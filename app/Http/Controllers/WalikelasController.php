<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Walikelas;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class WalikelasController extends Controller
{
    // Menampilkan data wali kelas
    public function index()
    {
        $data = Walikelas::all();

        return view('walikelas.index', compact('data'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('walikelas.create');
    }

    // Menyimpan data wali kelas
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:walikelas,nip',
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
            'no_hp' => 'nullable',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'nama.required' => 'Nama wali kelas wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
            'kelas.required' => 'Kelas wajib dipilih.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak sesuai.',
        ]);

        // Membuat akun login
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'walikelas',
        ]);

        // Menyimpan data wali kelas
        Walikelas::create([
            'user_id' => $user->id,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
        ]);

        return redirect('/walikelas')
            ->with('success', 'Data wali kelas dan akun login berhasil dibuat!');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $data = Walikelas::findOrFail($id);

        return view('walikelas.edit', compact('data'));
    }

    // Mengupdate data wali kelas
    public function update(Request $request, $id)
    {
        $data = Walikelas::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|unique:walikelas,nip,' . $id,
            'kelas' => 'required',
            'jenis_kelamin' => 'required',
        ], [
            'nama.required' => 'Nama wali kelas wajib diisi.',
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique' => 'NIP sudah digunakan.',
            'kelas.required' => 'Kelas wajib dipilih.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
        ]);

        $data->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'kelas' => $request->kelas,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_hp' => $request->no_hp,
        ]);

        return redirect('/walikelas')
            ->with('success', 'Data wali kelas berhasil diperbarui.');
    }

    // Menghapus data wali kelas
    public function destroy($id)
    {
        $walikelas = Walikelas::findOrFail($id);

        // Hapus akun login jika ada
        if ($walikelas->user_id) {
            User::destroy($walikelas->user_id);
        }

        // Hapus data wali kelas
        $walikelas->delete();

        return redirect('/walikelas')
            ->with('success', 'Data wali kelas berhasil dihapus.');
    }
}