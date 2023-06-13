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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
