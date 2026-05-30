<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // validasi input
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);

        // cek login email + password
        if (Auth::attempt($request->only('email', 'password'))) {

            $user = Auth::user();

            // cek role dari dropdown vs database
            if ($user->role != $request->role) {
                Auth::logout();
                return back()->with('error', 'Role tidak sesuai!');
            }

            // redirect sesuai role
            if ($user->role == 'admin') {
                return redirect('/admin/dashboard');
            }

            if ($user->role == 'guru') {
                return redirect('/guru/dashboard');
            }

            if ($user->role == 'walikelas') {
                return redirect('/walikelas/dashboard');
            }
        }

        return back()->with('error', 'Email atau password salah!');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
