@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-2 text-gray-700">
    📚 Data Siswa
</h1>

<p class="mb-4 text-sm text-gray-500">
    Total Siswa: {{ count($data) }}
</p>

<div class="bg-white p-6 rounded-xl shadow-sm border">

    <a href="/siswa/tambah"
       class="mb-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
       + Tambah Siswa
    </a>

    <table class="w-full text-sm border rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-100 text-gray-700">
                <th class="p-3 text-left">No</th>
                <th class="p-3 text-left">Nama</th>
                <th class="p-3 text-left">NIS</th>
                <th class="p-3 text-left">Kelas</th>
                <th class="p-3 text-left">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($data as $s)
            <tr class="border-b hover:bg-gray-50 transition">
                <td class="p-3">{{ $loop->iteration }}</td>
                <td class="p-3 font-medium">{{ $s->nama }}</td>
                <td class="p-3">{{ $s->nis }}</td>
                <td class="p-3">{{ $s->kelas }}</td>
                <td class="p-3 space-x-2">

                    <!-- EDIT -->
                    <a href="/siswa/edit/{{ $s->id }}"
                       class="bg-yellow-400 px-3 py-1 rounded text-white text-xs hover:bg-yellow-500">
                        Edit
                    </a>

                    <!-- HAPUS -->
                    <a href="/siswa/hapus/{{ $s->id }}"
                       onclick="return confirm('Yakin mau hapus data ini?')"
                       class="bg-red-500 px-3 py-1 rounded text-white text-xs hover:bg-red-600">
                        Hapus
                    </a>

                </td>
            </tr>

            @empty
            <tr>
                <td colspan="5" class="text-center p-6 text-gray-400">
                    Belum ada data siswa
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection