<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // mendapatkan data fakultas
        $fakultas = Fakultas::all();

        // mendapatkan data prodi
        $prodi = Prodi::with('fakultas')->get();

        $user = Auth::user();
        if ($user->id_jabatan === 1) {
            return view('dashboard.admin.matkul', compact('fakultas', 'prodi'));
        } else if ($user->id_jabatan === 2 || $user->id_jabatan === 3 || $user->id_jabatan === 4) {
            return view('dashboard.dekanat_tendik.matkul', compact('fakultas', 'prodi'));
        } else if ($user->id_jabatan === 5 || $user->id_jabatan === 6) {
            return view('dashboard.prodi.matkul', compact('fakultas', 'prodi'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getSemester(Request $request)
    {
        $categoryID = $request->query('categoryID');
        $user = Auth::user();

        if (is_numeric($categoryID)) {
            if ($user->id_jabatan === 1) {
                if ($categoryID == 16) {
                    return view('dashboard.semester.2019_2020_ganjil');
                } else if ($categoryID == 39) {
                    return view('dashboard.semester.2019_2020_genap');
                }
            } else if ($user->id_jabatan === 2 || $user->id_jabatan === 3 || $user->id_jabatan === 4) {
                return view('dashboard.dekanat_tendik.mataKuliah.matkul');
            } else if ($user->id_jabatan === 5 || $user->id_jabatan === 6) {
                return view('dashboard.prodi.mataKuliah.matkul');
            }
        }
    }
}
