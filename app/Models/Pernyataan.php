<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pernyataan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'jadwal_id',
        'email',
        'phone',
        'pangkat',
        'jabatan',
        'pd',
        'satker',
        'tanya1',
        'tanya2',
        'tanya3',
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function lapor()
    {
        return $this->hasMany(Lapor::class);
    }
}
