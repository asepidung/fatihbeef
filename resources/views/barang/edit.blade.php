@extends('layouts.app')

@section('title', 'Edit Barang')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-warning text-white">
            <h5><i class="fas fa-edit"></i> Edit Barang</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="kdbarang" class="form-label">Kode Barang</label>
                    <input type="text" class="form-control" id="kdbarang" value="{{ $barang->kdbarang }}" disabled>
                </div>

                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $barang->nama_barang }}" required>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection