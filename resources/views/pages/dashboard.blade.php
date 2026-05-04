@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <!-- JUDUL -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Guru</h1>
        <p class="text-sm text-gray-500">Pengolahan Rapor Siswa Sekolah Dasar</p>
    </div>

    <!-- CARD -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-blue-100 p-5 rounded-xl">
            <p class="text-sm text-blue-700">Jumlah Siswa</p>
            <h2 class="text-2xl font-bold text-blue-800 mt-2">120</h2>
        </div>

        <div class="bg-green-100 p-5 rounded-xl">
            <p class="text-sm text-green-700">Jumlah Guru</p>
            <h2 class="text-2xl font-bold text-green-800 mt-2">25</h2>
        </div>

        <div class="bg-yellow-100 p-5 rounded-xl">
            <p class="text-sm text-yellow-700">Pelajaran</p>
            <h2 class="text-2xl font-bold text-yellow-800 mt-2">10</h2>
        </div>

    </div>

    <!-- TABEL -->
    <div class="bg-white p-6 rounded-xl shadow-sm border">

        <div class="flex justify-between items-center mb-4">
            <h2 class="text-lg font-bold text-gray-700">Data Siswa</h2>

            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-600">
                + Tambah Siswa
            </button>
        </div>

        <table class="w-full text-sm text-left">

            <thead>
                <tr class="bg-gray-100 text-gray-600">
                    <th class="p-3">No</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">NIS</th>
                    <th class="p-3">Kelas</th>
                    <th class="p-3">Nilai Rapor</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>

                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">1</td>
                    <td class="p-3">Andi</td>
                    <td class="p-3">12345</td>
                    <td class="p-3">Kelas 5A</td>
                    <td class="p-3 font-bold text-blue-600">85</td>
                    <td class="p-3 space-x-2">

                        <button class="bg-yellow-400 px-3 py-1 rounded text-white text-xs">
                            Edit
                        </button>

                        <button class="bg-red-500 px-3 py-1 rounded text-white text-xs">
                            Hapus
                        </button>

                        <a href="/rapor/1/pdf"
                           class="bg-green-500 px-3 py-1 rounded text-white text-xs">
                            PDF
                        </a>

                    </td>
                </tr>

                <tr class="border-b hover:bg-gray-50">
                    <td class="p-3">2</td>
                    <td class="p-3">Budi</td>
                    <td class="p-3">67890</td>
                    <td class="p-3">Kelas 5A</td>
                    <td class="p-3 font-bold text-blue-600">90</td>
                    <td class="p-3 space-x-2">

                        <button class="bg-yellow-400 px-3 py-1 rounded text-white text-xs">
                            Edit
                        </button>

                        <button class="bg-red-500 px-3 py-1 rounded text-white text-xs">
                            Hapus
                        </button>

                        <a href="/rapor/2/pdf"
                           class="bg-green-500 px-3 py-1 rounded text-white text-xs">
                            PDF
                        </a>

                    </td>
                </tr>

            </tbody>

        </table>

    </div>

</div>

@endsection