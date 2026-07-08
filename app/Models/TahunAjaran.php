<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;

    // Nama tabel di database kamu tadi
    protected $table = 'tahun_ajarans';

    // Kolom yang boleh diisi lewat website
    protected $fillable = [
        'tahun_ajaran',
        'semester',
        'status',
    ];
}