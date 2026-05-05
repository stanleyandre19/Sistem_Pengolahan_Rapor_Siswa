@extends('layouts.app')

@section('content')

<h1 class="text-xl font-bold mb-4">Input Nilai Siswa</h1>

<div class="bg-white p-6 rounded-xl shadow-sm border mb-6">

    <form action="/nilai/simpan" method="POST" class="grid grid-cols-2 gap-4">
        @csrf

        <input type="text" name="nama_siswa" placeholder="Nama Siswa"
            class="p-2 border rounded">

        <input type="text" name="mapel" placeholder="Mata Pelajaran"
            class="p-2 border rounded">

        <input type="number" name="tugas" placeholder="Nilai Tugas"
            class="p-2 border rounded">

        <input type="number" name="uts" placeholder="Nilai UTS"
            class="p-2 border rounded">

        <input type="number" name="uas" placeholder="Nilai UAS"
            class="p-2 border rounded">

        <button class="col-span-2 bg-blue-600 text-white py-2 rounded">
            Simpan Nilai
        </button>

    </form>

</div>

<div class="bg-white p-6 rounded-xl shadow-sm border">

    <table class="w-full text-sm">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2">No</th>
                <th class="p-2">Nama</th>
                <th class="p-2">Mapel</th>
                <th class="p-2">Tugas</th>
                <th class="p-2">UTS</th>
                <th class="p-2">UAS</th>
                <th class="p-2">Nilai Akhir</th>
            </tr>
        </thead>

        <tbody>
            @foreach($data as $n)
            <tr class="border-b text-center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $n->nama_siswa }}</td>
                <td>{{ $n->mapel }}</td>
                <td>{{ $n->tugas }}</td>
                <td>{{ $n->uts }}</td>
                <td>{{ $n->uas }}</td>
                <td class="font-bold text-blue-600">
                    {{ number_format($n->nilai_akhir, 2) }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection