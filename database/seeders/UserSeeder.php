<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat Admin
        DB::table('users')->insert([
            'name' => 'Admin FatihBeef',
            'username' => 'admin',
            'password' => Hash::make('password123'), // Ubah jika perlu
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Buat Staff
        DB::table('users')->insert([
            'name' => 'Staff FatihBeef',
            'username' => 'staff',
            'password' => Hash::make('password123'), // Ubah jika perlu
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
