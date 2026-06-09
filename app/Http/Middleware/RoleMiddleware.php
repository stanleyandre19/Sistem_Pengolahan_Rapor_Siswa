<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Mengecek apakah role user saat ini ada di dalam daftar role yang diizinkan
        if (!in_array(Auth::user()->role, $roles)) {
            dd('ROLE BENTROK! Halaman ini minta akses salah satu dari: ' . implode(', ', $roles) . ' TAPI akunmu rolenya: ' . Auth::user()->role);
        }

        return $next($request);
    }
}