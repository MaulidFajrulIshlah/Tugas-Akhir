<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSpadaBulanan extends Model
{
    use HasFactory;

    protected $table = 'data_spada_bulanan';

    protected $fillable = [
        'bulan',
        'tahun',
        'hari_ditemukan',
        'hari_tidak_ditemukan',
        'created_at'
    ];

    public $timestamps = false; // Disable timestamps
}
