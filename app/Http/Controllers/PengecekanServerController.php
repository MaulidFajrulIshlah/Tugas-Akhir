<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PengecekanServerController extends Controller
{
    //
    public function index()
    {
        Cache::forever('last_executed_time', now());
        return view('pengecekanServer');
    }
}
