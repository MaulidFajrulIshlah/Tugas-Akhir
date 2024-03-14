<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerStatus extends Model
{
    use HasFactory;

    protected $fillable = ['ip_address', 'location', 'status', 'http_status', 'checked_at'];

}
