<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;

class MasterPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // mendapatkan data User
        $userData = User::with('jabatan')->latest()->get();
        return view('dashboard.admin.masterPengguna.index', compact('userData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // mendapatkan data jabatan
        $jabatan = Jabatan::all();
        return view('dashboard.admin.masterPengguna.create', compact('jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // tes data berhasil ditambahkan atau tidak
        try {
            // request dan validasi data
            $validasiData = $request->validate([
                'nama' => 'required|max:255',
                'username' => 'required|unique:users|min:3|max:255',
                'password' => 'required|min:5|max:255',
                'id_jabatan' => 'required',

            ]);
            // enkripsi password
            $validasiData['password'] = Hash::make($validasiData['password']);

            // membuat data user
            User::create($validasiData);

            return redirect('/masterdata/pengguna/create')->with('success', 'Data Pengguna Berhasil Disimpan');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect('/masterdata/pengguna/create')->with('failed', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // mendapatkan data User
        $userData = User::with('jabatan')->findOrFail($id);

        // mendapatkan data jabatan
        $jabatan = Jabatan::all();

        return view('dashboard.admin.masterPengguna.edit', compact('userData', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // tes data berhasil ditambahkan atau tidak
        try {
            // request dan validasi data
            $validasiData = $request->validate([
                'id_jabatan' => 'required',

            ]);

            // mendapat data user
            $user = User::findOrFail($request->id);

            $user->update($validasiData);

            return redirect('/masterdata/pengguna/edit/' . $request->id)->with('success', 'Data Pengguna Berhasil Disimpan');
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return redirect('/masterdata/pengguna/edit/' . $request->id)->with('failed', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // menghapus data pengguna
        $item = User::findorFail($id);

        $item->delete();

        return redirect('/masterdata/pengguna')->with('success', 'Data Pengguna telah dihapus');
    }
}
