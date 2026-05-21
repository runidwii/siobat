<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    use HasFactory;

    protected $table = 'penerimaan';

    protected $primaryKey = 'id_penerimaan';

    protected $fillable = ['id_obat', 'jumlah_masuk', 'tanggal_masuk'];

    /**
     * Relasi ke tabel obat
     */
    public function obat()
    {
        return $this->belongsTo(
            Obat::class,
            'id_obat'
        );
    }
}
