<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walikelas extends Model
{
    use HasFactory;

    protected $table = 'walikelas';

    protected $fillable = [
        'nama',
        'nip',
        'kelas',
        'jenis_kelamin',
        'no_hp',
    ];
}