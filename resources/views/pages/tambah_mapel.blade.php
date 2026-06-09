@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto">

    <h1 class="text-xl font-bold mb-4">Tambah Mapel</h1>

    <form action="/mapel" method="POST" class="space-y-4">
        @csrf

        <input type="text" name="kode_mapel" placeholder="KKM Mapel"
            class="w-full p-3 border rounded">

        <input type="text" name="nama_mapel" placeholder="Nama Mapel"
            class="w-full p-3 border rounded">

        <select name="guru_id" class="w-full p-3 border rounded">
            @foreach($guru as $g)
                <option value="{{ $g->id }}">{{ $g->nama }}</option>
            @endforeach
        </select>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>

    </form>

</div>

@endsection