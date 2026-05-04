@extends('layouts.app')

@section('content')

<div x-data="{ open: false }">

    <!-- JUDUL + BUTTON -->
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Data Guru</h1>

        <button @click="open = true"
                class="bg-blue-500 text-white px-4 py-2 rounded">
            + Tambah Guru
        </button>
    </div>

    <!-- TABLE -->
    <div class="bg-white p-6 rounded-xl shadow-sm border">

        <table class="w-full text-sm">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-3">No</th>
                    <th class="p-3">Nama</th>
                    <th class="p-3">NIP</th>
                    <th class="p-3">Mapel</th>
                    <th class="p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach($guru as $g)
                <tr class="border-b">
                    <td class="p-3">{{ $loop->iteration }}</td>
                    <td class="p-3">{{ $g->nama }}</td>
                    <td class="p-3">{{ $g->nip }}</td>
                    <td class="p-3">{{ $g->mapel }}</td>
                    <td class="p-3">

                        <a href="/guru/hapus/{{ $g->id }}"
                           class="bg-red-500 px-3 py-1 rounded text-white text-xs">
                            Hapus
                        </a>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

    <!-- MODAL POPUP -->
    <div x-show="open"
         class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center"
         style="display:none">

        <div class="bg-white p-6 rounded-xl w-full max-w-md">

            <!-- HEADER MODAL -->
            <div class="flex justify-between mb-4">
                <h2 class="text-lg font-bold">Tambah Guru</h2>
                <button @click="open = false" class="text-xl">×</button>
            </div>

            <!-- FORM -->
            <form action="/guru" method="POST" class="space-y-3">
                @csrf

                <input type="text" name="nama" placeholder="Nama"
                       class="w-full border p-2 rounded">

                <input type="text" name="nip" placeholder="NIP"
                       class="w-full border p-2 rounded">

                <input type="text" name="mapel" placeholder="Mapel"
                       class="w-full border p-2 rounded">

                <button class="w-full bg-blue-600 text-white py-2 rounded">
                    Simpan
                </button>

            </form>

        </div>

    </div>

</div>

<!-- ALPINE JS -->
<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

@endsection