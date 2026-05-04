@extends('layouts.app')

@section('content')

<h1 class="text-xl font-bold mb-4">Tambah Siswa</h1>

<form class="bg-white p-6 rounded shadow space-y-4">

    <input type="text" placeholder="Nama" class="w-full border p-2 rounded">
    <input type="text" placeholder="NIS" class="w-full border p-2 rounded">
    <input type="text" placeholder="Kelas" class="w-full border p-2 rounded">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Simpan
    </button>

</form>

@endsection