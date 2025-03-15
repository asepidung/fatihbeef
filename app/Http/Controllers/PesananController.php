<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Pelanggan;
use App\Models\Barang;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with('pelanggan')->get();
        return view('pesanan.index', compact('pesanan'));
    }

    public function create()
    {
        $pelanggan = Pelanggan::all(); // Ambil semua pelanggan untuk dropdown
        $barang = Barang::all(); // Ambil semua barang untuk form detail pesanan

        return view('pesanan.create', compact('pelanggan', 'barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required|exists:pelanggans,id',
            'tanggal_pesanan' => 'required|date',
            'uang_muka' => 'nullable|numeric|min:0',
            'barang_id' => 'required|array',
            'barang_id.*' => 'exists:barang,id',
            'jumlah.*' => 'required|integer|min:1',
            'harga.*' => 'required|numeric|min:0',
        ]);

        // Buat Pesanan
        $pesanan = Pesanan::create([
            'pelanggan_id' => $request->pelanggan_id,
            'tanggal_pesanan' => $request->tanggal_pesanan,
            'nomor_pesanan' => 'PSN-' . now()->format('Ymd') . '-' . rand(1000, 9999),
            'catatan' => $request->catatan,
            'total_harga' => 0,
            'uang_muka' => $request->uang_muka ?? 0,
            'sisa_pembayaran' => 0,
        ]);

        // Simpan Detail Pesanan
        $totalHarga = 0;
        foreach ($request->barang_id as $index => $barang_id) {
            $subtotal = $request->harga[$index] * $request->jumlah[$index];
            PesananDetail::create([
                'pesanan_id' => $pesanan->id,
                'barang_id' => $barang_id,
                'harga' => $request->harga[$index],
                'jumlah' => $request->jumlah[$index],
                'subtotal' => $subtotal,
            ]);
            $totalHarga += $subtotal;
        }

        // Update total harga & sisa pembayaran
        $pesanan->update([
            'total_harga' => $totalHarga,
            'sisa_pembayaran' => $totalHarga - $pesanan->uang_muka,
        ]);

        return redirect()->route('pesanan.index')->with('success', 'Pesanan berhasil dibuat!');
    }
}
