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
        Schema::create('laporan_penjualan', function (Blueprint $table) {
            $table->id('id_lap_penjualan');
            $table->foreignId('customer_id')->references('id_customer')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('staff_id')->references('id_staff')->on('staff')->onUpdate('cascade')->onDelete('cascade');
            $table->string('barang');
            $table->float('total_harga');
            $table->enum('metode_pembayaran', ['Tunai', 'Qr Code']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_penjualan');
    }
};
