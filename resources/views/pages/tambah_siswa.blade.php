@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            🎓 Tambah Data Siswa
        </h1>

        <p class="text-gray-500">
            Silakan lengkapi data siswa.
        </p>
    </div>

    <div class="bg-white p-8 rounded-3xl shadow-lg border">

        <form action="/siswa/simpan" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- Nama --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Nama Siswa <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama siswa"
                    required
                    class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50
                    focus:bg-white focus:border-blue-500 focus:ring-4
                    focus:ring-blue-200 outline-none transition">

                @error('nama')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- NIS --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    NIS <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    name="nis"
                    value="{{ old('nis') }}"
                    placeholder="Masukkan NIS"
                    required
                    class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50
                    focus:bg-white focus:border-blue-500 focus:ring-4
                    focus:ring-blue-200 outline-none transition">

                @error('nis')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- Kelas --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Kelas <span class="text-red-500">*</span>
                </label>

                <select
                    name="kelas"
                    required
                    class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50
                    focus:bg-white focus:border-blue-500 focus:ring-4
                    focus:ring-blue-200 outline-none transition">

                    <option value="">-- Pilih Kelas --</option>

                    <option value="Kelas 1" {{ old('kelas') == 'Kelas 1' ? 'selected' : '' }}>Kelas 1</option>
                    <option value="Kelas 2" {{ old('kelas') == 'Kelas 2' ? 'selected' : '' }}>Kelas 2</option>
                    <option value="Kelas 3" {{ old('kelas') == 'Kelas 3' ? 'selected' : '' }}>Kelas 3</option>
                    <option value="Kelas 4" {{ old('kelas') == 'Kelas 4' ? 'selected' : '' }}>Kelas 4</option>
                    <option value="Kelas 5" {{ old('kelas') == 'Kelas 5' ? 'selected' : '' }}>Kelas 5</option>
                    <option value="Kelas 6" {{ old('kelas') == 'Kelas 6' ? 'selected' : '' }}>Kelas 6</option>

                </select>

                @error('kelas')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- Foto --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Foto Siswa
                </label>

                <input
                    type="file"
                    name="foto"
                    class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50
                    focus:bg-white focus:border-blue-500">

                @error('foto')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex justify-between pt-4">

                <a href="/siswa"
                   class="text-gray-500 hover:text-gray-700">

                    ← Kembali

                </a>

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow-lg">

                    💾 Simpan Siswa

                </button>

            </div>

        </form>

    </div>

</div>

@endsection