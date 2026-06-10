@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto space-y-8">

    <!-- HEADER -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white p-6 rounded-2xl shadow-lg">
        <h1 class="text-3xl font-bold">Dashboard Admin</h1>
        <p class="text-sm text-blue-100 mt-1">Pengolahan Rapor Siswa SD - Sistem Informasi Akademik</p>
    </div>

    <!-- STAT CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Siswa -->
        <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Jumlah Siswa</p>
                    <h2 class="text-3xl font-bold text-blue-600 mt-2">
                        {{ $jumlah_siswa }}
                    </h2>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 10a4 4 0 100-8 4 4 0 000 8zM2 18a8 8 0 1116 0H2z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Guru -->
        <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Jumlah Guru</p>
                    <h2 class="text-3xl font-bold text-green-600 mt-2">
                        {{ $jumlah_guru }}
                    </h2>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M3 3h14v2H3V3zm2 4h10v10H5V7z"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Mapel -->
        <div class="bg-white rounded-2xl shadow-md p-6 hover:shadow-xl transition border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Jumlah Mapel</p>
                    <h2 class="text-3xl font-bold text-yellow-600 mt-2">
                        {{ $jumlah_mapel }}
                    </h2>
                </div>
                <div class="bg-yellow-100 p-3 rounded-full">
                    <svg class="w-6 h-6 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M4 3h12v2H4V3zm0 4h12v10H4V7z"/>
                    </svg>
                </div>
            </div>
        </div>

    </div>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        <div class="p-5 border-b flex justify-between items-center">
            <h2 class="font-bold text-gray-700">Data Siswa</h2>
            <span class="text-sm text-gray-400">Total: {{ count($data) }}</span>
        </div>

        <table class="w-full text-sm">

            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-center">No</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">NIS</th>
                    <th class="px-4 py-3">Kelas</th>
                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse($data as $s)
                <tr class="hover:bg-gray-50 transition">

                    <td class="px-4 py-3 text-center font-medium">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-4 py-3 font-semibold text-gray-700">
                        {{ ucwords($s->nama) }}
                    </td>

                    <td class="px-4 py-3 text-gray-600">
                        {{ $s->nis }}
                    </td>

                    <td class="px-4 py-3">
                        <span class="px-2 py-1 bg-gray-100 rounded-full text-xs">
                            {{ $s->kelas }}
                        </span>
                    </td>

                    <td class="px-4 py-3 text-center">

                        <a href="/rapor/{{ $s->id }}/pdf"
                           class="inline-block bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white px-4 py-1 rounded-lg text-xs shadow">
                           Download PDF
                        </a>

                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-10 text-gray-400">
                        Belum ada data siswa
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection