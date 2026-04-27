<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelPenyewa extends Authenticatable
{
    use HasFactory, Notifiable;

    // 🔥 Nama tabel
    protected $table = 'penyewa';

    // 🔥 Primary Key
    protected $primaryKey = 'id';

    // 🔥 Field yang bisa diisi
    protected $fillable = [
        'nama',
        'username',
        'password',
        'nohp',
        'alamat'
    ];

    // 🔥 Hidden (tidak ditampilkan)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 🔥 Auto hash password (Laravel 10+)
    protected $casts = [
        'password' => 'hashed',
    ];

    // 🔥 Login pakai username (bukan email)
    public function getAuthIdentifierName()
    {
        return 'username';
    }
}