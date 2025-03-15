@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf

        <!-- Informasi Pesanan -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12 mb-3">
                <label for="pelanggan_id" class="form-label">Pelanggan</label>
                <select name="pelanggan_id" id="pelanggan_id" class="form-control" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    @foreach($pelanggan as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-3">
                <label for="tanggal_pesanan" class="form-label">Tanggal Pesanan</label>
                <input type="date" name="tanggal_pesanan" id="tanggal_pesanan" class="form-control" required>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-3">
                <label for="uang_muka" class="form-label">Uang Muka</label>
                <input type="text" name="uang_muka" id="uang_muka" class="form-control harga" oninput="formatHarga(this)" required>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mb-3">
                <label for="catatan" class="form-label">Catatan</label>
                <input type="text" class="form-control" name="catatan" id="catatan">
            </div>
        </div>

        <hr>

        <!-- Detail Pesanan -->
        <h4>Detail Pesanan</h4>
        <table id="example1" class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>Barang</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="detail-pesanan-body">
                <tr>
                    <td>
                        <select name="barang_id[]" class="form-control barang-select" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach($barang as $b)
                            <option value="{{ $b->id }}">{{ $b->nama_barang }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><input type="text" class="form-control harga" name="harga[]" oninput="formatHarga(this)" required></td>
                    <td><input type="number" name="jumlah[]" class="form-control jumlah-input" min="1" required></td>
                    <td><input type="text" name="subtotal[]" class="form-control subtotal-input" readonly></td>
                    <td><button type="button" class="btn btn-danger btn-remove"><i class="fas fa-trash"></i></button></td>
                </tr>
            </tbody>
        </table>
        <button type="button" class="btn btn-success" id="btn-add-item">
            <i class="fas fa-plus"></i> Barang
        </button>

        <hr>

        <button type="submit" class="btn btn-primary mt-3">
            <i class="fas fa-save"></i> Simpan Pesanan
        </button>
    </form>
</div>

<!-- Script Tambahan -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const detailBody = document.getElementById("detail-pesanan-body");
        const btnAddItem = document.getElementById("btn-add-item");

        function attachEventListeners(row) {
            const barangSelect = row.querySelector(".barang-select");
            const hargaInput = row.querySelector(".harga");
            const jumlahInput = row.querySelector(".jumlah-input");
            const subtotalInput = row.querySelector(".subtotal-input");

            function updateSubtotal() {
                const harga = parseInt(hargaInput.value.replace(/\D/g, "")) || 0;
                const jumlah = parseInt(jumlahInput.value) || 0;
                subtotalInput.value = new Intl.NumberFormat("id-ID").format(harga * jumlah);
            }

            // Hitung ulang subtotal jika barang dipilih atau jumlah berubah
            barangSelect.addEventListener("change", function() {
                const selectedOption = this.options[this.selectedIndex];
                hargaInput.value = new Intl.NumberFormat("id-ID").format(selectedOption.dataset.harga || 0);
                updateSubtotal();
            });

            jumlahInput.addEventListener("input", updateSubtotal);
            hargaInput.addEventListener("input", function() {
                formatHarga(this);
                updateSubtotal();
            });

            // Hapus baris
            row.querySelector(".btn-remove").addEventListener("click", function() {
                row.remove();
            });
        }

        // Pastikan setiap baris baru memiliki event listener
        btnAddItem.addEventListener("click", function() {
            const row = document.createElement("tr");
            row.innerHTML = `
            <td>
                <select name="barang_id[]" class="form-control barang-select" required>
                    <option value="">-- Pilih Barang --</option>
                    @foreach($barang as $b)
                        <option value="{{ $b->id }}" data-harga="{{ $b->harga_jual }}">
                            {{ $b->nama_barang }}
                        </option>
                    @endforeach
                </select>
            </td>
            <td><input type="text" class="form-control harga" name="harga[]" required></td>
            <td><input type="number" name="jumlah[]" class="form-control jumlah-input" min="1" required></td>
            <td><input type="text" name="subtotal[]" class="form-control subtotal-input" readonly></td>
            <td><button type="button" class="btn btn-danger btn-remove"><i class="fas fa-trash"></i></button></td>
        `;
            detailBody.appendChild(row);
            attachEventListeners(row);
        });

        function formatHarga(input) {
            let value = input.value.replace(/\D/g, ""); // Hanya angka
            input.value = new Intl.NumberFormat("id-ID").format(value);
        }

        // **Penting!** Attach event listener ke baris pertama
        document.querySelectorAll("#detail-pesanan-body tr").forEach(attachEventListeners);

        // Hitung ulang subtotal pada load pertama untuk memastikan semua baris terupdate
        document.querySelectorAll(".harga, .jumlah-input").forEach(input => {
            input.dispatchEvent(new Event("input"));
        });

        // Pastikan format harga tidak mempengaruhi penyimpanan ke database
        document.querySelector("form").addEventListener("submit", function() {
            document.querySelectorAll(".harga, .subtotal-input").forEach(input => {
                input.value = input.value.replace(/\./g, ""); // Hilangkan titik pemisah sebelum submit
            });
        });
    });


    function formatHarga(input) {
        let value = input.value.replace(/\D/g, ""); // Hanya angka
        input.value = new Intl.NumberFormat("id-ID").format(value);
    }

    // Menghapus pemisah ribuan sebelum submit
    document.querySelector("form").addEventListener("submit", function() {
        document.querySelectorAll(".harga").forEach(input => {
            input.value = input.value.replace(/\./g, ""); // Pastikan database menerima angka murni
        });
    });
</script>
@endsection