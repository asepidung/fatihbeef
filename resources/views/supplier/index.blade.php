@extends('layouts.app')

@section('title', 'Manajemen Supplier')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('supplier.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Supplier
        </a>
    </div>

    <table id="example1" class="table table-bordered table-striped table-sm">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($suppliers as $index => $s)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $s->nama_supplier }}</td>
                <td>{{ $s->alamat }}</td>
                <td>{{ $s->telepon ?? '-' }}</td>
                <td class="text-center">
                    <a href="{{ route('supplier.edit', $s->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('supplier.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus supplier ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection