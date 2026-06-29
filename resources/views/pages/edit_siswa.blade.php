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
        <select name="kelas" class="w-full border p-2 rounded mt-1" required>
            <option value="" disabled>-- Pilih Kelas --</option>
            <option value="Kelas 1" {{ $siswa->kelas == 'Kelas 1' ? 'selected' : '' }}>Kelas 1</option>
            <option value="Kelas 2" {{ $siswa->kelas == 'Kelas 2' ? 'selected' : '' }}>Kelas 2</option>
            <option value="Kelas 3" {{ $siswa->kelas == 'Kelas 3' ? 'selected' : '' }}>Kelas 3</option>
            <option value="Kelas 4" {{ $siswa->kelas == 'Kelas 4' ? 'selected' : '' }}>Kelas 4</option>
            <option value="Kelas 5" {{ $siswa->kelas == 'Kelas 5' ? 'selected' : '' }}>Kelas 5</option>
            <option value="Kelas 6" {{ $siswa->kelas == 'Kelas 6' ? 'selected' : '' }}>Kelas 6</option>
        </select>
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