<?php

namespace App\Http\Controllers;

use App\Models\Mengajar;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    /**
     * Menampilkan data siswa dengan Pagination.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $query = Siswa::query();

        // Tahun ajaran aktif
        $tahun_aktif = TahunAjaran::where('status', 'Aktif')->first();

        /*
        |--------------------------------------------------------------------------
        | Daftar kelas sesuai role
        |--------------------------------------------------------------------------
        */
        if ($user->role == 'admin') {

            $list_kelas = Siswa::pluck('kelas')->unique()->sort();

        } elseif ($user->role == 'walikelas') {

            $list_kelas = collect([$user->walikelas->kelas]);

            $query->where('kelas', $user->walikelas->kelas);

        } else {

            $kelasGuru = Mengajar::where('guru_id', $user->guru->id)
                ->pluck('kelas')
                ->unique();

            $list_kelas = $kelasGuru;

            $query->whereIn('kelas', $kelasGuru);
        }

        /*
        |--------------------------------------------------------------------------
        | Filter kelas
        |--------------------------------------------------------------------------
        */
        if ($request->filled('filter_kelas')) {

            $query->where('kelas', $request->filter_kelas);

        }

        /*
        |--------------------------------------------------------------------------
        | Search
        |--------------------------------------------------------------------------
        */
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%")
                  ->orWhere('kelas', 'like', "%{$search}%");

            });

        }

        /*
        |--------------------------------------------------------------------------
        | PERUBAHAN DI SINI: Menggunakan paginate() menggantikan get()
        |--------------------------------------------------------------------------
        | ->paginate(5) berarti membatasi tampilan hanya 5 baris data per halaman.
        | ->withQueryString() menjaga agar parameter pencarian/filter tetap ikut ke halaman berikutnya.
        */
        $data = $query->latest()->paginate(5)->withQueryString();

        return view('pages.siswa', compact(
            'data',
            'user',
            'list_kelas',
            'tahun_aktif'
        ));
    }

    /**
     * Simpan data siswa.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'nis'   => 'required|unique:siswas,nis',
            'kelas' => 'required',
            'foto'  => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $foto = null;

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto')->store('foto_siswa', 'public');

        }

        Siswa::create([
            'nama'  => $request->nama,
            'nis'   => $request->nis,
            'kelas' => $request->kelas,
            'foto'  => $foto,
        ]);

        return redirect('/siswa')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Form edit siswa.
     */
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);

        return view('pages.edit_siswa', compact('siswa'));
    }

    /**
     * Update data siswa.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'nis'   => 'required|unique:siswas,nis,' . $id,
            'kelas' => 'required',
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $siswa = Siswa::findOrFail($id);

        $foto = $siswa->foto;

        if ($request->hasFile('foto')) {

            if ($foto && Storage::disk('public')->exists($foto)) {

                Storage::disk('public')->delete($foto);

            }

            $foto = $request->file('foto')->store('foto_siswa', 'public');
        }

        $siswa->update([
            'nama'  => $request->nama,
            'nis'   => $request->nis,
            'kelas' => $request->kelas,
            'foto'  => $foto,
        ]);

        return redirect('/siswa')
            ->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Hapus data siswa.
     */
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {

            Storage::disk('public')->delete($siswa->foto);

        }

        $siswa->delete();

        return redirect('/siswa')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}