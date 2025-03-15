@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Pesanan</h1>

    <a href="{{ route('pesanan.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Pesanan
    </a>

    <table id="example1" class="table table-bordered table-striped table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nomor Pesanan</th>
                <th>Pelanggan</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Uang Muka</th>
                <th>Sisa Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanan as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->nomor_pesanan }}</td>
                <td>{{ $item->pelanggan->nama }}</td>
                <td>{{ $item->tanggal_pesanan }}</td>
                <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->uang_muka, 0, ',', '.') }}</td>
                <td>Rp {{ number_format($item->sisa_pembayaran, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('pesanan.show', $item->id) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i> Detail
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection