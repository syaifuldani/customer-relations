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
        Schema::create('penjualan', function (Blueprint $table) {
            $table->id('id_penjualan');
            $table->foreignId('pesanan_id')->references('id_pesanan')->on('permintaan')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status_pesanan', ['Draf', 'Disetujui', 'Ditolak'])->default('Draf');
            $table->date('tanggal_permintaan',);
            $table->string('total_bayar_penjualan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan');
    }
};
