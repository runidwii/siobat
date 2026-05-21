<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemakaian extends Model
{
    use HasFactory;

    protected $table = 'pemakaians';

    protected $primaryKey = 'id_pemakaian';

    protected $fillable = [
        'id_resep',
        'id_obat',
        'jumlah_keluar',
        'tanggal_keluar',
        'id_pengguna',
    ];

    protected $casts = [
        'tanggal_keluar' => 'date',
    ];

    /**
     * Relasi ke tabel Obat
     */
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }

    /**
     * Relasi ke User (pengguna yang input/keluar obat)
     */
    public function pengguna()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }
}