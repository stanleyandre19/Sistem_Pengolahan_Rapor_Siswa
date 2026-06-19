@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto space-y-6">

    <!-- HERO HEADER -->
    <div class="relative overflow-hidden rounded-3xl shadow-xl">

        <div class="absolute inset-0 bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-500"></div>
        <div class="absolute inset-0 opacity-20 bg-white blur-2xl"></div>

        <div class="relative p-8 text-white flex flex-col md:flex-row md:justify-between md:items-center gap-5">

            <div>
                <h1 class="text-3xl font-bold">
                    👨‍🏫 Data Guru
                </h1>

                <p class="text-blue-100 mt-1 text-sm">
                    Manajemen data guru sekolah
                </p>
            </div>

            @if(Auth::user()->role === 'admin')
            <a href="/guru/tambah"
               class="bg-white text-indigo-600 font-bold px-6 py-3 rounded-2xl shadow-lg hover:scale-105 transition">
                + Tambah Guru
            </a>
            @endif

        </div>

    </div>

    <!-- INFO -->
    <div class="flex justify-between items-center">

        <p class="text-sm text-gray-500">
            Total Guru :
            <span class="font-bold text-gray-800">
                {{ count($data) }}
            </span>
        </p>

    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border">

        <table class="w-full text-sm">

            <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-widest">

                <tr>

                    <th class="px-5 py-4 text-center">#</th>
                    <th class="px-5 py-4">Guru</th>
                    <th class="px-5 py-4">NIP</th>
                    <th class="px-5 py-4">Mapel</th>
                    <th class="px-5 py-4 text-center">Status</th>

                    @if(Auth::user()->role === 'admin')
                    <th class="px-5 py-4 text-center">Aksi</th>
                    @endif

                </tr>

            </thead>

            <tbody class="divide-y">

                @forelse($data as $g)

                <tr class="hover:bg-indigo-50/40 transition">

                    <!-- NOMOR -->
                    <td class="px-5 py-4 text-center font-bold text-gray-500">
                        {{ $loop->iteration }}
                    </td>

                    <!-- NAMA -->
                    <td class="px-5 py-4">

                        <div class="font-semibold text-gray-800">
                            {{ ucwords($g->nama) }}
                        </div>

                        <div class="text-xs text-gray-400">
                            Teacher ID : {{ $g->id }}
                        </div>

                    </td>

                    <!-- NIP -->
                    <td class="px-5 py-4 font-medium text-gray-600">
                        {{ $g->nip }}
                    </td>

                    <!-- MAPEL -->
                    <td class="px-5 py-4">

                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-700">
                            {{ $g->mapel->nama_mapel ?? '-' }}
                        </span>

                    </td>

                    <!-- STATUS -->
                    <td class="px-5 py-4 text-center">

                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                            Aktif
                        </span>

                    </td>

                    @if(Auth::user()->role === 'admin')

                    <!-- AKSI -->
                    <td class="px-5 py-4">

                        <div class="flex justify-center gap-2">

                            <a href="/guru/edit/{{ $g->id }}"
                               class="px-3 py-1 rounded-xl text-xs font-semibold bg-yellow-400 hover:bg-yellow-500 text-white shadow hover:scale-105 transition">
                                ✏️ Edit
                            </a>

                            <a href="/guru/hapus/{{ $g->id }}"
                               onclick="return confirm('Yakin ingin menghapus data guru ini?')"
                               class="px-3 py-1 rounded-xl text-xs font-semibold bg-red-500 hover:bg-red-600 text-white shadow hover:scale-105 transition">
                                🗑 Hapus
                            </a>

                        </div>

                    </td>

                    @endif

                </tr>

                @empty

                <tr>

                    <td colspan="{{ Auth::user()->role === 'admin' ? '6' : '5' }}"
                        class="py-16 text-center">

                        <div class="text-gray-400">

                            <div class="text-xl font-bold">
                                Belum ada data guru 😢
                            </div>

                            <p class="text-sm mt-1">
                                Klik tombol tambah untuk mulai input data
                            </p>

                        </div>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection