@extends('layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h5><i class="fas fa-user-plus"></i> Tambah Pelanggan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
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
                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection