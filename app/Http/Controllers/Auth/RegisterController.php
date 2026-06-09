<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Menampilkan halaman form tambah akun
    public function index()
    {
        return view('pages.register');
    }

    // Memproses data dan menyimpannya ke database
    public function register(Request $request)
    {
        // 1. Validasi inputan 
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:admin,guru,walikelas', 
        ], [
            'email.unique' => 'Email ini sudah terdaftar, gunakan email lain!',
            'password.min' => 'Password minimal harus 6 karakter!'
        ]);

        // 2. Simpan user baru ke database
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // Password otomatis dienkripsi
            'role'     => $request->role,
        ]);

        // 3. Kembalikan ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Akun ' . $request->role . ' atas nama ' . $request->name . ' berhasil dibuat!');
    }
}