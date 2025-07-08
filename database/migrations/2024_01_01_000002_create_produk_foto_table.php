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
        Schema::create('produk_foto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id');
            $table->string('nama_file');
            $table->string('path_file');
            $table->boolean('is_primary')->default(false);
            $table->integer('urutan')->default(0);
            $table->timestamps();

            $table->foreign('produk_id')->references('produk_id')->on('produk')->onDelete('cascade');
            $table->index(['produk_id', 'is_primary']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_foto');
    }
};