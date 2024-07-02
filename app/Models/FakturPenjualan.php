<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakturPenjualan extends Model
{
    use HasFactory;
    protected $table = 'faktur_penjualan';
    protected $primaryKey = 'id_faktur_penjualan';

    protected $fillable = [
        'customer_id',
        'pesanan_id',
        'nama_customer',
        'status_order',
        'tanggal_faktur',
        'alamat_pengiriman',
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    public function permintaan()
    {
        return $this->belongsTo(Permintaans::class, 'id_pesanan');
    }
}
