@extends('layouts.app')

@section('title', 'Tambah Supplier')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5><i class="fas fa-plus"></i> Tambah Supplier</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('supplier.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon (Opsional)</label>
                    <input type="text" class="form-control" id="telepon" name="telepon">
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <a href="{{ route('supplier.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection