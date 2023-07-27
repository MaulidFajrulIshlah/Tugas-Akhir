<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fakultas extends Model
{
    use HasFactory;
    protected $table = 'fakultas';

    protected $fillable = [
        'nama',
        'inisial',
    ];

    // relasi 1:M dengan tabel prodi
    public function prodi()
    {
        return $this->hasMany(Prodi::class);
    }

    // relasi 1:M dengan tabel users
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
