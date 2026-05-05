@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <!-- JUDUL -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Guru</h1>
        <p class="text-sm text-gray-500">Pengolahan Rapor Siswa SD</p>
    </div>

    <!-- CARD -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-blue-100 p-5 rounded-xl">
            <p class="text-sm text-blue-700">Jumlah Siswa</p>
            <h2 class="text-2xl font-bold text-blue-800 mt-2">
                {{ $jumlah_siswa }}
            </h2>
        </div>

        <div class="bg-green-100 p-5 rounded-xl">
            <p class="text-sm text-green-700">Jumlah Guru</p>
            <h2 class="text-2xl font-bold text-green-800 mt-2">
                {{ $jumlah_guru }}
            </h2>
        </div>

        <div class="bg-yellow-100 p-5 rounded-xl">
            <p class="text-sm text-yellow-700">Pelajaran</p>
            <h2 class="text-2xl font-bold text-yellow-800 mt-2">
                {{ $jumlah_mapel }}
            </h2>
        </div>

    </div>

    <!-- TABEL -->
    <div class="bg-white p-6 rounded-xl shadow-sm border">

        <a href="/siswa/tambah"
           class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded">
           + Tambah Siswa
        </a>

        <table class="w-full text-sm">

            <thead>
                <tr class="bg-gray-100">
                    <th class="p-3">No</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">NIS</th>
                    <th class="p-3">Kelas</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>

            @foreach($data as $s)
            <tr class="border-b">
                <td class="p-3">{{ $loop->iteration }}</td>
                <td class="p-3">{{ $s->nama }}</td>
                <td class="p-3">{{ $s->nis }}</td>
                <td class="p-3">{{ $s->kelas }}</td>

                <td class="p-3 space-x-2">

                    <a href="/siswa/edit/{{ $s->id }}"
                       class="bg-yellow-400 px-3 py-1 rounded text-white text-xs">
                        Edit
                    </a>

                    <a href="/siswa/hapus/{{ $s->id }}"
                       class="bg-red-500 px-3 py-1 rounded text-white text-xs">
                        Hapus
                    </a>

                    <a href="/rapor/{{ $s->id }}/pdf"
                       class="bg-green-500 px-3 py-1 rounded text-white text-xs">
                        PDF
                    </a>

                </td>
            </tr>
            @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection