<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BerandaController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'Admin') {
            return view('dashboard.card.Admin');
        } else if ($user->role == 'Dekanat Fakultas' || $user->role == 'Tendik') {
            return view('dashboard.dekanat_tendik.beranda');
        } else if ($user->role == 'Prodi') {
            return view('dashboard.prodi.beranda');
        }
    }
}
