<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapor extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'pernyataan_id',
        'pd',
        'satker',
        'jenis',
        'bentuk',
        'nilai',
        'tanggal',
        'pemberi',
        'hubungan',
        'alamat',
        'alasan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pernyataan()
    {
        return $this->belongsTo(Pernyataan::class);
    }
}
