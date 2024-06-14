<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komplain extends Model
{
    use HasFactory;
    protected $table = 'komplain';
    protected $primaryKey = 'id_komplain';

    protected $fillable = [
        'customer_id',
        'foto_komplain',
        'keterangan_komplain'
    ];
}
