@extends('layouts.app')

@section('content')

<h1 class="text-xl font-bold mb-4">Edit Data Siswa</h1>

<form action="/siswa/update/{{ $siswa->id }}" method="POST"
      class="bg-white p-6 rounded-xl shadow-md space-y-4 max-w-md">
    @csrf

    <div>
        <label class="block text-sm font-semibold">Nama</label>
        <input type="text" name="nama"
               value="{{ $siswa->nama }}"
               class="w-full border p-2 rounded mt-1">
    </div>

    <div>
        <label class="block text-sm font-semibold">NIS</label>
        <input type="text" name="nis"
               value="{{ $siswa->nis }}"
               class="w-full border p-2 rounded mt-1">
    </div>

    <div>
        <label class="block text-sm font-semibold">Kelas</label>
        <input type="text" name="kelas"
               value="{{ $siswa->kelas }}"
               class="w-full border p-2 rounded mt-1">
    </div>

    <div class="flex gap-3">
        <button class="bg-yellow-500 text-white px-4 py-2 rounded">
            Update
        </button>

        <a href="/siswa"
           class="bg-gray-400 text-white px-4 py-2 rounded">
           Kembali
        </a>
    </div>

</form>

@endsection