@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto space-y-6">

    <!-- HEADER -->
    <div class="relative overflow-hidden rounded-3xl shadow-2xl">

        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600"></div>
        <div class="absolute inset-0 opacity-20 bg-white blur-3xl"></div>

        <div class="relative p-10 text-white">

            <h1 class="text-4xl font-extrabold">
                📊 Input Nilai Siswa
            </h1>

            <p class="text-indigo-100 mt-2 text-sm">
                Kelola nilai tugas, UTS, UAS dan otomatis hitung nilai akhir
            </p>

        </div>

    </div>

    <!-- FORM CARD -->
    <div class="bg-white rounded-3xl shadow-xl border p-8">

        <h2 class="text-lg font-bold text-gray-700 mb-6">
            ➕ Tambah Nilai Baru
        </h2>

        <form action="/nilai/simpan" method="POST"
              class="grid grid-cols-1 md:grid-cols-2 gap-5">

            @csrf

            <input type="text" name="nama_siswa" placeholder="👤 Nama Siswa"
                   class="p-3 border rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">

            <input type="text" name="mapel" placeholder="📚 Mata Pelajaran"
                   class="p-3 border rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">

            <input type="number" name="tugas" placeholder="📝 Nilai Tugas"
                   class="p-3 border rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">

            <input type="number" name="uts" placeholder="📘 Nilai UTS"
                   class="p-3 border rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">

            <input type="number" name="uas" placeholder="📗 Nilai UAS"
                   class="p-3 border rounded-xl focus:ring-2 focus:ring-blue-400 outline-none">

            <button class="md:col-span-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white py-3 rounded-xl font-bold shadow-lg hover:scale-[1.02] transition">
                💾 Simpan Nilai
            </button>

        </form>

    </div>

    <!-- TABLE CARD -->
    <div class="bg-white rounded-3xl shadow-xl border overflow-hidden">

        <!-- TABLE HEADER -->
        <div class="p-6 border-b bg-gray-50 flex justify-between items-center">

            <h2 class="font-bold text-gray-700">
                📋 Data Nilai Siswa
            </h2>

            <span class="text-sm text-gray-400">
                Total: {{ count($data) }}
            </span>

        </div>

        <table class="w-full text-sm">

            <thead class="bg-gray-100 text-gray-600 uppercase text-xs tracking-widest">
                <tr>
                    <th class="p-4 text-center">No</th>
                    <th class="p-4 text-left">Nama</th>
                    <th class="p-4 text-left">Mapel</th>
                    <th class="p-4 text-center">Tugas</th>
                    <th class="p-4 text-center">UTS</th>
                    <th class="p-4 text-center">UAS</th>
                    <th class="p-4 text-center">Nilai Akhir</th>
                </tr>
            </thead>

            <tbody class="divide-y">

                @forelse($data as $n)

                <tr class="hover:bg-blue-50/40 transition">

                    <td class="p-4 text-center font-bold text-gray-500">
                        {{ $loop->iteration }}
                    </td>

                    <td class="p-4 font-semibold text-gray-800">
                        {{ $n->nama_siswa }}
                    </td>

                    <td class="p-4">
                        <span class="px-3 py-1 rounded-full text-xs bg-indigo-100 text-indigo-700">
                            {{ $n->mapel }}
                        </span>
                    </td>

                    <td class="p-4 text-center">
                        {{ $n->tugas }}
                    </td>

                    <td class="p-4 text-center">
                        {{ $n->uts }}
                    </td>

                    <td class="p-4 text-center">
                        {{ $n->uas }}
                    </td>

                    <td class="p-4 text-center font-bold text-blue-600">
                        {{ number_format($n->nilai_akhir, 2) }}
                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="7" class="py-16 text-center text-gray-400">
                        Belum ada data nilai 😢
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection