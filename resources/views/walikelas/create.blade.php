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
                    Nama Wali Kelas
                </label>

                <input type="text"
                       name="nama"
                       required
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- NIP --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    NIP
                </label>

                <input type="text"
                       name="nip"
                       required
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- Kelas --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Kelas
                </label>

                <select name="kelas"
                        required
                        class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-400">
                    <option value="" selected disabled>-- Pilih Kelas --</option>
                    <option value="Kelas 1">Kelas 1</option>
                    <option value="Kelas 2">Kelas 2</option>
                    <option value="Kelas 3">Kelas 3</option>
                    <option value="Kelas 4">Kelas 4</option>
                    <option value="Kelas 5">Kelas 5</option>
                    <option value="Kelas 6">Kelas 6</option>
                </select>
            </div>

            {{-- Jenis Kelamin --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Jenis Kelamin
                </label>

                <select name="jenis_kelamin"
                        class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-400">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>

            {{-- No HP --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    No HP
                </label>

                <input type="text"
                       name="no_hp"
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-400">
            </div>

            <hr>

            <h3 class="text-lg font-bold text-blue-600">
                🔐 Akun Login Wali Kelas
            </h3>

            {{-- Email --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Email
                </label>

                <input type="email"
                       name="email"
                       required
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- Password --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Password
                </label>

                <input type="password"
                       name="password"
                       required
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-blue-400">
            </div>

            <div class="flex justify-between pt-4">

                <a href="/walikelas"
                   class="text-gray-500 hover:text-gray-700">
                    ← Kembali
                </a>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow-lg">

                    Simpan Wali Kelas

                </button>

            </div>

        </form>

    </div>

</div>

@endsection