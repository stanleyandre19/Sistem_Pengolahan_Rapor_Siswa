@extends('layouts.app')

@section('content')

<h1 class="text-xl font-bold mb-4">Tambah Guru</h1>

<form action="/guru" method="POST"
      class="bg-white p-6 rounded shadow space-y-4">
    @csrf

    <input type="text" name="nama" placeholder="Nama Guru"
           class="w-full border p-2 rounded">

    <input type="text" name="nip" placeholder="NIP"
           class="w-full border p-2 rounded">

    <input type="text" name="mapel" placeholder="Mata Pelajaran"
           class="w-full border p-2 rounded">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Simpan
    </button>

</form>

@endsection