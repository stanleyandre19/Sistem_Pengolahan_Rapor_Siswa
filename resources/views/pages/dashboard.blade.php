@extends('layouts.app')

@section('content')

<div class="max-w-6xl mx-auto space-y-6">

    <!-- HEADER -->
    <div>
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
        <p class="text-sm text-gray-500">Pengolahan Rapor Siswa SD</p>
    </div>

    <!-- CARD STAT -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <div class="bg-blue-100 p-5 rounded-xl shadow-sm hover:shadow transition">
            <p class="text-sm text-blue-700">Jumlah Siswa</p>
            <h2 class="text-3xl font-bold text-blue-800 mt-2">
                {{ $jumlah_siswa }}
            </h2>
        </div>

        <div class="bg-green-100 p-5 rounded-xl shadow-sm hover:shadow transition">
            <p class="text-sm text-green-700">Jumlah Guru</p>
            <h2 class="text-3xl font-bold text-green-800 mt-2">
                {{ $jumlah_guru }}
            </h2>
        </div>

        <div class="bg-yellow-100 p-5 rounded-xl shadow-sm hover:shadow transition">
            <p class="text-sm text-yellow-700">Jumlah Mapel</p>
            <h2 class="text-3xl font-bold text-yellow-800 mt-2">
                {{ $jumlah_mapel }}
            </h2>
        </div>

    </div>

    

        <table class="w-full text-sm text-left">

            <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                <tr>
                    <th class="px-4 py-3 text-center w-12">No</th>
                    <th class="px-4 py-3">Nama</th>
                    <th class="px-4 py-3">NIS</th>
                    <th class="px-4 py-3">Kelas</th>
                    <th class="px-4 py-3 text-center w-56">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse($data as $s)
                <tr class="hover:bg-gray-50">

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


                        <a href="/rapor/{{ $s->id }}/pdf"
                           class="bg-green-500 hover:bg-green-600 px-3 py-1 rounded text-white text-xs">
                           PDF
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