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
        Schema::create('faktur_penjualan', function (Blueprint $table) {
            $table->id('id_faktur_penjualan');
            $table->foreignId('customer_id')->references('id_customer')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('pesanan_id')->references('id_pesanan')->on('permintaan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_customer');
            $table->enum('status_order', ['Pending', 'Terkirim'])->default('Pending');
            $table->date('tanggal_faktur');
            $table->text('alamat_pengiriman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faktur_penjualans');
    }
};
