<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
        'siswa_id',
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
    // BOBOT NILAI (30% - 30% - 40%)
    public function hitungNilaiAkhir($ulangan, $uts, $uas)
    {
        return ($ulangan * 0.3) +
               ($uts * 0.3) +
               ($uas * 0.4);
    }
}