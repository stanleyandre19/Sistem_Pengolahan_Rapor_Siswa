@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            📚 Tambah Mata Pelajaran
        </h1>

        <p class="text-gray-500">
            Silakan lengkapi data mata pelajaran.
        </p>
    </div>

    <div class="bg-white p-8 rounded-3xl shadow-lg border">

        <form action="/mapel" method="POST" class="space-y-5">

            @csrf

            {{-- KKM --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    KKM Mata Pelajaran <span class="text-red-500">*</span>
                </label>

                <input
                    type="number"
                    name="kode_mapel"
                    min="60"
                    max="100"
                    value="{{ old('kode_mapel') }}"
                    placeholder="Masukkan KKM (60 - 100)"
                    required
                    class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50
                    focus:bg-white focus:border-blue-500 focus:ring-4
                    focus:ring-blue-200 outline-none transition">

                @error('kode_mapel')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- Nama Mapel --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Nama Mata Pelajaran <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    name="nama_mapel"
                    value="{{ old('nama_mapel') }}"
                    placeholder="Masukkan nama mata pelajaran"
                    required
                    class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50
                    focus:bg-white focus:border-blue-500 focus:ring-4
                    focus:ring-blue-200 outline-none transition">

                @error('nama_mapel')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- Guru --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Guru Pengampu <span class="text-red-500">*</span>
                </label>

                <select
                    name="guru_id"
                    required
                    class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50
                    focus:bg-white focus:border-blue-500 focus:ring-4
                    focus:ring-blue-200 outline-none transition">

                    <option value="">-- Pilih Guru --</option>

                    @foreach($guru as $g)
                        <option value="{{ $g->id }}"
                            {{ old('guru_id') == $g->id ? 'selected' : '' }}>
                            {{ $g->nama }}
                        </option>
                    @endforeach

                </select>

                @error('guru_id')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex justify-between pt-4">

                <a href="/mapel"
                   class="text-gray-500 hover:text-gray-700">
                    ← Kembali
                </a>

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow-lg">

                    💾 Simpan Mata Pelajaran

                </button>

            </div>

        </form>

    </div>

</div>

@endsection