<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // 1. Validasi input dari form (Hanya email dan password)
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // 2. Cek kecocokan email dan password di database
        if (Auth::attempt($request->only('email', 'password'))) {
            
            // Generate ulang session agar status login tersimpan dengan aman
            $request->session()->regenerate();
            
            // Ambil data user yang sedang login
            $user = Auth::user();

            // 3. Redirect ke dashboard masing-masing secara otomatis sesuai role di database
            if ($user->role === 'admin') {
                return redirect('/dashboard');
            } elseif ($user->role === 'guru') {
                return redirect('/guru/dashboard');
            } elseif ($user->role === 'walikelas') {
                return redirect('/walikelas/dashboard');
            }
        }

        // 4. Jika kombinasi email dan password salah
        return back()->with('error', 'Email atau password salah!');
    }

    public function logout(Request $request)
    {
        // Hapus otentikasi
        Auth::logout();
        
        // Hancurkan session dan token agar tidak bisa di-back di browser
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/login');
    }
}