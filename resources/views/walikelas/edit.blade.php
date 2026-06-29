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

                <select name="kelas"
                        required
                        class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-indigo-400">
                    <option value="" disabled>-- Pilih Kelas --</option>
                    <option value="Kelas 1" {{ $data->kelas == 'Kelas 1' ? 'selected' : '' }}>Kelas 1</option>
                    <option value="Kelas 2" {{ $data->kelas == 'Kelas 2' ? 'selected' : '' }}>Kelas 2</option>
                    <option value="Kelas 3" {{ $data->kelas == 'Kelas 3' ? 'selected' : '' }}>Kelas 3</option>
                    <option value="Kelas 4" {{ $data->kelas == 'Kelas 4' ? 'selected' : '' }}>Kelas 4</option>
                    <option value="Kelas 5" {{ $data->kelas == 'Kelas 5' ? 'selected' : '' }}>Kelas 5</option>
                    <option value="Kelas 6" {{ $data->kelas == 'Kelas 6' ? 'selected' : '' }}>Kelas 6</option>
                </select>
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