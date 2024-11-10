<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Damkar', // Nama pengguna
            'email' => 'damkarmatbanyuwangi@gmail.com', // Email pengguna
            'password' => Hash::make('damkarmatwangi123'), // Password pengguna, harus di-hash
            'telepon' => '081234567890',
            'nip' => '123456789',
            'jabatan' => 'Admin DInas Pemadam Kebakaran Banyuwangi',
            'jenis_kelamin' => 'pria',
            'tempat_lahir' => 'Banyuwangi',
            'tanggal_lahir' => '2002-02-02',
            'pendidikan_terakhir' => 'S1 Teknologi Rekayasa Perangkat Lunak',
            'status_pekerjaan' => 'pns',
            'role' => '1', // Role pengguna, misalnya admin atau user
            'alamat' => 'Rogojampi, Banyuwangi',
        ]);
    }
}
