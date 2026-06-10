@extends('layouts.app')

@section('content')

<div class="p-6">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold text-gray-800">
            👔 Data Wali Kelas
        </h1>

        <a href="/register"
           class="bg-blue-600 text-white px-5 py-3 rounded-xl hover:bg-blue-700">

            + Tambah Wali Kelas

        </a>

    </div>

    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <table class="w-full">

            <thead class="bg-blue-50">

                <tr>
                    <th class="p-4 text-left">No</th>
                    <th class="p-4 text-left">Nama</th>
                    <th class="p-4 text-left">Email</th>
                </tr>

            </thead>

            <tbody>

                @forelse($walikelas as $index => $wali)

                <tr class="border-b hover:bg-gray-50">

                    <td class="p-4">
                        {{ $index + 1 }}
                    </td>

                    <td class="p-4">
                        {{ $wali->name }}
                    </td>

                    <td class="p-4">
                        {{ $wali->email }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="3" class="text-center p-6">

                        Belum ada data wali kelas

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection