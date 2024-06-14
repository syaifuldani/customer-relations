<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangs extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'staff_id',
        'nama_barang',
        'foto_barang',
        'kategori_barang',
        'harga_barang',
        'stok_barang',
    ];

    public function staf()
    {
        return $this->hasOne(Staff::class, 'barang_id');
    }

    public function keranjang()
    {
        return $this->hasOne(Keranjangs::class, 'barang_id');
    }
}
