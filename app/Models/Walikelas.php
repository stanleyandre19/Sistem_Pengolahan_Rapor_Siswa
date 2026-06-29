<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Walikelas extends Model
{
    use HasFactory;

    protected $table = 'walikelas';

    protected $fillable = [
        'user_id',
        'nama',
        'nip',
        'kelas',
        'jenis_kelamin',
        'no_hp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}