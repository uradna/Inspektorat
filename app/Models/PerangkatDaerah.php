<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerangkatDaerah extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama'
    ];

    public function scopeCek($query, $nama)
    {
        return $query->where('nama', $nama)->count();
    }
}
