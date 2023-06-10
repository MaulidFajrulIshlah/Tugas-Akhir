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
        if ($user->id_jabatan === 1) {
            return view('dashboard.admin.beranda');
        } else if ($user->id_jabatan === 2 || $user->id_jabatan === 3 || $user->id_jabatan === 4) {
            return view('dashboard.dekanat_tendik.beranda');
        } else if ($user->id_jabatan === 5 || $user->id_jabatan === 6) {
            return view('dashboard.prodi.beranda');
        }
    }
}
