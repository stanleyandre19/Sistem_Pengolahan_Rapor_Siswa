@extends('layouts.app')

@section('content')

<div class="space-y-6">

    {{-- HEADER --}}
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl p-8 text-white shadow-lg">
        <h1 class="text-3xl font-bold mb-2">
            Dashboard Guru
        </h1>

        <p class="text-blue-100">
            Selamat datang kembali,
            <span class="font-bold">{{ Auth::user()->name }}</span>.
            Semoga hari Anda menyenangkan dan produktif.
        </p>
    </div>

    {{-- CARD INFO --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">
                        Role Pengguna
                    </p>

                    <h2 class="text-xl font-bold text-gray-800">
                        Guru
                    </h2>
                </div>

                <div class="text-4xl">
                    👨‍🏫
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">
                        Tugas Utama
                    </p>

                    <h2 class="text-xl font-bold text-gray-800">
                        Input Nilai
                    </h2>
                </div>

                <div class="text-4xl">
                    📝
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-md p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm">
                        Sistem
                    </p>

                    <h2 class="text-xl font-bold text-gray-800">
                        Rapor SD
                    </h2>
                </div>

                <div class="text-4xl">
                    📚
                </div>
            </div>
        </div>

    </div>

    {{-- MENU CEPAT --}}
    <div class="bg-white rounded-2xl shadow-md">

        <div class="p-5 border-b">
            <h2 class="font-bold text-lg text-gray-700">
                Menu Cepat
            </h2>
        </div>

        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">

            <a href="/nilai"
                class="bg-blue-600 hover:bg-blue-700 text-white p-5 rounded-xl transition shadow">

                <div class="flex items-center gap-3">
                    <span class="text-2xl">✍️</span>

                    <div>
                        <h3 class="font-semibold">
                            Input Nilai
                        </h3>

                        <p class="text-sm text-blue-100">
                            Kelola nilai siswa
                        </p>
                    </div>
                </div>

            </a>

            <a href="/siswa"
                class="bg-green-600 hover:bg-green-700 text-white p-5 rounded-xl transition shadow">

                <div class="flex items-center gap-3">
                    <span class="text-2xl">👨‍🎓</span>

                    <div>
                        <h3 class="font-semibold">
                            Data Siswa
                        </h3>

                        <p class="text-sm text-green-100">
                            Lihat data siswa
                        </p>
                    </div>
                </div>

            </a>

        </div>

    </div>

    {{-- INFORMASI --}}
    <div class="bg-white rounded-2xl shadow-md">

        <div class="p-5 border-b">
            <h2 class="font-bold text-lg text-gray-700">
                Informasi Guru
            </h2>
        </div>

        <div class="p-6">

            <div class="flex items-center gap-4">

                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center text-3xl">
                    👨‍🏫
                </div>

                <div>

                    <h3 class="font-bold text-lg text-gray-800">
                        {{ Auth::user()->name }}
                    </h3>

                    <p class="text-gray-500">
                        Guru Aktif Sistem Pengolahan Rapor
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection