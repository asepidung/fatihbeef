<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('alamat');
            $table->string('telepon')->nullable(); // Tidak wajib diisi
            $table->string('kode_unik', 3)->unique(); // Kode unik hanya 3 digit angka
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};
