<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjangs extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    protected $primaryKey = 'id_keranjang';

    protected $fillable = [
        'customer_id',
        'barang_id',
        'kuantitas'
    ];

    public function barang()
    {
        return $this->belongsTo(Barangs::class, 'barang_id');
    }

    public function customer()
    {
        return $this->BelongsTo(Customers::class, 'keranjang_id');
    }
}
