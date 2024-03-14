<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServerStatus;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil data status server terakhir dari DB PANDAY
        $lastServerStatus = ServerStatus::orderBy('checked_at', 'desc')->first();

        // Render view dashboard.blade.php sambil kirim data status server
        return view('dashboard/dashboard', ['lastServerStatus' => $lastServerStatus]);
    }
}
