<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $primaryKey = 'id_penjualan';

    protected $fillable = [
        'pesanan_id',
        'status_pesanan',
        'tanggal_permintaan',
        'total_bayar'
    ];

    public function permintaan()
    {
        return $this->belongsTo(Permintaans::class, 'id_pesanan');
    }
}
