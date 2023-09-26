<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekapitulasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jadwal_id',
        'pd',
        'jumlah',
        'total',
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
}
