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
        Schema::create('surat_jalan', function (Blueprint $table) {
            $table->id('id_surat_jalan');
            $table->foreignId('pesanan_id')->references('id_pesanan')->on('permintaan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_customer');
            $table->date('tanggal_surat_jalan');
            $table->date('tanggal_pengiriman');
            $table->enum('status_order', ['Pending', 'Terkirim'])->default('Pending');
            $table->text('alamat_tujuan');
            $table->enum('jenis_kendaraan', ['Mobil', 'Motor']);
            $table->string('plat_nomor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_jalan');
    }
};
