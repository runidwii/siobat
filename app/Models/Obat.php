<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats';

    protected $fillable = [

        'nama_obat',

        'kategori',

        'stok_terkini',

        'minimal_stok',

        'dosis',

        'tanggal_expired',

        'satuan'
    ];
}
