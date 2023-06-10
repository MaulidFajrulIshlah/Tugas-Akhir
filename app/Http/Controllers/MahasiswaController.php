<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $fakultas = Fakultas::all();

        $user = Auth::user();
        if ($user->id_jabatan === 1) {
            return view('dashboard.admin.mahasiswa.mahasiswa', compact('fakultas'));
        } else if ($user->id_jabatan === 2 || $user->id_jabatan === 3 || $user->id_jabatan === 4) {
            return view('dashboard.dekanat_tendik.mahasiswa.mahasiswa', compact('fakultas'));
        } else if ($user->id_jabatan === 5 || $user->id_jabatan === 6) {
            return view('dashboard.prodi.mahasiswa.mahasiswa', compact('fakultas'));
        }
    }
}
