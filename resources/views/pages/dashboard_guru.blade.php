@extends('layouts.app') @section('content')
<div class="max-w-6xl mx-auto space-y-6">

    <div>
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Guru</h1>
        <p class="text-sm text-gray-500">Selamat datang kembali, <span class="font-semibold text-blue-600">{{ Auth::user()->name }}</span>!</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div class="bg-indigo-100 p-6 rounded-xl shadow-sm hover:shadow transition border border-indigo-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-indigo-700 font-semibold mb-1">Status Pengguna</p>
                    <h2 class="text-2xl font-bold text-indigo-900">Tenaga Pengajar</h2>
                </div>
                <div class="bg-indigo-200 p-3 rounded-full">
                    <span class="text-2xl">📚</span>
                </div>
            </div>
        </div>

        <div class="bg-teal-100 p-6 rounded-xl shadow-sm hover:shadow transition border border-teal-200">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-teal-700 font-semibold mb-1">Akses Utama</p>
                    <h2 class="text-2xl font-bold text-teal-900">Pengolahan Nilai</h2>
                </div>
                <div class="bg-teal-200 p-3 rounded-full">
                    <span class="text-2xl">✍️</span>
                </div>
            </div>
        </div>

    </div>

    <div class="bg-white rounded-xl shadow border border-gray-200 overflow-hidden mt-6">
        <div class="p-5 border-b bg-gray-50">
            <h2 class="font-semibold text-gray-700">Aksi Cepat</h2>
        </div>
        <div class="p-6">
            <p class="text-gray-600 text-sm mb-4">Silakan masuk ke menu pengolahan nilai untuk melakukan input, edit, atau melihat daftar nilai siswa.</p>
            
            <a href="/nilai" class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg text-sm font-medium transition shadow">
                Masuk ke Menu Nilai &rarr;
            </a>
        </div>
    </div>

</div>
@endsection