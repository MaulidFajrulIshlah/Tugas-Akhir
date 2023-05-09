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
        if ($user->role === 'Admin') {
            return view('dashboard.admin.beranda')->with([
                'user' => Auth::user()
            ]);
        } else if ($user->role === 'Dekanat') {
            return view('dashboard.dekanat.beranda')->with([
                'user' => Auth::user()
            ]);
        } else if ($user->role === 'Prodi') {
            return view('dashboard.prodi.beranda')->with([
                'user' => Auth::user()
            ]);
        } else if ($user->role === 'Tendik') {
            return view('dashboard.tendik.beranda')->with([
                'user' => Auth::user()
            ]);
        }
    }
}
