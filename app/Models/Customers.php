<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $primaryKey = 'id_customer';

    protected $fillable = [
        'login_id',
        'nama_customer',
        'email',
        'no_hp'
    ];

    public function login()
    {
        return $this->belongsTo(User::class, 'login_id');
    }

    public function permintaan()
    {
        return $this->hasOne(Permintaans::class, 'customer_id');
    }

    public function laporan_penjualan()
    {
        return $this->hasOne(LaporanPenjualan::class, 'id_lap_penjualan');
    }
}
