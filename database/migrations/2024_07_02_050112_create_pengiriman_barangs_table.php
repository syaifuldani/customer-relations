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
        Schema::create('pengiriman_barang', function (Blueprint $table) {
            $table->id('id_pengiriman');
            $table->foreignId('pesanan_id')->references('id_pesanan')->on('permintaan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_customer');
            $table->string('status_pengiriman');
            $table->date('tanggal_pengiriman');
            $table->date('tanggal_pembayaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengiriman_barangs');
    }
};
