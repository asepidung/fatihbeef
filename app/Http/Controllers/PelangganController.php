<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'nullable|string|max:15',
        ]);

        Pelanggan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'kode_unik' => Pelanggan::generateUniqueCode(),
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'nullable|string|max:15',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus!');
    }
}
