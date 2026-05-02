<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    // Ambil data siswa SD
    public function getData()
    {
        $dataSiswa = [
            ['id' => 1, 'nama' => 'Budi', 'kelas' => '3A', 'nilai' => 85],
            ['id' => 2, 'nama' => 'Siti', 'kelas' => '4B', 'nilai' => 90],
            ['id' => 3, 'nama' => 'Andi', 'kelas' => '5A', 'nilai' => 78],
            ['id' => 4, 'nama' => 'Rina', 'kelas' => '6B', 'nilai' => 88],
        ];

        return $dataSiswa;
    }

    // Tampilkan ke view
    public function tampilkan()
    {
        $data = $this->getData();
        return view('siswa', compact('data'));
    }
}