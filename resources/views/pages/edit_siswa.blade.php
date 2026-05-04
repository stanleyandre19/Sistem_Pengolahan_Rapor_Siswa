@extends('layouts.app')

@section('content')

<h1 class="text-xl font-bold mb-4">Edit Siswa</h1>

<form class="bg-white p-6 rounded shadow space-y-4">

    <input type="text" value="Andi" class="w-full border p-2 rounded">
    <input type="text" value="12345" class="w-full border p-2 rounded">
    <input type="text" value="Kelas 5A" class="w-full border p-2 rounded">

    <button class="bg-yellow-500 text-white px-4 py-2 rounded">
        Update
    </button>

</form>

@endsection