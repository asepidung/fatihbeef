<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'telepon', 'kode_unik'];

    // Otomatis buat kode unik jika pelanggan baru ditambahkan
    public static function boot()
    {
        parent::boot();

        static::creating(function ($pelanggan) {
            // Jika tidak ada kode unik, buat kode otomatis
            if (empty($pelanggan->kode_unik)) {
                $pelanggan->kode_unik = Pelanggan::generateUniqueCode();
            }
        });
    }

    // Fungsi untuk membuat kode unik (3 digit angka acak)
    public static function generateUniqueCode()
    {
        do {
            $kode = rand(100, 999); // Kode acak 3 digit
        } while (self::where('kode_unik', $kode)->exists());

        return (string) $kode;
    }
}
