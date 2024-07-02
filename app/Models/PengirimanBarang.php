<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimanBarang extends Model
{
    use HasFactory;
    protected $table = 'pengiriman_barang';
    protected $primaryKey = 'id_pengiriman';

    protected $fillable = [
        'pesanan_id',
        'nama_customer',
        'status_pengiriman',
        'tanggal_pengiriman',
        'tanggal_pembayaran',
    ];

    public function permintaan()
    {
        return $this->belongsTo(Permintaans::class, 'id_pesanan');
    }
}
