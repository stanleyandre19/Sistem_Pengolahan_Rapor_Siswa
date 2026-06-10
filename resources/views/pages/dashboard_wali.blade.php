@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-100 via-blue-50 to-indigo-100 p-6">

    {{-- HERO SECTION --}}
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 shadow-2xl mb-8">

        <div class="absolute right-0 top-0 opacity-10 text-[180px] font-bold text-white">
            📚
        </div>

        <div class="p-8 relative z-10">

            <h1 class="text-4xl font-extrabold text-white mb-2">
                Dashboard Wali Kelas ✨
            </h1>

            <p class="text-blue-100 text-lg">
                Selamat datang kembali,
                <span class="font-bold text-white">
                    {{ Auth::user()->name }}
                </span>
            </p>

            <p class="text-blue-200 mt-2">
                Kelola data siswa, nilai, dan rapor dengan mudah.
            </p>

        </div>

    </div>

    {{-- INFO CARD --}}
    <div class="bg-white rounded-3xl shadow-lg border border-blue-100 p-6 mb-8">

        <div class="flex items-center gap-4">

            <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">
                📢
            </div>

            <div>

                <h3 class="font-bold text-gray-800 text-lg">
                    Informasi Sistem
                </h3>

                <p class="text-gray-600">
                    Anda dapat melihat data siswa, memantau nilai siswa,
                    serta mengakses rapor melalui menu yang tersedia.
                </p>

            </div>

        </div>

    </div>

    {{-- STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        {{-- JUMLAH SISWA --}}
        <div class="group bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-2">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500">
                        Jumlah Siswa
                    </p>

                    <h2 class="text-5xl font-extrabold text-blue-600 mt-2">
                        {{ $jumlahSiswa }}
                    </h2>

                </div>

                <div class="text-6xl group-hover:scale-110 transition">
                    👨‍🎓
                </div>

            </div>

        </div>

        {{-- DATA NILAI --}}
        <div class="group bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-2">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500">
                        Data Nilai
                    </p>

                    <h2 class="text-5xl font-extrabold text-green-600 mt-2">
                        {{ $jumlahNilai }}
                    </h2>

                </div>

                <div class="text-6xl group-hover:scale-110 transition">
                    📊
                </div>

            </div>

        </div>

        {{-- MATA PELAJARAN --}}
        <div class="group bg-white rounded-3xl p-6 shadow-lg hover:shadow-2xl transition duration-300 hover:-translate-y-2">

            <div class="flex justify-between items-center">

                <div>

                    <p class="text-gray-500">
                        Mata Pelajaran
                    </p>

                    <h2 class="text-5xl font-extrabold text-orange-500 mt-2">
                        {{ $jumlahMapel }}
                    </h2>

                </div>

                <div class="text-6xl group-hover:scale-110 transition">
                    📚
                </div>

            </div>

        </div>

    </div>

    {{-- TABEL SISWA --}}
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden mb-8">

        <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-6 py-4">

            <h3 class="text-xl font-bold text-white">
                👨‍🎓 Daftar Siswa Terbaru
            </h3>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-blue-50">

                    <tr>

                        <th class="px-6 py-4 text-left text-gray-700">
                            No
                        </th>

                        <th class="px-6 py-4 text-left text-gray-700">
                            NIS
                        </th>

                        <th class="px-6 py-4 text-left text-gray-700">
                            Nama Siswa
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($dataSiswa as $index => $siswa)

                    <tr class="border-b hover:bg-blue-50 transition">

                        <td class="px-6 py-4">
                            {{ $index + 1 }}
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-700">
                            {{ $siswa->nis ?? '-' }}
                        </td>

                        <td class="px-6 py-4 font-semibold text-gray-800">
                            {{ $siswa->nama }}
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="3" class="text-center py-8 text-gray-500">

                            Belum ada data siswa.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- MENU CEPAT --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <a href="/siswa"
           class="group bg-gradient-to-r from-indigo-600 to-blue-600 text-white rounded-3xl p-6 shadow-xl hover:scale-105 transition">

            <div class="flex items-center justify-between">

                <div>

                    <h3 class="text-xl font-bold">
                        📚 Data Siswa
                    </h3>

                    <p class="text-blue-100 mt-1">
                        Kelola dan lihat data siswa
                    </p>

                </div>

                <div class="text-5xl group-hover:rotate-6 transition">
                    ➜
                </div>

            </div>

        </a>

        <a href="/rapor"
           class="group bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-3xl p-6 shadow-xl hover:scale-105 transition">

            <div class="flex items-center justify-between">

                <div>

                    <h3 class="text-xl font-bold">
                        🖨️ Lihat Rapor
                    </h3>

                    <p class="text-green-100 mt-1">
                        Akses dan cetak rapor siswa
                    </p>

                </div>

                <div class="text-5xl group-hover:rotate-6 transition">
                    ➜
                </div>

            </div>

        </a>

    </div>

</div>

@endsection