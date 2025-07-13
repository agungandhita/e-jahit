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
        Schema::create('layanan', function (Blueprint $table) {
            $table->id('layanan_id');
            $table->string('nama_layanan');
            $table->enum('jenis_layanan', ['baju_pengantin', 'seragam_sekolah', 'baju_kerja', 'kebaya', 'gamis', 'jas', 'baju_anak']);
            $table->text('deskripsi')->nullable();
            $table->decimal('harga_mulai', 12, 2);
            $table->decimal('harga_sampai', 12, 2);
            $table->integer('estimasi_hari');
            $table->text('catatan')->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();

            // Index untuk pencarian
            $table->index(['jenis_layanan', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};
