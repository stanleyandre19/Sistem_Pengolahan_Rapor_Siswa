@extends('layouts.app')

@section('content')

<div class="p-6">

    {{-- Judul --}}
    <h1 class="text-3xl font-bold text-gray-800">
        Dashboard Wali Kelas
    </h1>

    <p class="text-gray-600 mt-2 mb-6">
        Halo Bapak/Ibu {{ Auth::user()->name }},
        selamat datang di Sistem Pengolahan Rapor Siswa.
    </p>

    {{-- Informasi --}}
    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
        <h3 class="font-semibold text-blue-700 mb-2">
            Informasi
        </h3>

        <p>
            Anda dapat melihat data siswa, memantau nilai siswa,
            dan mengakses rapor melalui menu yang tersedia.
        </p>
    </div>

    {{-- Statistik --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

        {{-- Jumlah Siswa --}}
        <div class="bg-white rounded-lg shadow p-6">

            <p class="text-gray-500 text-sm">
                Jumlah Siswa
            </p>

            <h2 class="text-4xl font-bold text-blue-600 mt-3">
                {{ $jumlahSiswa }}
            </h2>

        </div>

        {{-- Data Nilai --}}
        <div class="bg-white rounded-lg shadow p-6">

            <p class="text-gray-500 text-sm">
                Data Nilai
            </p>

            <h2 class="text-4xl font-bold text-green-600 mt-3">
                {{ $jumlahNilai }}
            </h2>

        </div>

        {{-- Mata Pelajaran --}}
        <div class="bg-white rounded-lg shadow p-6">

            <p class="text-gray-500 text-sm">
                Mata Pelajaran
            </p>

            <h2 class="text-4xl font-bold text-orange-500 mt-3">
                {{ $jumlahMapel }}
            </h2>

        </div>

    </div>

    {{-- Tabel Siswa --}}
    <div class="bg-white rounded-lg shadow">

        <div class="p-5 border-b">

            <h3 class="text-lg font-bold text-gray-800">
                Daftar Siswa Terbaru
            </h3>

        </div>

        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-gray-100">

                    <tr>
                        <th class="px-4 py-3 text-left">
                            No
                        </th>

                        <th class="px-4 py-3 text-left">
                            Nama Siswa
                        </th>

                        <th class="px-4 py-3 text-left">
                            Jenis Kelamin
                        </th>
                    </tr>

                </thead>

                <tbody>

                    @forelse($dataSiswa as $index => $siswa)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="px-4 py-3">
                                {{ $index + 1 }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $siswa->nama }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $siswa->jenis_kelamin ?? '-' }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="3" class="text-center py-6 text-gray-500">
                                Belum ada data siswa.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- Shortcut Menu --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">

        <a href="/siswa"
           class="bg-indigo-500 hover:bg-indigo-600 text-white text-center p-4 rounded-lg shadow">

            📚 Lihat Data Siswa

        </a>

        <a href="/siswa"
           class="bg-green-500 hover:bg-green-600 text-white text-center p-4 rounded-lg shadow">

            🖨️ Lihat Rapor Siswa

        </a>

    </div>

</div>

@endsection