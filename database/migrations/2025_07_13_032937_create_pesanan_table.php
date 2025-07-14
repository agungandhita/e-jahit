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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('pesanan_id');
            $table->string('nomor_pesanan')->unique();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('layanan_id')->constrained('layanan', 'layanan_id')->onDelete('cascade');
            $table->string('jenis_layanan');

            // Detail pesanan
            $table->enum('opsi_kain', ['bawa_sendiri', 'disediakan']);
            $table->json('detail_ukuran'); // Menyimpan array ukuran
            $table->integer('jumlah');
            $table->enum('estimasi_waktu', ['normal', 'cepat']);
            $table->enum('prioritas', ['normal', 'cepat', 'kilat'])->default('normal');
            $table->text('catatan')->nullable();

            // Data pemesan
            $table->string('nama_pemesan');
            $table->string('email_pemesan');
            $table->string('telepon_pemesan');
            $table->text('alamat_pemesan');

            // Harga dan pembayaran
            $table->decimal('harga_dasar', 12, 2);
            $table->decimal('biaya_tambahan', 12, 2)->default(0);
            $table->decimal('total_harga', 12, 2);
            $table->decimal('nominal_dibayar', 12, 2)->nullable(); // Nominal yang dibayarkan user
            $table->decimal('nominal_konfirmasi', 12, 2)->nullable(); // Nominal yang dikonfirmasi user saat upload bukti
            $table->enum('status', ['pending', 'konfirmasi', 'diproses', 'selesai', 'dibatalkan'])->default('pending');
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamp('tanggal_bayar')->nullable();
            $table->timestamp('tanggal_selesai')->nullable();

            $table->timestamps();

            // Indexes
            $table->index(['user_id', 'status']);
            $table->index('nomor_pesanan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
