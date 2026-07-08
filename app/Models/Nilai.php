<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    // Beritahu Laravel nama tabelnya (opsional tapi aman karena berakhiran 's')
    protected $table = 'nilais';

    protected $fillable = [
        'siswa_id',
        'tahun_ajaran_id', // <-- 1. TAMBAHKAN INI AGAR BISA DIISI
        'mapel_id',
        'ulangan',
        'uts',
        'uas',
        'nilai_akhir',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }

    // <-- 2. TAMBAHKAN RELASI BARU INI
    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class, 'tahun_ajaran_id');
    }

    // BOBOT NILAI (30% - 30% - 40%)
    public function hitungNilaiAkhir($ulangan, $uts, $uas)
    {
        return ($ulangan * 0.3) +
               ($uts * 0.3) +
               ($uas * 0.4);
    }
}