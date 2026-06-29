<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin Account
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@rapor.id',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'admin',
        ]);

        // 2. Guru Budi
        $budiUser = User::create([
            'name' => 'Budi Putra',
            'email' => 'budi@rapor.id',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'guru',
        ]);
        
        $guruBudi = \App\Models\Guru::create([
            'user_id' => $budiUser->id,
            'nama' => $budiUser->name,
            'nip' => '123456789',
        ]);

        // 3. Guru Vivi
        $viviUser = User::create([
            'name' => 'Vivi Regina',
            'email' => 'vivi@rapor.id',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'guru',
        ]);

        $guruVivi = \App\Models\Guru::create([
            'user_id' => $viviUser->id,
            'nama' => $viviUser->name,
            'nip' => '12345',
        ]);

        // 4. Wali Kelas (Terpisah)
        $waliUser = User::create([
            'name' => 'Bapak Wali Kelas',
            'email' => 'wali@rapor.id',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'walikelas',
        ]);

        \App\Models\Walikelas::create([
            'user_id' => $waliUser->id,
            'nama' => $waliUser->name,
            'nip' => '987654321',
            'kelas' => '5',
            'jenis_kelamin' => 'Laki-laki',
        ]);

        // 4. Seeding Mapels
        $mapelIPA = \App\Models\Mapel::create(['kode_mapel' => 'IPA', 'nama_mapel' => 'Ilmu Pengetahuan Alam', 'guru_id' => $guruBudi->id]);
        $mapelMTK = \App\Models\Mapel::create(['kode_mapel' => 'MTK', 'nama_mapel' => 'Matematika', 'guru_id' => $guruBudi->id]);
        $mapelING = \App\Models\Mapel::create(['kode_mapel' => 'ING', 'nama_mapel' => 'Bahasa Inggris', 'guru_id' => $guruVivi->id]);

        // 5. Seeding Mengajars (Penjadwalan)
        \App\Models\Mengajar::create(['guru_id' => $guruBudi->id, 'mapel_id' => $mapelIPA->id, 'kelas' => '5']);
        \App\Models\Mengajar::create(['guru_id' => $guruBudi->id, 'mapel_id' => $mapelMTK->id, 'kelas' => '4']);
        \App\Models\Mengajar::create(['guru_id' => $guruVivi->id, 'mapel_id' => $mapelING->id, 'kelas' => '5']);

        // 6. Seeding Siswas
        \App\Models\Siswa::create(['nama' => 'Vivi Regina', 'nis' => '12345', 'kelas' => '5', 'foto' => 'default.png']);
        \App\Models\Siswa::create(['nama' => 'Rista Christy Uli Nainggolan', 'nis' => '225566', 'kelas' => '5', 'foto' => 'default.png']);
        \App\Models\Siswa::create(['nama' => 'Andre Stanley Tambunan', 'nis' => '332211', 'kelas' => '4', 'foto' => 'default.png']);
    }
}
