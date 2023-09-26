<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $fillable = [
        'tahun',
        'semester',
        'mulai',
        'akhir',
        'status'
    ];

    protected $attributes = [
        'status' => '1',
    ];

    public function scopeId($query, $id)
    {
        return $query->where('id', $id)->first();
    }
    
    public function pernyataan()
    {
        return $this->hasMany(Pernyataan::class);
    }

    public function rekapitulasi()
    {
        return $this->hasMany(Rekapitulasi::class);
    }
}
