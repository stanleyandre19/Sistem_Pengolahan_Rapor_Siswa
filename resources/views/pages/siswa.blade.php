@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto space-y-6">

    <div class="relative overflow-hidden rounded-3xl shadow-xl">

        <div class="absolute inset-0 bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-500"></div>

        <div class="absolute inset-0 opacity-20 bg-white blur-2xl"></div>

        <div class="relative p-8 text-white flex flex-col md:flex-row md:justify-between md:items-center gap-5">

            <div>
                <h1 class="text-3xl font-bold tracking-wide">
                    📚 Data Siswa
                </h1>

                <p class="text-blue-100 mt-1 text-sm">
                    Sistem manajemen siswa modern & cepat
                </p>
            </div>

            @if(Auth::user()->role === 'admin')
            <a href="/siswa/tambah"
               class="bg-white text-blue-600 font-bold px-6 py-3 rounded-2xl shadow-lg hover:scale-105 transition">
                + Tambah Siswa
            </a>
            @endif

        </div>

    </div>

    @if(isset($tahun_aktif) && $tahun_aktif)
    <div class="bg-amber-50 border border-amber-200 rounded-2xl p-4 flex items-center justify-between shadow-sm">
        <div class="flex items-center gap-3">
            <span class="text-xl">📅</span>
            <div>
                <h4 class="text-sm font-semibold text-amber-800">Tahun Ajaran Aktif</h4>
                <p class="text-xs text-amber-700">Periode Berjalan: <span class="font-bold">{{ $tahun_aktif->tahun_ajaran }}</span> — Semester <span class="font-bold">{{ $tahun_aktif->semester }}</span></p>
            </div>
        </div>
        <span class="px-3 py-1 rounded-full text-xs font-bold bg-amber-200 text-amber-800 animate-pulse">
            Aktif
        </span>
    </div>
    @else
    <div class="bg-red-50 border border-red-200 rounded-2xl p-4 text-center text-sm text-red-700 shadow-sm">
        ⚠️ Belum ada Tahun Ajaran yang berstatus 'Aktif' di database. Silakan isi dan aktifkan di phpMyAdmin.
    </div>
    @endif

    <div class="bg-white/80 backdrop-blur-xl border shadow-md rounded-2xl p-4 flex flex-col md:flex-row md:items-center md:justify-between gap-3">

        <form method="GET" action="/siswa" class="w-full md:w-auto flex flex-col sm:flex-row gap-3 items-stretch sm:items-center">

            <div class="relative w-full md:w-80">
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="🔍 Cari nama / NIS / kelas..."
                       class="w-full px-4 py-3 rounded-xl border focus:ring-2 focus:ring-blue-400 outline-none shadow-sm text-sm">
            </div>

            <div class="relative w-full sm:w-48">
                <select name="filter_kelas" 
                        onchange="this.form.submit()"
                        class="w-full px-4 py-3 rounded-xl border focus:ring-2 focus:ring-blue-400 outline-none shadow-sm text-sm bg-white cursor-pointer appearance-none">
                    <option value="">🏫 Semua Kelas</option>
                    @foreach($list_kelas as $kls)
                        <option value="{{ $kls }}" {{ request('filter_kelas') == $kls ? 'selected' : '' }}>
                             {{ $kls }}
                        </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-500">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>

            @if(request('search') || request('filter_kelas'))
                <a href="/siswa" class="text-xs text-red-500 hover:underline flex items-center justify-center sm:justify-start px-2 py-1">
                    ❌ Hapus Filter
                </a>
            @endif

        </form>

        <div class="text-sm text-gray-500">

            Total Siswa :
            <span class="font-bold text-gray-800">
                {{ count($data) }}
            </span>

        </div>

    </div>

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden border">

        <table class="w-full text-sm">

            <thead class="bg-gray-50 text-gray-600 uppercase text-xs tracking-widest">

                <tr>
                    <th class="px-5 py-4 text-center">#</th>
                    <th class="px-5 py-4">Siswa</th>
                    <th class="px-5 py-4">NIS</th>
                    <th class="px-5 py-4">Kelas</th>
                    <th class="px-5 py-4 text-center">Status</th>

                    @if(Auth::user()->role === 'admin')
                    <th class="px-5 py-4 text-center">Aksi</th>
                    @endif

                </tr>

            </thead>

            <tbody class="divide-y">

                @forelse($data as $s)

                <tr class="hover:bg-blue-50/40 transition">

                    <td class="px-5 py-4 text-center font-bold text-gray-500">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-5 py-4">

                        <div class="font-semibold text-gray-800">
                            {{ ucwords($s->nama) }}
                        </div>

                        <div class="text-xs text-gray-400">
                            Student ID : {{ $s->id }}
                        </div>

                    </td>

                    <td class="px-5 py-4 font-medium text-gray-600">
                        {{ $s->nis }}
                    </td>

                    <td class="px-5 py-4">

                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-indigo-100 text-indigo-700">
                            {{ $s->kelas }}
                        </span>

                    </td>

                    <td class="px-5 py-4 text-center">

                        <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                            Aktif
                        </span>

                    </td>

                    @if(Auth::user()->role === 'admin')

                    <td class="px-5 py-4">

                        <div class="flex justify-center gap-2">

                            <a href="/siswa/edit/{{ $s->id }}"
                               class="px-3 py-1 rounded-xl text-xs font-semibold bg-yellow-400 hover:bg-yellow-500 text-white shadow hover:scale-105 transition">
                                ✏️ Edit
                            </a>

                            <a href="/siswa/hapus/{{ $s->id }}"
                               onclick="return confirm('Yakin ingin menghapus data ini?')"
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
                                Tidak ada data 😢
                            </div>

                            <p class="text-sm mt-1">
                                Coba tambah siswa baru atau ubah pencarian
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