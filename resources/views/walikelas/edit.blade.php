@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            ✏️ Edit Data Wali Kelas
        </h1>

        <p class="text-gray-500">
            Perbarui data wali kelas yang sudah ada
        </p>
    </div>

    <div class="bg-white p-8 rounded-3xl shadow-lg border">

        <form action="/walikelas/update/{{ $data->id }}" method="POST" class="space-y-5">
            @csrf

            {{-- Nama --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Nama Wali Kelas
                </label>

                <input type="text"
                       name="nama"
                       value="{{ $data->nama }}"
                       required
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-400">
            </div>

            {{-- NIP --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    NIP
                </label>

                <input type="text"
                       name="nip"
                       value="{{ $data->nip }}"
                       required
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-400">
            </div>

            {{-- Kelas --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Kelas
                </label>

                <input type="text"
                       name="kelas"
                       value="{{ $data->kelas }}"
                       required
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-400">
            </div>

            {{-- Jenis Kelamin --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Jenis Kelamin
                </label>

                <select name="jenis_kelamin"
                        class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-400">

                    <option value="Laki-laki" {{ $data->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                        Laki-laki
                    </option>

                    <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                        Perempuan
                    </option>

                </select>
            </div>

            {{-- No HP --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    No HP
                </label>

                <input type="text"
                       name="no_hp"
                       value="{{ $data->no_hp }}"
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-400">
            </div>

            <hr>

            <div class="flex justify-between pt-4">

                <a href="/walikelas"
                   class="text-gray-500 hover:text-gray-700">
                    ← Kembali
                </a>

                <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl shadow-lg">

                    Update Data

                </button>

            </div>

        </form>

    </div>

</div>

@endsection