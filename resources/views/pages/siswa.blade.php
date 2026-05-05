@extends('layouts.app')

@section('content')

<div class="max-w-5xl mx-auto">

    <!-- HEADER -->
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                📚 Data Siswa
            </h1>
            <p class="text-sm text-gray-500">
                Total Siswa: {{ count($data) }}
            </p>
        </div>

        <a href="/siswa/tambah"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
           + Tambah
        </a>
    </div>

    <!-- TABLE -->
    <div class="bg-white rounded-xl shadow border overflow-hidden">

        <table class="w-full text-sm text-left">

            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-center w-12">No</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">NIS</th>
                    <th class="px-4 py-3">Kelas</th>
                    <th class="px-4 py-3 text-center w-40">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse($data as $s)
                <tr class="hover:bg-gray-50 transition">

                    <td class="px-4 py-3 text-center font-medium">
                        {{ $loop->iteration }}
                    </td>

                    <td class="px-4 py-3 font-medium">
                        {{ ucwords($s->nama) }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $s->nis }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $s->kelas }}
                    </td>

                    <td class="px-4 py-3 text-center space-x-2">

                        <a href="/siswa/edit/{{ $s->id }}"
                           class="bg-yellow-400 hover:bg-yellow-500 px-3 py-1 rounded text-white text-xs">
                           Edit
                        </a>

                        <a href="/siswa/hapus/{{ $s->id }}"
                           onclick="return confirm('Yakin mau hapus data ini?')"
                           class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded text-white text-xs">
                           Hapus
                        </a>

                    </td>

                </tr>

                @empty
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-400">
                        Belum ada data siswa
                    </td>
                </tr>
                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection