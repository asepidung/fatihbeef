<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $fillable = [
        'pelanggan_id',
        'tanggal_pesanan',
        'nomor_pesanan',
        'catatan',
        'total_harga',
        'uang_muka',
        'sisa_pembayaran'
    ];

    // Relasi ke Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    // Relasi ke PesananDetail
    public function details()
    {
        return $this->hasMany(PesananDetail::class);
    }
}
