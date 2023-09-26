<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'nip',
        'password',
        'email',
        'phone',
        'pangkat',
        'jabatan',
        'pd',
        'satker',
        'level',
        'aktif'
    ];

    protected $attributes = [
        'aktif' => '1',
    ];


    public function lapor()
    {
        return $this->hasMany(Lapor::class);
    }
    public function pernyataan()
    {
        return $this->hasMany(Pernyataan::class);
    }

    public function hapus()
    {
        return $this->hasMany(Hapus::class);
    }

    public function scopePegawai($query)
    {
        return $query->where('level', 0)->where('aktif', 1);
    }

    public function scopeAdmin($query)
    {
        return $query->where('level', '!=', '0')->where('aktif', 1);
    }


    public function scopeCekUser($query, $u)
    {
        return $query->where('username', $u)->count();
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
