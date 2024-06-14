<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->foreignId('staff_id')->references('id_staff')->on('staff')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_barang');
            $table->string('foto_barang');
            $table->enum('kategori_barang', ['mie-gacoan', 'mie-hompimpa', 'dimsum', 'minuman']);
            $table->float('harga_barang');
            $table->integer('stok_barang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
