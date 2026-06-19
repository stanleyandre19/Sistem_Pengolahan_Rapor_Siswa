@extends('layouts.app')

@section('content')

<div class="space-y-8">

    <!-- HEADER -->
    <div class="relative overflow-hidden rounded-3xl bg-gradient-to-r from-blue-600 via-indigo-600 to-purple-600 p-8 shadow-xl">

        <div class="absolute right-0 top-0 opacity-20 text-[180px] font-black text-white">
            📚
        </div>

        <div class="relative z-10">

            <h1 class="text-4xl font-extrabold text-white mb-2">
                Lihat Rapor Siswa
            </h1>

            <p class="text-blue-100 text-lg">
                Kelola dan cetak rapor seluruh siswa dengan mudah.
            </p>

        </div>

    </div>

    <!-- STATISTIK -->
    <div class="grid md:grid-cols-3 gap-6">

        <div class="bg-white rounded-3xl p-6 shadow-lg border border-blue-100">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-gray-500">
                        Total Siswa
                    </p>

                    <h2 class="text-4xl font-bold text-blue-600 mt-2">
                        {{ $dataSiswa->count() }}
                    </h2>
                </div>

                <div class="text-5xl">
                    👨‍🎓
                </div>

            </div>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-lg border border-green-100">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-gray-500">
                        Data Aktif
                    </p>

                    <h2 class="text-4xl font-bold text-green-600 mt-2">
                        {{ $dataSiswa->count() }}
                    </h2>
                </div>

                <div class="text-5xl">
                    📑
                </div>

            </div>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-lg border border-purple-100">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-gray-500">
                        Siap Dicetak
                    </p>

                    <h2 class="text-4xl font-bold text-purple-600 mt-2">
                        {{ $dataSiswa->count() }}
                    </h2>
                </div>

                <div class="text-5xl">
                    🖨️
                </div>

            </div>

        </div>

    </div>

    <!-- TABEL -->
    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <div class="bg-gradient-to-r from-slate-800 to-slate-900 p-5">

            <h2 class="text-white text-xl font-bold">
                Daftar Rapor Siswa
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="bg-slate-100 text-slate-700">

                        <th class="p-4 text-center">No</th>
                        <th class="p-4 text-left">Nama Siswa</th>
                        <th class="p-4 text-left">Kelas</th>
                        <th class="p-4 text-center">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($dataSiswa as $siswa)

                    <tr class="border-b hover:bg-blue-50 transition duration-300">

                        <td class="p-4 text-center font-bold">
                            {{ $loop->iteration }}
                        </td>

                        <td class="p-4">

                            <div class="flex items-center gap-3">

                                <div class="w-11 h-11 rounded-full bg-blue-600 text-white flex items-center justify-center font-bold">

                                    {{ strtoupper(substr($siswa->nama,0,1)) }}

                                </div>

                                <div>

                                    <h3 class="font-semibold">
                                        {{ $siswa->nama }}
                                    </h3>

                                    <p class="text-sm text-gray-500">
                                        Data Siswa
                                    </p>

                                </div>

                            </div>

                        </td>

                        <td class="p-4">

                            <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold">

                                {{ $siswa->kelas ?? '-' }}

                            </span>

                        </td>

                        <td class="p-4 text-center">

                            <a href="{{ route('rapor.pdf',$siswa->id) }}"
                               class="inline-flex items-center gap-2 bg-gradient-to-r from-green-500 to-emerald-600 text-white px-5 py-3 rounded-xl font-semibold shadow-lg hover:scale-105 transition">

                                🖨️ Download PDF

                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4" class="text-center py-16">

                            <div class="text-7xl mb-4">
                                📚
                            </div>

                            <h3 class="text-xl font-bold text-gray-700">
                                Belum Ada Data Siswa
                            </h3>

                            <p class="text-gray-500 mt-2">
                                Tambahkan data siswa terlebih dahulu.
                            </p>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection