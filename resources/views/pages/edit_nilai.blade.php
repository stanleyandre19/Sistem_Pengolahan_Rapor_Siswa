@extends('layouts.app')

@section('content')

<div class="max-w-2xl mx-auto">

    <!-- HEADER -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-green-700">
            ✏️ Edit Nilai Siswa
        </h1>

        <p class="text-gray-500">
            Perbarui data nilai siswa dengan benar
        </p>
    </div>

    <!-- CARD -->
    <div class="bg-white p-8 rounded-3xl shadow-lg border border-green-100">

        <form action="/nilai/update/{{ $data->id }}" method="POST" class="space-y-5">

            @csrf
            @method('PUT')

            {{-- Nama Siswa --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Nama Siswa
                </label>

                <select name="siswa_id"
                        id="siswa_id"
                        class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-green-400"
                        required>
                    <option value="" data-kelas="">👤 Pilih Siswa</option>
                    @foreach($siswa as $s)
                        <option value="{{ $s->id }}" data-kelas="{{ $s->kelas }}" {{ $data->siswa_id == $s->id ? 'selected' : '' }}>
                            {{ $s->nama }} ({{ $s->kelas }})
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Mapel --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Mata Pelajaran
                </label>

                <select name="mapel_id"
                        id="mapel_id"
                        class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-green-400"
                        required>
                    <option value="" data-kelas="">📚 Pilih Mata Pelajaran</option>
                    @if(isset($user) && $user->role === 'guru')
                        @foreach($mengajars as $m)
                            <option value="{{ $m->mapel->id }}" data-kelas="{{ $m->kelas }}" {{ $data->mapel_id == $m->mapel->id && $data->siswa->kelas == $m->kelas ? 'selected' : '' }}>
                                {{ $m->mapel->nama_mapel }} ( {{ $m->kelas }})
                            </option>
                        @endforeach
                    @else
                        @foreach($mengajars as $m)
                            <option value="{{ $m->id }}" data-kelas="" {{ $data->mapel_id == $m->id ? 'selected' : '' }}>
                                {{ $m->nama_mapel }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <script>
                // Initialize filtering on load
                function filterMapel() {
                    var mapelSelect = document.getElementById('mapel_id');
                    var selectedKelas = mapelSelect.options[mapelSelect.selectedIndex].getAttribute('data-kelas');
                    var siswaSelect = document.getElementById('siswa_id');
                    var options = siswaSelect.options;

                    for (var i = 1; i < options.length; i++) {
                        var opt = options[i];
                        if (!selectedKelas || opt.getAttribute('data-kelas') === selectedKelas) {
                            opt.hidden = false;
                            opt.disabled = false;
                        } else {
                            opt.hidden = true;
                            opt.disabled = true;
                        }
                    }
                }
                
                document.getElementById('mapel_id').addEventListener('change', function() {
                    filterMapel();
                    document.getElementById('siswa_id').value = ""; // Reset pilihan siswa on mapel change
                });

                // Run on load to set initial state
                window.onload = filterMapel;
            </script>

            {{-- Ulangan --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Nilai Ulangan
                </label>

                <input type="number"
                       name="ulangan"
                       value="{{ $data->ulangan }}"
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-green-400">
            </div>

            {{-- UTS --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Nilai UTS
                </label>

                <input type="number"
                       name="uts"
                       value="{{ $data->uts }}"
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-green-400">
            </div>

            {{-- UAS --}}
            <div>
                <label class="block font-semibold text-gray-700 mb-2">
                    Nilai UAS
                </label>

                <input type="number"
                       name="uas"
                       value="{{ $data->uas }}"
                       class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-green-400">
            </div>

            <hr class="border-green-100">

            <!-- BUTTON -->
            <div class="flex justify-between items-center pt-4">

                <a href="/nilai"
                   class="text-green-600 hover:text-green-800 font-medium">
                    ← Kembali
                </a>

                <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl shadow-lg transition">

                    💾 Update Nilai

                </button>

            </div>

        </form>

    </div>

</div>

@endsection