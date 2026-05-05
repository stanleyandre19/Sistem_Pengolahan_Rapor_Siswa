@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto">

    <!-- JUDUL -->
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Tambah Data Guru</h1>
        <p class="text-sm text-gray-500">Isi data guru dengan lengkap</p>
    </div>

    <!-- CARD FORM -->
    <div class="bg-white p-6 rounded-xl shadow-sm border">

        <form action="/guru" method="POST" class="space-y-4">
            @csrf

            <!-- NAMA -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">
                    Nama Guru
                </label>
                <input type="text" name="nama" required
                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <!-- NIP -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">
                    NIP
                </label>
                <input type="text" name="nip" required
                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <!-- MAPEL -->
            <div>
                <label class="block text-sm font-semibold text-gray-700">
                    Mata Pelajaran
                </label>
                <input type="text" name="mapel" required
                    class="w-full mt-1 p-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">
            </div>

            <!-- BUTTON -->
            <div class="flex justify-between items-center pt-4">

                <a href="/guru"
                   class="text-sm text-gray-500 hover:underline">
                    ← Kembali
                </a>

                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-xl font-semibold hover:bg-blue-700 transition shadow">
                    Simpan
                </button>

            </div>

        </form>

    </div>

</div>

@endsection