@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Data Mata Pelajaran</h1>

        <a href="/mapel/create"
           class="bg-blue-600 text-white px-4 py-2 rounded">
           + Tambah
        </a>
    </div>

    <div class="bg-white rounded-xl shadow border overflow-hidden">

        <table class="w-full text-sm">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-center">No</th>
                    <th class="p-3">KKM</th>
                    <th class="p-3">Nama Mapel</th>
                    <th class="p-3">Guru</th>
                    <th class="p-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($data as $m)
                <tr class="border-t">
                    <td class="p-3 text-center">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ strtoupper($m->kode_mapel) }}</td>
                    <td class="p-3">{{ ucwords($m->nama_mapel) }}</td>
                    <td class="p-3">{{ $m->guru->nama ?? '-' }}</td>

                    <td class="p-3 text-center space-x-2">
                        <a href="/mapel/edit/{{ $m->id }}"
                           class="bg-yellow-400 px-3 py-1 rounded text-white text-xs">
                           Edit
                        </a>

                        <a href="/mapel/hapus/{{ $m->id }}"
                           onclick="return confirm('Yakin mau hapus?')"
                           class="bg-red-500 px-3 py-1 rounded text-white text-xs">
                           Hapus
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center p-4">
                        Belum ada data
                    </td>
                </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</div>

@endsection