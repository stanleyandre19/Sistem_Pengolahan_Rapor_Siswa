@extends('layouts.app')

@section('content')

<h1 class="text-xl font-bold mb-4">Data Siswa</h1>

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

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection