@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto">

    <h1 class="text-xl font-bold mb-4">Edit Mapel</h1>

    <form action="/mapel/update/{{ $mapel->id }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-2 font-medium">
                KKM Mata Pelajaran
            </label>

            <input type="number"
                   name="kode_mapel"
                   value="{{ $mapel->kode_mapel }}"
                   min="60"
                   max="100"
                   class="w-full p-3 border rounded"
                   required>
        </div>

        <div>
            <label class="block mb-2 font-medium">
                Nama Mata Pelajaran
            </label>

            <input type="text"
                   name="nama_mapel"
                   value="{{ $mapel->nama_mapel }}"
                   class="w-full p-3 border rounded"
                   required>
        </div>

        <div>
            <label class="block mb-2 font-medium">
                Guru Pengampu
            </label>

            <select name="guru_id" class="w-full p-3 border rounded" required>
                @foreach($guru as $g)
                    <option value="{{ $g->id }}"
                        {{ $mapel->guru_id == $g->id ? 'selected' : '' }}>
                        {{ $g->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="bg-yellow-500 text-white px-4 py-2 rounded">
            Update
        </button>

    </form>

</div>

@endsection