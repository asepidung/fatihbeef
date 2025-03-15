@extends('layouts.app')

@section('title', 'Edit Supplier')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-warning text-white">
            <h5><i class="fas fa-edit"></i> Edit Supplier</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama_supplier" class="form-label">Nama Supplier</label>
                    <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="{{ $supplier->nama_supplier }}" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $supplier->alamat }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon (Opsional)</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $supplier->telepon }}">
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('supplier.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection