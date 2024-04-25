<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSpada extends Model
{
    use HasFactory;

    protected $table = 'data_spada'; // Nama tabel di database

    protected $fillable = [
        'universitas',
        'status', // Menambahkan kolom status
    ];
}
