@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-green-700">
            ✏️ Edit Nilai Siswa
        </h1>

        <p class="text-gray-500">
            Perbarui data nilai siswa dengan benar
        </p>
    </div>

    <!-- CARD -->
    <div class="bg-white p-8 rounded-3xl shadow-lg border border-green-100">

        <form action="/nilai/update/{{ $data->id }}" method="POST" class="space-y-5">

            @csrf
            @method('PUT')

            {{-- Nama Siswa --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Nama Siswa
                </label>

                <input type="text"
                       name="nama_siswa"
                       value="{{ $data->nama_siswa }}"
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-green-400">
            </div>

            {{-- Mapel --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Mata Pelajaran
                </label>

                <input type="text"
                       name="mapel"
                       value="{{ $data->mapel }}"
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-green-400">
            </div>

            {{-- Tugas --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Nilai Tugas
                </label>

                <input type="number"
                       name="tugas"
                       value="{{ $data->tugas }}"
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-green-400">
            </div>

            {{-- UTS --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Nilai UTS
                </label>

                <input type="number"
                       name="uts"
                       value="{{ $data->uts }}"
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-green-400">
            </div>

            {{-- UAS --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Nilai UAS
                </label>

                <input type="number"
                       name="uas"
                       value="{{ $data->uas }}"
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-green-400">
            </div>

            <hr class="border-green-100">

            <!-- BUTTON -->
            <div class="flex justify-between items-center pt-4">

                <a href="/nilai"
                   class="text-green-600 hover:text-green-800 font-medium">
                    ← Kembali
                </a>

                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl shadow-lg transition">

                    💾 Update Nilai

                </button>

            </div>

        </form>

    </div>

</div>

@endsection