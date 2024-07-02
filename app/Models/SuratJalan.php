<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;
    protected $table = 'surat_jalan';
    protected $primaryKey = 'id_surat_jalan';

    protected $fillable = [
        'pesanan_id',
        'nama_customer',
        'tanggal_surat_jalan',
        'tanggal_pengiriman',
        'status_order',
        'alamat_tujuan',
        'jenis_kendaraan',
        'plat_nomor',
    ];

    public function permintaan()
    {
        return $this->belongsTo(Permintaans::class, 'id_pesanan');
    }
}
