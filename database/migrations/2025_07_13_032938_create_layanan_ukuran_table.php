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
        Schema::create('layanan_ukuran', function (Blueprint $table) {
            $table->id('layanan_ukuran_id');
            $table->foreignId('layanan_id')->constrained('layanan', 'layanan_id')->onDelete('cascade');
            $table->foreignId('ukuran_id')->constrained('ukuran', 'ukuran_id')->onDelete('cascade');
            $table->decimal('harga', 12, 2); // Harga spesifik untuk kombinasi layanan dan ukuran
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();

            // Unique constraint untuk mencegah duplikasi kombinasi layanan-ukuran
            $table->unique(['layanan_id', 'ukuran_id']);

            // Index untuk pencarian
            $table->index(['layanan_id', 'status']);
            $table->index(['ukuran_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_ukuran');
    }
};
