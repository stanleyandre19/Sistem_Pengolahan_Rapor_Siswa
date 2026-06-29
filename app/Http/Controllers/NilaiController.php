<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use App\Models\Siswa;

class NilaiController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        
        if ($user->role === 'guru') {
            $guruId = $user->guru?->id;
            
            if ($guruId) {
                $mengajars = \App\Models\Mengajar::with('mapel')->where('guru_id', $guruId)->get();
                $kelas_diajar = $mengajars->pluck('kelas')->unique();
                $mapelIds = $mengajars->pluck('mapel_id')->unique();
                
                $siswa = Siswa::whereIn('kelas', $kelas_diajar)->get();
                $data = Nilai::with(['siswa', 'mapel'])
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
            $data = Nilai::with(['siswa', 'mapel'])->get();
            $siswa = Siswa::all();
            $mengajars = \App\Models\Mapel::all(); // Untuk admin semua mapel
        }

        return view('pages.nilai', compact('data', 'siswa', 'mengajars', 'user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required',
            'mapel_id' => 'required',
            'tugas' => 'required|numeric|min:0|max:100',
            'uts' => 'required|numeric|min:0|max:100',
            'uas' => 'required|numeric|min:0|max:100',
        ]);

        Nilai::create([
            'siswa_id'   => $request->siswa_id,
            'mapel_id'   => $request->mapel_id,
            'tugas'      => $request->tugas,
            'uts'        => $request->uts,
            'uas'        => $request->uas,
            'nilai_akhir'=> ($request->tugas + $request->uts + $request->uas) / 3,
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
            'tugas' => 'required|numeric|min:0|max:100',
            'uts' => 'required|numeric|min:0|max:100',
            'uas' => 'required|numeric|min:0|max:100',
        ]);

        $data = Nilai::findOrFail($id);

        $data->update([
            'siswa_id'   => $request->siswa_id,
            'mapel_id'   => $request->mapel_id,
            'tugas'      => $request->tugas,
            'uts'        => $request->uts,
            'uas'        => $request->uas,
            'nilai_akhir'=> ($request->tugas + $request->uts + $request->uas) / 3,
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