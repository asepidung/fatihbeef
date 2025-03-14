<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['email', 'email_verified_at', 'remember_token']); // Hapus kolom yang tidak diperlukan
            $table->string('username')->unique()->after('id'); // Tambah kolom username
            $table->enum('role', ['admin', 'staff'])->default('staff')->after('password'); // Tambah role
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('remember_token')->nullable();
            $table->dropColumn(['username', 'role']);
        });
    }
};
