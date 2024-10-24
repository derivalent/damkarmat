<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengisi data ke dalam tabel role
        $roles = [
            ['role' => 'admin'],
            ['role' => 'user'],
            ['role' => 'visitor'], // Menambahkan role visitor sesuai permintaan
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
