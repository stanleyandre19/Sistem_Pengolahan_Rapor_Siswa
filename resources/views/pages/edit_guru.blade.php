@extends('layouts.app')

@section('content')

<h2 class="text-xl font-bold mb-4">Edit Guru</h2>

<form action="/guru/update/{{ $data->id }}" method="POST" class="space-y-4 bg-white p-6 rounded-xl shadow">
    @csrf

    <input type="text" name="nama" value="{{ $data->nama }}"
        class="w-full p-2 border rounded">

    <input type="text" name="nip" value="{{ $data->nip }}"
        class="w-full p-2 border rounded">

    <input type="text" name="mapel" value="{{ $data->mapel }}"
        class="w-full p-2 border rounded">

    <button class="bg-yellow-500 text-white px-4 py-2 rounded">
        Update
    </button>

</form>

@endsection