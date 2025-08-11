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
        Schema::create('ukuran', function (Blueprint $table) {
            $table->id('ukuran_id');
            $table->string('nama_ukuran'); // S, M, L, XL, XXL, atau ukuran custom
            $table->enum('kategori_ukuran', ['dewasa', 'anak', 'bayi']); // dewasa, anak, bayi
            $table->enum('jenis_pakaian', ['baju_pengantin', 'seragam_sekolah', 'baju_kerja', 'kebaya', 'gamis', 'jas', 'baju_anak', 'baju_pria', 'baju_wanita', 'celana', 'rok', 'dress', 'seragam', 'lainnya']);
            $table->decimal('harga_ukuran', 12, 2)->default(0);
            $table->text('deskripsi_ukuran')->nullable(); // Deskripsi detail ukuran (lingkar dada, pinggang, dll)
            $table->json('detail_ukuran')->nullable(); // JSON untuk menyimpan detail ukuran (lingkar_dada, lingkar_pinggang, panjang_lengan, dll)
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();

            // Index untuk pencarian
            $table->index(['kategori_ukuran', 'status']);
            $table->index(['nama_ukuran']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ukuran');
    }
};
