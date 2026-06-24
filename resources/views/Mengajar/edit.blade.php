@extends('layouts.app')

@section('content')

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-3xl shadow-xl p-8">

        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            ✏️ Edit Data Mengajar
        </h1>

        <form action="{{ route('mengajar.update',$mengajar->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-5">
                <label class="font-semibold block mb-2">
                    Guru
                </label>

                <select name="guru_id"
                        class="w-full border rounded-2xl p-3">

                    @foreach($gurus as $guru)

                        <option value="{{ $guru->id }}"
                            {{ $mengajar->guru_id == $guru->id ? 'selected' : '' }}>

                            {{ $guru->nama }}

                        </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-5">
                <label class="font-semibold block mb-2">
                    Mata Pelajaran
                </label>

                <select name="mapel_id"
                        class="w-full border rounded-2xl p-3">

                    @foreach($mapels as $mapel)

                        <option value="{{ $mapel->id }}"
                            {{ $mengajar->mapel_id == $mapel->id ? 'selected' : '' }}>

                            {{ $mapel->nama_mapel }}

                        </option>

                    @endforeach

                </select>
            </div>

            <div class="mb-5">
                <label class="font-semibold block mb-2">
                    Kelas
                </label>

                <select name="kelas"
                        class="w-full border rounded-2xl p-3">

                    <option value="Kelas 1" {{ $mengajar->kelas=='Kelas 1'?'selected':'' }}>
                        Kelas 1
                    </option>

                    <option value="Kelas 2" {{ $mengajar->kelas=='Kelas 2'?'selected':'' }}>
                        Kelas 2
                    </option>

                    <option value="Kelas 3" {{ $mengajar->kelas=='Kelas 3'?'selected':'' }}>
                        Kelas 3
                    </option>

                    <option value="Kelas 4" {{ $mengajar->kelas=='Kelas 4'?'selected':'' }}>
                        Kelas 4
                    </option>

                    <option value="Kelas 5" {{ $mengajar->kelas=='Kelas 5'?'selected':'' }}>
                        Kelas 5
                    </option>

                    <option value="Kelas 6" {{ $mengajar->kelas=='Kelas 6'?'selected':'' }}>
                        Kelas 6
                    </option>

                </select>
            </div>

            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-2xl font-bold hover:bg-blue-700">

                💾 Update Data Mengajar

            </button>

        </form>

    </div>

</div>

@endsection