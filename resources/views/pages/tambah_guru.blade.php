@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            👩‍🏫 Tambah Data Guru
        </h1>

        <p class="text-gray-500 mt-2">
            Silakan isi data guru. Akun login akan dibuat secara otomatis.
        </p>
    </div>

    <div class="bg-white rounded-3xl shadow-xl border border-gray-200 p-8">

        <form action="/guru" method="POST">

            @csrf

            {{-- Nama Guru --}}
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Nama Guru <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama') }}"
                    placeholder="Masukkan nama lengkap guru"
                    class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50
                    focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-200 outline-none transition">

                @error('nama')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror

            </div>

            {{-- NIP --}}
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    NIP <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    name="nip"
                    value="{{ old('nip') }}"
                    placeholder="Masukkan NIP Guru"
                    class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50
                    focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-200 outline-none transition">

                @error('nip')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror

            </div>

            <hr class="my-8">

            <h2 class="text-xl font-bold text-blue-600 mb-6">
                🔐 Akun Login Guru
            </h2>

            {{-- Email --}}
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Email <span class="text-red-500">*</span>
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan Email"
                    class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50
                    focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-200 outline-none transition">

                @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                @enderror

            </div>

            {{-- Password --}}
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Password <span class="text-red-500">*</span>
                </label>

                <input
                    type="password"
                    name="password"
                    placeholder="Minimal 8 karakter"
                    class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50
                    focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-200 outline-none transition">

            </div>

            {{-- Konfirmasi Password --}}
            <div class="mb-5">

                <label class="block font-semibold mb-2">
                    Konfirmasi Password <span class="text-red-500">*</span>
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    placeholder="Masukkan kembali password"
                    class="w-full p-3 rounded-xl border-2 border-gray-300 bg-gray-50
                    focus:bg-white focus:border-blue-500 focus:ring-4 focus:ring-blue-200 outline-none transition">

                @error('password')
                    <small class="text-red-500">
                        {{ $message }}
                    </small>
                @enderror

            </div>

            <div class="flex justify-between mt-8">

                <a href="/guru"
                    class="px-5 py-3 rounded-xl bg-gray-200 hover:bg-gray-300">

                    ← Kembali

                </a>

                <button
                    class="px-7 py-3 rounded-xl bg-blue-600 hover:bg-blue-700 text-white shadow-lg">

                    💾 Simpan Guru

                </button>

            </div>

        </form>

    </div>

</div>

@endsection