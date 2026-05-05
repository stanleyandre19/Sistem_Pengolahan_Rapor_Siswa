@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Data Guru</h1>

        <a href="/guru/tambah"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
           + Tambah Guru
        </a>
    </div>

    <div class="bg-white rounded-xl shadow border overflow-hidden">

        <table class="w-full text-sm text-left">

            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-center w-12">No</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">NIP</th>
                    <th class="px-4 py-3">Mapel</th>
                    <th class="px-4 py-3 text-center w-40">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse($data as $g)
                <tr class="hover:bg-gray-50">

                    <td class="px-4 py-3 text-center font-medium">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-4 py-3 font-medium">
                        {{ ucwords($g->nama) }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $g->nip }}
                    </td>

                    <td class="px-4 py-3">
                        {{-- kalau relasi --}}
                        {{ $g->mapel->nama_mapel ?? '-' }}

                        {{-- kalau bukan relasi (string biasa), pakai ini:
                        {{ $g->mapel }}
                        --}}
                    </td>

                    <td class="px-4 py-3 text-center space-x-2">

                        <a href="/guru/edit/{{ $g->id }}"
                           class="bg-yellow-400 hover:bg-yellow-500 px-3 py-1 rounded text-white text-xs">
                           Edit
                        </a>

                        <a href="/guru/hapus/{{ $g->id }}"
                           class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-white text-xs"
                           onclick="return confirm('Yakin mau hapus?')">
                           Hapus
                        </a>

                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-500">
                        Belum ada data guru
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection