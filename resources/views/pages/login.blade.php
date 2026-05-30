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

    <input type="text" name="email" placeholder="Email"
        class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">

    <input type="password" name="password" placeholder="Password"
        class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">

    <select name="role" required
    class="w-full p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">
    <option value="">-- Pilih Role --</option>
    <option value="admin">Admin</option>
    <option value="guru">Guru</option>
    <option value="walikelas">Wali Kelas</option>
</select>

    <button type="submit"
        class="w-full bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition shadow-md">
        LOGIN
    </button>
    
    @if(session('error'))
    <p class="text-red-500 text-sm text-center">
        {{ session('error') }}
    </p>
@endif

</form>

<div class="mt-6 flex flex-col space-y-2 text-center">
    <a href="{{ route('register') }}"
        class="text-sm text-blue-600 font-semibold hover:underline">
        Belum punya akun? Daftar di sini
    </a>
</div>

@endsection