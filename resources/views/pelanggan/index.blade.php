@extends('layouts.app')

@section('title', 'Manajemen Pelanggan')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('pelanggan.create') }}" class="btn btn-primary">
            <i class="fas fa-user-plus"></i> Tambah Pelanggan
        </a>
    </div>

    <table id="example1" class="table table-bordered table-striped table-sm">
        <thead class="table-dark">
            <tr class="text-center">
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Kode Unik</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggan as $index => $p)
            <tr class="text-center">
                <td>{{ $index + 1 }}</td>
                <td class="text-left">{{ $p->nama }}</td>
                <td class="text-left">{{ $p->alamat }}</td>
                <td>{{ $p->telepon ?? '-' }}</td>
                <td>{{ $p->kode_unik }}</td>
                <td class="text-center">
                    <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?');">
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