<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatTransaksi extends Model
{
    use HasFactory;
    protected $table = 'riwayat_transaksi';
    protected $primaryKey = 'id_riwayat';

    protected $fillable = [
        'customer_id',
        'staff_id',
        'barang',
        'total_harga'
    ];

    public function customers()
    {
        return $this->belongsTo(Customers::class, 'riwayat_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'riwayat_id');
    }
}
