@extends('layouts.app')

@section('content')

<div class="max-w-lg mx-auto">

    <h2 class="text-2xl font-bold mb-6">Edit Data Guru</h2>

    <form action="{{ url('/guru/update/'.$data->id) }}" method="POST"
        class="bg-white p-6 rounded-lg shadow">

        @csrf

        <!-- Nama Guru -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">
                Nama Guru
            </label>
            <input
                type="text"
                name="nama"
                value="{{ $data->nama }}"
                class="w-full p-2 border rounded"
                placeholder="Masukkan nama guru">
        </div>

        <!-- NIP -->
        <div class="mb-4">
            <label class="block font-semibold mb-2">
                NIP
            </label>
            <input
                type="text"
                name="nip"
                value="{{ $data->nip }}"
                class="w-full p-2 border rounded"
                placeholder="Masukkan NIP">
        </div>



        <button type="submit"
            class="bg-yellow-500 text-white px-4 py-2 rounded">
            Update Data
        </button>

    </form>

</div>

@endsection