<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggotas', function (Blueprint $table) {
            $table->id();
            // Kolom untuk data diri (Langkah 1)
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->string('telepon');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['male', 'female']);
            $table->string('kampus');
            $table->text('alamat');
            $table->string('asal_daerah');

            // Kolom untuk path dokumen (Langkah 2)
            $table->string('path_foto');
            $table->string('path_ktm');
            $table->string('path_krs');
            $table->string('path_ktp');
            $table->enum('status', ['pending', 'verified'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
