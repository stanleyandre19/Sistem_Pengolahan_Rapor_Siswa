@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto space-y-6 p-4">

    <div class="relative overflow-hidden rounded-2xl bg-gradient-to-r from-indigo-500 via-purple-500 to-blue-500 p-8 shadow-sm">
        <div class="relative flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
            <div class="flex items-center gap-4">
                <div class="p-4 bg-white/20 backdrop-blur-md rounded-full text-white">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5zm0 0v6m-4-6v3a4 4 0 008 0v-3"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-white tracking-wide">Data Siswa</h1>
                    <p class="text-white/80 text-sm mt-0.5">Kelola data siswa dengan mudah, akurat dan terstruktur</p>
                </div>
            </div>

            @if(Auth::user()->role === 'admin')
            <a href="/siswa/tambah" class="inline-flex items-center bg-white text-blue-600 font-semibold px-5 py-2.5 rounded-xl shadow-sm hover:bg-gray-50 transition gap-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path></svg>
                Tambah Siswa
            </a>
            @endif
        </div>
    </div>

    @if(isset($tahun_aktif) && $tahun_aktif)
    <div class="bg-amber-50/60 border border-amber-100 rounded-xl p-4 flex items-center justify-between shadow-sm">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-amber-100 text-amber-600 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
            <div class="text-sm">
                <span class="text-gray-500">Tahun Ajaran Aktif:</span>
                <span class="font-semibold text-gray-800 ml-1">{{ $tahun_aktif->tahun_ajaran }}</span>
                <span class="text-gray-300 mx-2">|</span>
                <span class="text-gray-500">Semester:</span>
                <span class="font-semibold text-gray-800 ml-1">{{ $tahun_aktif->semester }}</span>
            </div>
        </div>
        <span class="px-3 py-1 rounded-lg text-xs font-semibold bg-amber-100 text-amber-700">
            Aktif
        </span>
    </div>
    @endif

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-blue-600 uppercase tracking-wider">Total Siswa</p>
                <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ $data->total() }}</h3>
                <span class="text-xs text-gray-400">Siswa Terdaftar</span>
            </div>
            <div class="p-3 bg-blue-50 text-blue-500 rounded-2xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-green-600 uppercase tracking-wider">Total Kelas</p>
                <h3 class="text-2xl font-bold text-gray-800 mt-1">{{ count($list_kelas) ?: '6' }}</h3>
                <span class="text-xs text-gray-400">Kelas Tersedia</span>
            </div>
            <div class="p-3 bg-green-50 text-green-500 rounded-2xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-purple-600 uppercase tracking-wider">Tahun Ajaran Aktif</p>
                <h3 class="text-lg font-bold text-gray-800 mt-1.5">{{ $tahun_aktif->tahun_ajaran ?? '2025 / 2026' }}</h3>
                <span class="text-xs text-purple-500 font-medium">{{ $tahun_aktif->semester ?? 'Semester Ganjil' }}</span>
            </div>
            <div class="p-3 bg-purple-50 text-purple-500 rounded-2xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            </div>
        </div>

        <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold text-teal-600 uppercase tracking-wider">Status</p>
                <h3 class="text-2xl font-bold text-teal-600 mt-1">Aktif</h3>
                <span class="text-xs text-gray-400">Periode Berjalan</span>
            </div>
            <div class="p-3 bg-teal-50 text-teal-500 rounded-2xl">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
        </div>
    </div>

    <div class="bg-white border border-gray-100 shadow-sm rounded-2xl p-4 flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
        <form method="GET" action="/siswa" class="flex flex-col sm:flex-row gap-3 flex-1 items-stretch sm:items-center">
            
            <div class="relative flex-1 max-w-md">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </span>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, NIS, atau kelas..." 
                       class="w-full pl-10 pr-4 py-2.5 bg-gray-50/50 rounded-xl border border-gray-200 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-400 outline-none transition text-sm">
            </div>

            <div class="relative w-full sm:w-56">
                <select name="filter_kelas" onchange="this.form.submit()" 
                        class="w-full px-4 py-2.5 bg-gray-50/50 rounded-xl border border-gray-200 focus:bg-white focus:ring-2 focus:ring-blue-100 focus:border-blue-400 outline-none transition text-sm cursor-pointer appearance-none text-gray-700">
                    <option value="">Semua Kelas</option>
                    @foreach($list_kelas as $kls)
                        <option value="{{ $kls }}" {{ request('filter_kelas') == $kls ? 'selected' : '' }}>
                            {{ $kls }}
                        </option>
                    @endforeach
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-gray-400">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>

            @if(request('search') || request('filter_kelas'))
                <a href="/siswa" class="inline-flex items-center justify-center px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-600 rounded-xl text-sm font-medium transition gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 1121.21 15H19"></path></svg>
                    Reset Filter
                </a>
            @endif
        </form>

        <div class="flex items-center gap-2 self-start lg:self-auto text-sm text-gray-500">
            <span>Total Data</span>
            <span class="px-2.5 py-1 bg-blue-600 text-white font-semibold text-xs rounded-lg shadow-sm">
                {{ $data->total() }} <span class="font-normal text-blue-100">Siswa</span>
            </span>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-gray-50/70 border-b border-gray-100 text-gray-500 font-semibold text-xs uppercase tracking-wider">
                    <tr>
                        <th class="px-6 py-4 text-center w-16">No.</th>
                        <th class="px-6 py-4">Nama Siswa</th>
                        <th class="px-6 py-4">NIS</th>
                        <th class="px-6 py-4">Kelas</th>
                        <th class="px-6 py-4 text-center">Status</th>
                        <th class="px-6 py-4 text-center w-28">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 text-gray-700">
                    @forelse($data as $s)
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-6 py-4 text-center font-medium text-gray-400">
                            {{ ($data->currentPage() - 1) * $data->perPage() + $loop->iteration }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="font-semibold text-gray-800">{{ ucwords($s->nama) }}</div>
                            <div class="text-xs text-gray-400 mt-0.5">Student ID: {{ $s->id }}</div>
                        </td>

                        <td class="px-6 py-4 font-medium text-gray-500">
                            {{ $s->nis }}
                        </td>

                        <td class="px-6 py-4">
                            @php
                                $colors = [
                                    'Kelas 6' => 'bg-blue-50 text-blue-600 border border-blue-100',
                                    'Kelas 5' => 'bg-purple-50 text-purple-600 border border-purple-100',
                                    'Kelas 4' => 'bg-emerald-50 text-emerald-600 border border-emerald-100',
                                    'Kelas 3' => 'bg-amber-50 text-amber-600 border border-amber-100',
                                    'Kelas 2' => 'bg-rose-50 text-rose-600 border border-rose-100',
                                    'Kelas 1' => 'bg-cyan-50 text-cyan-600 border border-cyan-100',
                                ];
                                $badgeStyle = $colors[$s->kelas] ?? 'bg-gray-50 text-gray-600 border border-gray-100';
                            @endphp
                            <span class="px-2.5 py-1 rounded-lg text-xs font-semibold {{ $badgeStyle }}">
                                {{ $s->kelas }}
                            </span>
                        </td>

                        <td class="px-6 py-4 text-center">
                            <span class="px-2.5 py-1 rounded-lg text-xs font-semibold bg-green-50 text-green-600 border border-green-100">
                                Aktif
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex justify-center items-center gap-1.5">
                                <a href="/siswa/edit/{{ $s->id }}" title="Edit Data"
                                   class="p-1.5 bg-amber-400 hover:bg-amber-500 text-white rounded-lg shadow-sm transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                </a>

                                @if(Auth::user()->role === 'admin')
                                <a href="/siswa/hapus/{{ $s->id }}" onclick="return confirm('Yakin ingin menghapus data ini?')" title="Hapus Data"
                                   class="p-1.5 bg-rose-500 hover:bg-rose-600 text-white rounded-lg shadow-sm transition">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-16 text-center text-gray-400">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 text-gray-300 mb-2" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="text-base font-semibold">Tidak ada data ditemukan 😢</div>
                                <p class="text-xs text-gray-400 mt-0.5">Coba tambah siswa baru atau ubah kata kunci pencarian Anda</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($data->hasPages())
        <div class="bg-gray-50/50 border-t border-gray-100 px-6 py-4 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-gray-500">
            <div>
                Menampilkan 
                <span class="font-semibold text-gray-700">{{ $data->firstItem() ?? 0 }}</span> 
                sampai 
                <span class="font-semibold text-gray-700">{{ $data->lastItem() ?? 0 }}</span> 
                dari 
                <span class="font-semibold text-gray-700">{{ $data->total() }}</span> data
            </div>
            
            <div class="flex items-center gap-1">
                {{-- Tombol Sebelumnya --}}
                @if ($data->onFirstPage())
                    <span class="p-1 px-2.5 bg-gray-100 border border-gray-200 rounded-lg text-gray-400 cursor-not-allowed">«</span>
                @else
                    <a href="{{ $data->previousPageUrl() }}" class="p-1 px-2.5 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 text-gray-600 transition">«</a>
                @endif

                {{-- Halaman Angka --}}
                @foreach ($data->getUrlRange(max(1, $data->currentPage() - 2), min($data->lastPage(), $data->currentPage() + 2)) as $page => $url)
                    @if ($page == $data->currentPage())
                        <span class="p-1 px-3 bg-blue-600 text-white font-semibold rounded-lg shadow-sm">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="p-1 px-3 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 text-gray-600 transition">{{ $page }}</a>
                    @endif
                @endforeach

                {{-- Tombol Selanjutnya --}}
                @if ($data->hasMorePages())
                    <a href="{{ $data->nextPageUrl() }}" class="p-1 px-2.5 bg-white border border-gray-200 rounded-lg hover:bg-gray-50 text-gray-600 transition">»</a>
                @else
                    <span class="p-1 px-2.5 bg-gray-100 border border-gray-200 rounded-lg text-gray-400 cursor-not-allowed">»</span>
                @endif
            </div>
        </div>
        @endif
    </div>

</div>
@endsection