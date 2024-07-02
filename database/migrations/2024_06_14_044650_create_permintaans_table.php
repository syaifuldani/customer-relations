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
        Schema::create('permintaan', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->foreignId('customer_id')->references('id_customer')->on('customers')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('status_permintaan', ['Draf', 'Disetujui', 'Ditolak'])->default('Draf');
            $table->string('nama_barang');
            $table->string('kuantitas');
            $table->enum('jenis_pembayaran', ['tunai', 'qr']);
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan');
    }
};
