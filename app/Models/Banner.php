<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'img',
        'aktif',
        'time',
    ];

    public function scopeShowAll($query)
    {
        return $query->where('aktif', '1')->get();
    }
}
