@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto space-y-6">

    <!-- HERO HEADER -->
    <div class="relative overflow-hidden rounded-3xl shadow-2xl">

        <div class="absolute inset-0 bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600"></div>
        <div class="absolute inset-0 opacity-20 bg-white blur-3xl"></div>

        <div class="relative p-10 text-white flex flex-col md:flex-row md:justify-between md:items-center gap-6">

            <div>
                <h1 class="text-4xl font-extrabold tracking-tight">
                    📚 Mata Pelajaran
                </h1>
                <p class="text-indigo-100 mt-2 text-sm">
                    Kelola semua mata pelajaran & guru pengajar dalam sistem rapor
                </p>
            </div>

            <a href="/mapel/create"
               class="bg-white text-indigo-600 font-bold px-6 py-3 rounded-2xl shadow-lg hover:scale-105 transition">
                + Tambah Mapel
            </a>

        </div>
    </div>

    <!-- STATS CARD -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-white rounded-2xl shadow-lg p-6 border hover:shadow-xl transition">
            <p class="text-gray-500 text-sm">Total Mapel</p>
            <h2 class="text-3xl font-bold text-gray-800 mt-2">
                {{ count($data) }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 border hover:shadow-xl transition">
            <p class="text-gray-500 text-sm">Mapel Aktif</p>
            <h2 class="text-3xl font-bold text-green-600 mt-2">
                {{ count($data) }}
            </h2>
        </div>

        <div class="bg-white rounded-2xl shadow-lg p-6 border hover:shadow-xl transition">
            <p class="text-gray-500 text-sm">Guru Pengajar</p>
            <h2 class="text-3xl font-bold text-blue-600 mt-2">
                {{ $data->whereNotNull('guru')->count() }}
            </h2>
        </div>

    </div>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border">

        <!-- TABLE HEADER -->
        <div class="p-6 border-b bg-gray-50 flex justify-between items-center">

            <h2 class="font-bold text-gray-700">
                📋 Daftar Mata Pelajaran
            </h2>

            <span class="text-sm text-gray-400">
                Data realtime sistem
            </span>

        </div>

        <table class="w-full text-sm">

            <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-widest">
                <tr>
                    <th class="p-4 text-center">No</th>
                    <th class="p-4 text-left">KKM</th>
                    <th class="p-4 text-left">Nama Mapel</th>
                    <th class="p-4 text-left">Guru Pengajar</th>
                    <th class="p-4 text-center">Status</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse($data as $m)
                <tr class="hover:bg-indigo-50/40 transition">

                    <!-- NO -->
                    <td class="p-4 text-center font-bold text-gray-500">
                        {{ $loop->iteration }}
                    </td>

                    <!-- KKM -->
                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                            {{ strtoupper($m->kode_mapel) }}
                        </span>
                    </td>

                    <!-- MAPEL -->
                    <td class="p-4 font-semibold text-gray-800">
                        {{ ucwords($m->nama_mapel) }}
                    </td>

                    <!-- GURU -->
                    <td class="p-4">
                        @if($m->guru)
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                👨‍🏫 {{ $m->guru->nama }}
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-500">
                                Belum ada guru
                            </span>
                        @endif
                    </td>

                    <!-- STATUS -->
                    <td class="p-4 text-center">
                        @if($m->guru)
                            <span class="px-3 py-1 text-xs rounded-full bg-emerald-100 text-emerald-700">
                                Aktif
                            </span>
                        @else
                            <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-600">
                                Belum Aktif
                            </span>
                        @endif
                    </td>

                    <!-- AKSI -->
                    <td class="p-4">

                        <div class="flex justify-center gap-2">

                            <a href="/mapel/edit/{{ $m->id }}"
                               class="px-3 py-1 rounded-xl text-xs font-semibold bg-yellow-400 hover:bg-yellow-500 text-white shadow">
                                Edit
                            </a>

                            <a href="/mapel/hapus/{{ $m->id }}"
                               onclick="return confirm('Yakin mau hapus mapel ini?')"
                               class="px-3 py-1 rounded-xl text-xs font-semibold bg-red-500 hover:bg-red-600 text-white shadow">
                                Hapus
                            </a>

                        </div>

                    </td>

                </tr>
                @empty

                <tr>
                    <td colspan="6" class="py-20 text-center">
                        <div class="text-gray-400">
                            <div class="text-2xl font-bold">Belum ada data mapel 😢</div>
                            <p class="text-sm mt-1">Silakan tambahkan mata pelajaran terlebih dahulu</p>
                        </div>
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection