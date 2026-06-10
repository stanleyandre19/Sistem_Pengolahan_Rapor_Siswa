@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto space-y-6">

    <!-- HERO HEADER (GLASS + GRADIENT) -->
    <div class="relative overflow-hidden rounded-3xl shadow-xl">

        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-500"></div>

        <div class="absolute inset-0 opacity-20 bg-white blur-2xl"></div>

        <div class="relative p-8 text-white flex flex-col md:flex-row md:justify-between md:items-center gap-5">

            <div>
                <h1 class="text-3xl font-bold tracking-wide">📚 Data Siswa</h1>
                <p class="text-blue-100 mt-1 text-sm">
                    Sistem manajemen siswa modern & cepat
                </p>
            </div>

            <a href="/siswa/tambah"
               class="bg-white text-blue-600 font-bold px-6 py-3 rounded-2xl shadow-lg hover:scale-105 transition">
                + Tambah Siswa
            </a>

        </div>
    </div>

    <!-- SEARCH BAR CARD -->
    <div class="bg-white/80 backdrop-blur-xl border shadow-md rounded-2xl p-4 flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <form method="GET" action="/siswa" class="w-full md:w-96">
            <input type="text"
                   name="search"
                   value="{{ request('search') }}"
                   placeholder="🔍 Cari nama / NIS / kelas..."
                   class="w-full px-4 py-3 rounded-xl border focus:ring-2 focus:ring-blue-400 outline-none shadow-sm">
        </form>

        <div class="text-sm text-gray-500">
            Total Siswa:
            <span class="font-bold text-gray-800">{{ count($data) }}</span>
        </div>

    </div>

    <!-- TABLE CARD PREMIUM -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border">

        <table class="w-full text-sm">

            <!-- HEADER -->
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-widest">
                <tr>
                    <th class="px-5 py-4 text-center">#</th>
                    <th class="px-5 py-4">Siswa</th>
                    <th class="px-5 py-4">NIS</th>
                    <th class="px-5 py-4">Kelas</th>
                    <th class="px-5 py-4 text-center">Status</th>
                    <th class="px-5 py-4 text-center">Aksi</th>
                </tr>
            </thead>

            <!-- BODY -->
            <tbody class="divide-y">

                @forelse($data as $s)
                <tr class="hover:bg-blue-50/40 transition">

                    <!-- NO -->
                    <td class="px-5 py-4 text-center font-bold text-gray-500">
                        {{ $loop->iteration }}
                    </td>

                    <!-- NAMA -->
                    <td class="px-5 py-4">
                        <div class="font-semibold text-gray-800">
                            {{ ucwords($s->nama) }}
                        </div>
                        <div class="text-xs text-gray-400">
                            Student ID: {{ $s->id }}
                        </div>
                    </td>

                    <!-- NIS -->
                    <td class="px-5 py-4 font-medium text-gray-600">
                        {{ $s->nis }}
                    </td>

                    <!-- KELAS -->
                    <td class="px-5 py-4">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-700">
                            {{ $s->kelas }}
                        </span>
                    </td>

                    <!-- STATUS -->
                    <td class="px-5 py-4 text-center">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                            Aktif
                        </span>
                    </td>

                    <!-- AKSI -->
                    <td class="px-5 py-4">

                        <div class="flex justify-center gap-2">

                            <a href="/siswa/edit/{{ $s->id }}"
                               class="px-3 py-1 rounded-xl text-xs font-semibold bg-yellow-400 hover:bg-yellow-500 text-white shadow hover:scale-105 transition">
                                Edit
                            </a>

                            <a href="/siswa/hapus/{{ $s->id }}"
                               onclick="return confirm('Yakin mau hapus data ini?')"
                               class="px-3 py-1 rounded-xl text-xs font-semibold bg-red-500 hover:bg-red-600 text-white shadow hover:scale-105 transition">
                                Hapus
                            </a>

                        </div>

                    </td>

                </tr>

                @empty

                <!-- EMPTY -->
                <tr>
                    <td colspan="6" class="py-16 text-center">
                        <div class="text-gray-400">
                            <div class="text-xl font-bold">Tidak ada data 😢</div>
                            <p class="text-sm mt-1">Coba tambah siswa baru atau ubah pencarian</p>
                        </div>
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection