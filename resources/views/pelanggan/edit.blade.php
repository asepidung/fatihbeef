@extends('layouts.app')

@section('title', 'Edit Pelanggan')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header bg-warning text-white">
            <h5><i class="fas fa-user-edit"></i> Edit Pelanggan</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $pelanggan->nama }}" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $pelanggan->alamat }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $pelanggan->telepon }}">
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection