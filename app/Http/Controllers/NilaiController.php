<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\TahunAjaran; 

class NilaiController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        // <-- 2. AMBIL TAHUN AJARAN YANG SEDANG AKTIF -->
        $tahun_aktif = TahunAjaran::where('status', 'Aktif')->first();
        
        if ($user->role === 'guru') {
            $guruId = $user->guru?->id;
            
            if ($guruId) {
                $mengajars = \App\Models\Mengajar::with('mapel')->where('guru_id', $guruId)->get();
                $kelas_diajar = $mengajars->pluck('kelas')->unique();
                $mapelIds = $mengajars->pluck('mapel_id')->unique();
                
                $siswa = Siswa::whereIn('kelas', $kelas_diajar)->get();
                $data = Nilai::with(['siswa', 'mapel', 'tahunAjaran']) // Tambah eager load relation
                    ->whereIn('mapel_id', $mapelIds)
                    ->whereHas('siswa', function($q) use ($kelas_diajar) {
                        $q->whereIn('kelas', $kelas_diajar);
                    })->get();
            } else {
                $mengajars = collect();
                $siswa = collect();
                $data = collect();
            }
        } else {
            // Admin
            $data = Nilai::with(['siswa', 'mapel', 'tahunAjaran'])->get(); // Tambah eager load relation
            $siswa = Siswa::all();
            $mengajars = \App\Models\Mapel::all(); // Untuk admin semua mapel
        }

        // <-- 3. MASUKKAN 'tahun_aktif' KE COMPACT AGAR BISA DIBACA DI BLADE -->
        return view('pages.nilai', compact('data', 'siswa', 'mengajars', 'user', 'tahun_aktif'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'mapel_id' => 'required',
            'tahun_ajaran_id' => 'required', // <-- 4. VALIDASI ID TAHUN AJARANNYA
            'ulangan' => 'required|numeric|min:0|max:100',
            'uts' => 'required|numeric|min:0|max:100',
            'uas' => 'required|numeric|min:0|max:100',
        ]);

        $nilai = new Nilai();

        Nilai::create([
            'siswa_id'        => $request->siswa_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id, // <-- 5. MASUKKAN KE DATABASE
            'mapel_id'        => $request->mapel_id,
            'ulangan'         => $request->ulangan,
            'uts'             => $request->uts,
            'uas'             => $request->uas,
            // Menggunakan rumus bobot presentase milikmu yang ada di Model Nilai agar sinkron
            'nilai_akhir'     => $nilai->hitungNilaiAkhir($request->ulangan, $request->uts, $request->uas),
        ]);

        return redirect('/nilai');
    }

    public function edit($id)
    {
        $data = Nilai::findOrFail($id);
        $user = auth()->user();
        
        if ($user->role === 'guru') {
            $guruId = $user->guru?->id;
            
            if ($guruId) {
                $mengajars = \App\Models\Mengajar::with('mapel')->where('guru_id', $guruId)->get();
                $kelas_diajar = $mengajars->pluck('kelas')->unique();
                $siswa = Siswa::whereIn('kelas', $kelas_diajar)->get();
            } else {
                $mengajars = collect();
                $siswa = collect();
            }
        } else {
            $siswa = Siswa::all();
            $mengajars = \App\Models\Mapel::all();
        }

        return view('pages.edit_nilai', compact('data', 'siswa', 'mengajars', 'user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required',
            'mapel_id' => 'required',
            'ulangan' => 'required|numeric|min:0|max:100',
            'uts' => 'required|numeric|min:0|max:100',
            'uas' => 'required|numeric|min:0|max:100',
        ]);

        $data = Nilai::findOrFail($id);
        $nilai = new Nilai();

        $data->update([
            'siswa_id' => $request->siswa_id,
            'mapel_id' => $request->mapel_id,
            'ulangan'  => $request->ulangan,
            'uts'      => $request->uts,
            'uas'      => $request->uas,
            'nilai_akhir' => $nilai->hitungNilaiAkhir($request->ulangan, $request->uts, $request->uas),
        ]);

        return redirect('/nilai');
    }

    public function destroy($id)
    {
        $data = Nilai::findOrFail($id);
        $data->delete();

        return redirect('/nilai');
    }
}