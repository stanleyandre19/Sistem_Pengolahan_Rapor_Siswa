@extends('layouts.app')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-800">Dashboard Wali Kelas</h1>
    <p class="text-gray-600 mb-6">Halo Bapak/Ibu {{ Auth::user()->name }}, berikut rekap rapor siswa kelas Anda.</p>

    <div class="bg-white p-6 rounded-lg shadow">
        <h3 class="font-bold mb-4">Daftar Siswa Kelas Binaan</h3>
        <p class="text-sm text-gray-500">Fitur melihat rapor siswa akan tampil di sini.</p>
    </div>
</div>
@endsection