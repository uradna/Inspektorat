<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hapus extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pd',
        'alasan',
        'file',
        'status',
        'feedback'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
