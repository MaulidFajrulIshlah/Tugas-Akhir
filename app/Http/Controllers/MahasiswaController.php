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
    public function index(Request $request)
    {
        // mendapatkan data fakultas
        $fakultas = Fakultas::all();

        // mendapatkan data prodi
        $prodi = Prodi::with('fakultas')->get();

        // Cek apakah parameter unitID ada dalam request
        if ($request->has('unitID')) {
            $unitID = $request->input('unitID');
            // Lakukan penanganan berdasarkan unitID
            if ($unitID == 1) {
                return view('dashboard.aksesLayar.mahasiswa.pasca_kenotariatan_table', compact('fakultas', 'prodi'));
            } else if ($unitID == 2) {
                return view('dashboard.aksesLayar.mahasiswa.pasca_manajemen_table', compact('fakultas', 'prodi'));
            } else if ($unitID == 3) {
                return view('dashboard.aksesLayar.mahasiswa.pasca_sainsBio_table', compact('fakultas', 'prodi'));
            } else if ($unitID == 4) {
                return view('dashboard.aksesLayar.mahasiswa.pasca_adminRS_table', compact('fakultas', 'prodi'));
            } else if ($unitID == 5) {
                return view('dashboard.aksesLayar.mahasiswa.pasca_doktor_sainsBio_table', compact('fakultas', 'prodi'));
            } else if ($unitID == 6) {
                return view('dashboard.aksesLayar.mahasiswa.fk_kedokteran_table', compact('fakultas', 'prodi'));
            } else if ($unitID == 7) {
                return view('dashboard.aksesLayar.mahasiswa.fk_profesi_table', compact('fakultas', 'prodi'));
            } else if ($unitID == 8) {
                return view('dashboard.aksesLayar.mahasiswa.fkg_kg_table', compact('fakultas', 'prodi'));
            } else if ($unitID == 9) {
                return view('dashboard.aksesLayar.mahasiswa.fkg_profesi_table', compact('fakultas', 'prodi'));
            } else if ($unitID == 10) {
                return view('dashboard.aksesLayar.mahasiswa.fti_ti_table', compact('fakultas', 'prodi'));
            } else if ($unitID == 11) {
                return view('dashboard.aksesLayar.mahasiswa.fti_ip_table', compact('fakultas', 'prodi'));
            } else if ($unitID == 12) {
                return view('dashboard.aksesLayar.mahasiswa.feb_manajemen_table', compact('fakultas', 'prodi'));
            } else if ($unitID == 13) {
                return view('dashboard.aksesLayar.mahasiswa.feb_akuntansi_table', compact('fakultas', 'prodi'));
            } else if ($unitID == 14) {
                return view('dashboard.aksesLayar.mahasiswa.fh_hukum_table', compact('fakultas', 'prodi'));
            } else if ($unitID == 15) {
                return view('dashboard.aksesLayar.mahasiswa.fpsi_psi_table', compact('fakultas', 'prodi'));
            }
        }

        // Jika unitID == null
        return view('dashboard.mahasiswa', compact('fakultas', 'prodi'));
    }
}
