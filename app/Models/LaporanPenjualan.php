<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanPenjualan extends Model
{
    use HasFactory;
    protected $table = 'laporan_penjualan';
    protected $primaryKey = 'id_lap_penjualan';

    protected $fillable = [
        'customer_id',
        'staff_id',
        'barang',
        'total_harga',
        'metode_pembayaran'
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'riwayat_id');
    }
}
