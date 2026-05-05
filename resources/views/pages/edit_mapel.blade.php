@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto">

    <h1 class="text-xl font-bold mb-4">Edit Mapel</h1>

    <form action="/mapel/update/{{ $mapel->id }}" method="POST" class="space-y-4">
        @csrf

        <input type="text" name="kode_mapel"
            value="{{ $mapel->kode_mapel }}"
            class="w-full p-3 border rounded">

        <input type="text" name="nama_mapel"
            value="{{ $mapel->nama_mapel }}"
            class="w-full p-3 border rounded">

        <select name="guru_id" class="w-full p-3 border rounded">
            @foreach($guru as $g)
                <option value="{{ $g->id }}"
                    {{ $mapel->guru_id == $g->id ? 'selected' : '' }}>
                    {{ $g->nama }}
                </option>
            @endforeach
        </select>

        <button class="bg-yellow-500 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</div>

@endsection