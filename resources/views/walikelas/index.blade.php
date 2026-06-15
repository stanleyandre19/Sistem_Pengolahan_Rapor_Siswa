@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto space-y-6">

    <!-- HERO HEADER -->
    <div class="relative overflow-hidden rounded-3xl shadow-xl">

        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-500"></div>
        <div class="absolute inset-0 opacity-20 bg-white blur-2xl"></div>

        <div class="relative p-8 text-white flex flex-col md:flex-row md:justify-between md:items-center gap-5">

            <div>
                <h1 class="text-3xl font-bold">👨‍🏫 Data Wali Kelas</h1>
                <p class="text-blue-100 mt-1 text-sm">
                    Manajemen data wali kelas sekolah
                </p>
            </div>

            <a href="/walikelas/create"
               class="bg-white text-indigo-600 font-bold px-6 py-3 rounded-2xl shadow-lg hover:scale-105 transition">
                + Tambah Wali Kelas
            </a>

        </div>
    </div>

    <!-- INFO -->
    <div class="flex justify-between items-center">
        <p class="text-sm text-gray-500">
            Total Wali Kelas:
            <span class="font-bold text-gray-800">{{ count($data) }}</span>
        </p>
    </div>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border">

        <table class="w-full text-sm">

            <!-- HEADER -->
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-widest">
                <tr>
                    <th class="px-5 py-4 text-center">#</th>
                    <th class="px-5 py-4">Nama</th>
                    <th class="px-5 py-4">NIP</th>
                    <th class="px-5 py-4">Kelas</th>
                    <th class="px-5 py-4 text-center">Jenis Kelamin</th>
                    <th class="px-5 py-4 text-center">No HP</th>
                    <th class="px-5 py-4 text-center">Aksi</th>
                </tr>
            </thead>

            <!-- BODY -->
            <tbody class="divide-y">

                @forelse($data as $wk)
                <tr class="hover:bg-indigo-50/40 transition">

                    <!-- NO -->
                    <td class="px-5 py-4 text-center font-bold text-gray-500">
                        {{ $loop->iteration }}
                    </td>

                    <!-- NAMA -->
                    <td class="px-5 py-4">
                        <div class="font-semibold text-gray-800">
                            {{ ucwords($wk->nama) }}
                        </div>
                        <div class="text-xs text-gray-400">
                            ID: {{ $wk->id }}
                        </div>
                    </td>

                    <!-- NIP -->
                    <td class="px-5 py-4 font-medium text-gray-600">
                        {{ $wk->nip }}
                    </td>

                    <!-- KELAS -->
                    <td class="px-5 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-700">
                            {{ $wk->kelas }}
                        </span>
                    </td>

                    <!-- JENIS KELAMIN -->
                    <td class="px-5 py-4 text-center">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                            {{ $wk->jenis_kelamin == 'Laki-laki'
                                ? 'bg-blue-100 text-blue-700'
                                : 'bg-pink-100 text-pink-700' }}">
                            {{ $wk->jenis_kelamin }}
                        </span>
                    </td>

                    <!-- NO HP -->
                    <td class="px-5 py-4 text-center text-gray-600">
                        {{ $wk->no_hp ?? '-' }}
                    </td>

                    <!-- AKSI -->
                    <td class="px-5 py-4">

                        <div class="flex justify-center gap-2">

                            <a href="/walikelas/edit/{{ $wk->id }}"
                               class="px-3 py-1 rounded-xl text-xs font-semibold bg-yellow-400 hover:bg-yellow-500 text-white shadow hover:scale-105 transition">
                                Edit
                            </a>

                            <a href="/walikelas/delete/{{ $wk->id }}"
                               onclick="return confirm('Yakin mau hapus?')"
                               class="px-3 py-1 rounded-xl text-xs font-semibold bg-red-500 hover:bg-red-600 text-white shadow hover:scale-105 transition">
                                Hapus
                            </a>

                        </div>

                    </td>

                </tr>

                @empty

                <!-- EMPTY -->
                <tr>
                    <td colspan="7" class="py-16 text-center">
                        <div class="text-gray-400">
                            <div class="text-xl font-bold">Belum ada data wali kelas 😢</div>
                            <p class="text-sm mt-1">Klik tombol tambah untuk mulai input data</p>
                        </div>
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection