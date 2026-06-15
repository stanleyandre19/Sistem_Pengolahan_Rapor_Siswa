@extends('layouts.auth')

@section('content')

<div class="text-center mb-8">
    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-3">
        <span class="text-blue-600 text-3xl font-bold italic">R</span>
    </div>

    <h1 class="text-2xl font-bold text-gray-800">Rapor.id</h1>
    <p class="text-gray-400 text-sm mt-1">
        Sistem Informasi & Layanan Raport Siswa
    </p>
</div>

<form action="/login" method="POST" class="space-y-4">
    @csrf

    {{-- EMAIL --}}
    <input type="text" name="email" placeholder="Email"
        class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">

    {{-- PASSWORD --}}
    <input type="password" name="password" placeholder="Password"
        class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">

    {{-- BUTTON LOGIN --}}
    <button type="submit"
        class="w-full bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition shadow-md">
        LOGIN
    </button>

    {{-- ERROR MESSAGE --}}
    @if(session('error'))
        <p class="text-red-500 text-sm text-center">
            {{ session('error') }}
        </p>
    @endif

</form>

{{-- ❌ REGISTER DIHAPUS (BIAR TIDAK ERROR LAGI) --}}
{{-- Sistem ini hanya admin yang buat akun --}}

@endsection