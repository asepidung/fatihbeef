<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Jalankan Seeder untuk membuat Admin dan Staff.
     */
    public function run(): void
    {
        // Buat Admin
        DB::table('users')->insert([
            'name' => 'Admin FatihBeef',
            'username' => 'admin',
            'password' => Hash::make('password123'), // Ganti jika perlu
            'role' => 'admin', // Perbaiki role menjadi "admin"
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Buat Staff
        DB::table('users')->insert([
            'name' => 'Staff FatihBeef',
            'username' => 'staff',
            'password' => Hash::make('password123'), // Ganti jika perlu
            'role' => 'staff', // Pastikan role "staff"
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
