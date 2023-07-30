<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BerandaController extends Controller
{
    //

    public function index()
    {
        if (!session('id_role')) {
            return redirect('forbidden');
        } else if (session('id_role') === 1) {
            return view('dashboard.card.admin');
        } else if (session('id_role') === 2 || session('id_role') === 3) {
            return view('dashboard.card.dekanat_tendik');
        } else if (session('id_role') === 4 || session('id_role') === 5) {
            return view('dashboard.card.prodi');
        }
    }
}
