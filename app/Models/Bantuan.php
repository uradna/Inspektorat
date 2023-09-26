<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'for',
        'judul',
        'isi',
        'order',
    ];

    public function scopeLastOrder($query, $for)
    {
        return $query->where('for', $for)->max('order');
    }
}
