<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mendapatkan data fakultas
        $fakultas = Fakultas::all();

        // mendapatkan data prodi
        $prodi = Prodi::with('fakultas')->get();

        $user = Auth::user();
        if ($user->id_jabatan === 1) {
            return view('dashboard.admin.mahasiswa', compact('fakultas', 'prodi'));
        } else if ($user->id_jabatan === 2 || $user->id_jabatan === 3 || $user->id_jabatan === 4) {
            return view('dashboard.dekanat_tendik.mahasiswa', compact('fakultas', 'prodi'));
        } else if ($user->id_jabatan === 5 || $user->id_jabatan === 6) {
            return view('dashboard.prodi.mahasiswa', compact('fakultas', 'prodi'));
        }
    }
}
