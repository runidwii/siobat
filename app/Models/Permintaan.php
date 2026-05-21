<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permintaan extends Model
{
    use HasFactory;
    
    protected $table = 'permintaans';
    protected $primaryKey = 'id_permintaan';
    protected $fillable = ['id_obat', 'id_pengguna', 'jumlah_permintaan', 'tanggal_permintaan', 'satuan', 'keterangan', 'status_permintaan'];

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

     /**
     * Relasi ke tabel users
     */
    public function pengguna()
    {
        return $this->belongsTo(
            User::class,
            'id_pengguna'
        );
    }
}
