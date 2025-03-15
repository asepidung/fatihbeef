<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pelanggan;

class PelangganSeeder extends Seeder
{
    public function run(): void
    {
        Pelanggan::create([
            'nama' => 'Johan Setiawan',
            'alamat' => 'Jl. Mawar No. 12',
            'telepon' => '08123456789',
            'kode_unik' => '123', // Bisa manual atau otomatis
        ]);

        Pelanggan::create([
            'nama' => 'Budi Santoso',
            'alamat' => 'Jl. Kenanga No. 34',
            'telepon' => '08234567890',
            'kode_unik' => Pelanggan::generateUniqueCode(), // Otomatis
        ]);
    }
}
