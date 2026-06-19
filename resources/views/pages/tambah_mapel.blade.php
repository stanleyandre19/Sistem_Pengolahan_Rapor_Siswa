@extends('layouts.app')

@section('content')

<div class="max-w-xl mx-auto">

    <h1 class="text-xl font-bold mb-4">Tambah Mapel</h1>

    <form action="/mapel" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block mb-2 font-medium">
                KKM Mata Pelajaran
            </label>

            <input type="number"
                   name="kode_mapel"
                   min="60"
                   max="100"
                   placeholder="Masukkan KKM (60-100)"
                   class="w-full p-3 border rounded"
                   required>
        </div>

        <div>
            <label class="block mb-2 font-medium">
                Nama Mata Pelajaran
            </label>

            <input type="text"
                   name="nama_mapel"
                   placeholder="Masukkan Nama Mapel"
                   class="w-full p-3 border rounded"
                   required>
        </div>

        <div>
            <label class="block mb-2 font-medium">
                Guru Pengampu
            </label>

            <select name="guru_id" class="w-full p-3 border rounded" required>
                <option value="">-- Pilih Guru --</option>

                @foreach($guru as $g)
                    <option value="{{ $g->id }}">
                        {{ $g->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="bg-blue-600 text-white px-4 py-2 rounded">
            Simpan
        </button>

    </form>

</div>

@endsection