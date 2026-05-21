<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatSampah extends Model
{
    use HasFactory;

    protected $table = 'obat_sampahs';

    protected $primaryKey = 'id_obat_sampah';

    protected $fillable = [
        'id_obat',
        'jumlah',
        'alasan',
        'tanggal_dibuang',
        'id_pengguna',
    ];

    protected $casts = [
        'tanggal_dibuang' => 'date',
    ];

    /**
     * Relasi ke Obat
     */
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }

    /**
     * Relasi ke User (pengguna yang input data)
     */
    public function pengguna()
    {
        return $this->belongsTo(User::class, 'id_pengguna');
    }
}