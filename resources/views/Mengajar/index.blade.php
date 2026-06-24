@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto space-y-6">

    <!-- HEADER -->
    <div class="relative overflow-hidden rounded-3xl shadow-xl">

        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600"></div>

        <div class="relative p-8 text-white">

            <h1 class="text-4xl font-extrabold">
                📚 Data Mengajar Guru
            </h1>

            <p class="mt-2 text-blue-100">
                Kelola penugasan guru berdasarkan mata pelajaran dan kelas.
            </p>

        </div>

    </div>

    <!-- BUTTON -->
    <div class="flex justify-end">

        <a href="/mengajar/create"
           class="px-5 py-3 rounded-2xl bg-blue-600 text-white font-semibold shadow-lg hover:scale-105 transition">

            + Tambah Penugasan

        </a>

    </div>

    <!-- CARD LIST -->
    <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">

        @forelse($data as $item)

        <div class="bg-white rounded-3xl shadow-lg border border-gray-100 p-6 hover:shadow-2xl transition">

            <div class="flex items-center justify-between mb-4">

                <div class="w-14 h-14 rounded-2xl bg-blue-100 flex items-center justify-center text-2xl">
                    👩‍🏫
                </div>

                <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-semibold">
                    Aktif
                </span>

            </div>

            <h2 class="text-xl font-bold text-gray-800">
                {{ $item->guru->nama }}
            </h2>

            <div class="mt-4 space-y-3">

                <div class="flex items-center gap-2">
                    <span>📚</span>
                    <span>{{ $item->mapel->nama_mapel }}</span>
                </div>

                <div class="flex items-center gap-2">
                    <span>🏫</span>
                    <span>{{ $item->kelas }}</span>
                </div>

            </div>

            <div class="mt-6 flex gap-2">

                <a href="{{ route('mengajar.edit',$item->id) }}"
                    class="flex-1 bg-yellow-500 text-white py-2 rounded-xl text-center hover:bg-yellow-600 transition">
                    ✏️ Edit
                </a>

                <a href="{{ route('mengajar.destroy',$item->id) }}"
                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                    class="flex-1 bg-red-500 text-white py-2 rounded-xl text-center hover:bg-red-600 transition">
                    🗑️ Hapus
                </a>

            </div>

        </div>

        @empty

        <div class="col-span-full">

            <div class="bg-white rounded-3xl shadow-lg p-10 text-center">

                <div class="text-6xl mb-4">
                    📚
                </div>

                <h2 class="text-2xl font-bold text-gray-700">
                    Belum Ada Data Mengajar
                </h2>

                <p class="text-gray-500 mt-2">
                    Silakan tambahkan penugasan guru terlebih dahulu.
                </p>

            </div>

        </div>

        @endforelse

    </div>

</div>

@endsection