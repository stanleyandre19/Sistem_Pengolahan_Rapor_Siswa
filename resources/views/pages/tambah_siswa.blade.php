@extends('layouts.app')

@section('content')

<h1 class="text-xl font-bold mb-4">Tambah Siswa</h1>

<form action="/siswa" method="POST"
      class="bg-white p-6 rounded shadow space-y-4">
    @csrf

    <input type="text" name="nama" placeholder="Nama"
           class="w-full border p-2 rounded">

    <input type="text" name="nis" placeholder="NIS"
           class="w-full border p-2 rounded">

    <input type="text" name="kelas" placeholder="Kelas"
           class="w-full border p-2 rounded">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Simpan
    </button>

</form>

@endsection