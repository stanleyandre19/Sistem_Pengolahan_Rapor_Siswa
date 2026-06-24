@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-3xl shadow-xl p-8">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            ➕ Tambah Data Mengajar
        </h1>

        <form action="/mengajar/store" method="POST">
            @csrf

            {{-- GURU --}}
            <div class="mb-5">
                <label class="font-semibold block mb-2">
                    Guru
                </label>

                <select
                    name="guru_id"
                    required
                    class="w-full border rounded-2xl p-3">

                    <option value="" selected disabled>
                        -- Pilih Guru --
                    </option>

                    @foreach($gurus as $guru)
                        <option value="{{ $guru->id }}">
                            {{ $guru->nama }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- MAPEL --}}
            <div class="mb-5">
                <label class="font-semibold block mb-2">
                    Mata Pelajaran
                </label>

                <select
                    name="mapel_id"
                    required
                    class="w-full border rounded-2xl p-3">

                    <option value="" selected disabled>
                        -- Pilih Mata Pelajaran --
                    </option>

                    @foreach($mapels as $mapel)
                        <option value="{{ $mapel->id }}">
                            {{ $mapel->nama_mapel }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- KELAS --}}
            <div class="mb-5">
                <label class="font-semibold block mb-2">
                    Kelas
                </label>

                <select
                    name="kelas"
                    required
                    class="w-full border rounded-2xl p-3">

                    <option value="" selected disabled>
                        -- Pilih Kelas --
                    </option>

                    <option value="Kelas 1">Kelas 1</option>
                    <option value="Kelas 2">Kelas 2</option>
                    <option value="Kelas 3">Kelas 3</option>
                    <option value="Kelas 4">Kelas 4</option>
                    <option value="Kelas 5">Kelas 5</option>
                    <option value="Kelas 6">Kelas 6</option>

                </select>
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-2xl font-bold hover:bg-blue-700 transition">

                Simpan Data Mengajar

            </button>

        </form>

    </div>

</div>

@endsection