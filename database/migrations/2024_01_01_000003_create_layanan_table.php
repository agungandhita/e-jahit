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
            $table->enum('jenis_layanan', ['baju_pria', 'baju_wanita', 'baju_anak', 'celana', 'rok', 'dress', 'kebaya', 'seragam', 'lainnya']);
            $table->text('deskripsi')->nullable();
            $table->decimal('harga_mulai', 10, 2);
            $table->decimal('harga_sampai', 10, 2)->nullable();
            $table->integer('estimasi_hari')->default(7);
            $table->text('catatan')->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
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