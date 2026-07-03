@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            👨‍🏫 Tambah Data Wali Kelas
        </h1>

        <p class="text-gray-500">
            Data wali kelas dan akun login akan dibuat otomatis.
        </p>
    </div>

    <div class="bg-white p-8 rounded-3xl shadow-lg border">

        <form action="/walikelas/store" method="POST" class="space-y-5">
            @csrf

            {{-- Nama --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Nama Wali Kelas <span class="text-red-500">*</span>
                </label>

                <input type="text"
                       name="nama"
                       value="{{ old('nama') }}"
                       placeholder="Masukkan nama wali kelas"
                       required
                       class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-200 outline-none transition">

                @error('nama')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- NIP --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    NIP <span class="text-red-500">*</span>
                </label>

                <input type="text"
                       name="nip"
                       value="{{ old('nip') }}"
                       placeholder="Masukkan NIP"
                       required
                       class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-200 outline-none transition">

                @error('nip')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- Kelas --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Kelas <span class="text-red-500">*</span>
                </label>

                <select name="kelas"
                        required
                        class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-200 outline-none transition">

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

            {{-- Jenis Kelamin --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Jenis Kelamin
                </label>

                <select name="jenis_kelamin"
                        class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-200 outline-none transition">

                    <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                        Laki-laki
                    </option>

                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
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
                       value="{{ old('no_hp') }}"
                       placeholder="Masukkan nomor HP"
                       class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-200 outline-none transition">
            </div>

            <hr>

            <h3 class="text-lg font-bold text-blue-600">
                🔐 Akun Login Wali Kelas
            </h3>

            {{-- Email --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Email <span class="text-red-500">*</span>
                </label>

                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       placeholder="Masukkan email"
                       required
                       class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-200 outline-none transition">

                @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Password <span class="text-red-500">*</span>
                </label>

                <input type="password"
                       name="password"
                       placeholder="Minimal 8 karakter"
                       required
                       class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-200 outline-none transition">
            </div>

            {{-- Konfirmasi Password --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Konfirmasi Password <span class="text-red-500">*</span>
                </label>

                <input type="password"
                       name="password_confirmation"
                       placeholder="Masukkan kembali password"
                       required
                       class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50 focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-200 outline-none transition">

                @error('password')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror
            </div>

            <div class="flex justify-between pt-4">

                <a href="/walikelas"
                   class="text-gray-500 hover:text-gray-700">
                    ← Kembali
                </a>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow-lg">

                    💾 Simpan Wali Kelas

                </button>

            </div>

        </form>

    </div>

</div>

@endsection