@extends('layouts.app')

@section('content')

<h1 class="text-xl font-bold mb-4">Tambah Siswa</h1>

<form action="/siswa" method="POST" enctype="multipart/form-data"
      class="bg-white p-6 rounded shadow space-y-4">
    @csrf

    <input type="text" name="nama" placeholder="Nama"
           class="w-full border p-2 rounded">

    <input type="text" name="nis" placeholder="NIS"
           class="w-full border p-2 rounded">

    <select name="kelas" class="w-full border p-2 rounded" required>
        <option value="" selected disabled>-- Pilih Kelas --</option>
        <option value="Kelas 1">Kelas 1</option>
        <option value="Kelas 2">Kelas 2</option>
        <option value="Kelas 3">Kelas 3</option>
        <option value="Kelas 4">Kelas 4</option>
        <option value="Kelas 5">Kelas 5</option>
        <option value="Kelas 6">Kelas 6</option>
    </select>

    <!-- FOTO -->
    <input type="file" name="foto"
           class="w-full border p-2 rounded">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">
        Simpan
    </button>

</form>

@endsection