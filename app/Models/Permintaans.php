<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaans extends Model
{
    use HasFactory;
    protected $table = 'permintaan';
    protected $primaryKey = 'id_pesanan';

    protected $fillable = [
        'customer_id',
        'status_permintaan',
        'nama_barang',
        'kuantitas',
        'jenis_pembayaran',
        'alamat'
    ];


    public function customer()
    {
        return $this->BelongsTo(Customers::class, 'customer_id');
    }

    public function pengiriman_barang()
    {
        return $this->hasOne(PengirimanBarang::class, 'id_pesanan');
    }

    public function penjualan()
    {
        return $this->hasOne(Penjualan::class, 'id_pesanan');
    }

    public function surat_jalan()
    {
        return $this->hasOne(SuratJalan::class, 'id_pesanan');
    }

    public function faktu_penjualan()
    {
        return $this->hasOne(FakturPenjualan::class, 'id_pesanan');
    }
}
