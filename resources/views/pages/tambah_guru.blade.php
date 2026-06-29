@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">
            👩‍🏫 Tambah Data Guru
        </h1>

        <p class="text-gray-500">
            Data guru dan akun login akan dibuat otomatis.
        </p>
    </div>

    <div class="bg-white p-8 rounded-3xl shadow-lg border">

        <form action="/guru" method="POST" class="space-y-5">
            @csrf

            {{-- Nama Guru --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Nama Guru
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



            <hr>

            <h3 class="text-lg font-bold text-blue-600">
                🔐 Akun Login Guru
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

                <a href="/guru"
                   class="text-gray-500 hover:text-gray-700">
                    ← Kembali
                </a>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow-lg">

                    Simpan Guru

                </button>

            </div>

        </form>

    </div>

</div>

@endsection