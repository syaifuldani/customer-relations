<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = 'staff';
    protected $primaryKet = 'id_staff';

    protected $fillable = [
        'login_id',
        'nama_staff',
        'email',
        'no_hp',
        'alamat',
    ];

    public function login()
    {
        return $this->belongTo(Staff::class, 'login_id');
    }

    public function barang()
    {
        return $this->belongsTo(Barangs::class, 'barang_id');
    }

    public function riwayat_transaksi()
    {
        return $this->hasOne(LaporanPenjualan::class, 'riwayat_id');
    }
}
