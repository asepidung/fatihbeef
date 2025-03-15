<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang'; // Pastikan nama tabel sesuai dengan migration
    protected $fillable = ['kdbarang', 'nama_barang'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($barang) {
            if (empty($barang->kdbarang)) {
                $barang->kdbarang = Barang::generateUniqueCode();
            }
        });
    }

    public static function generateUniqueCode()
    {
        do {
            $kode = rand(1000, 9999);
        } while (self::where('kdbarang', $kode)->exists());

        return (string) $kode;
    }
}
