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
            if ($unitID == 9) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 16) {
                            return view('dashboard.semester.fti.2019_2020_ganjil');
                        } else if ($categoryID == 39) {
                            return view('dashboard.semester.fti.2019_2020_genap');
                        } else if ($categoryID == 157) {
                            return view('dashboard.semester.fti.2020_2021_ganjil');
                        } else if ($categoryID == 206) {
                            return view('dashboard.semester.fti.2020_2021_genap');
                        } else if ($categoryID == 240) {
                            return view('dashboard.semester.fti.2021_2022_ganjil');
                        } else if ($categoryID == 358) {
                            return view('dashboard.semester.fti.2021_2022_genap');
                        } else if ($categoryID == 435) {
                            return view('dashboard.semester.fti.2022_2023_ganjil');
                        } else if ($categoryID == 503) {
                            return view('dashboard.semester.fti.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.semester.fti.semester', compact('fakultas', 'prodi'));
            }
        }
        // Jika unitID == null
        return view('dashboard.matkul', compact('fakultas', 'prodi'));

        // // Cek apakah parameter unitID ada dalam request
        // if ($request->has('unitID')) {
        //     $unitID = $request->input('unitID');
        //     // Lakukan penanganan berdasarkan unitID
        //     if ($unitID == 9) {
        //         return view('dashboard.semester.fti.semester', compact('fakultas', 'prodi'));
        //         if ($request->has('unitID')) {
        //             $categoryID = $request->input('categoryID');
        //             if (is_numeric($categoryID)) {
        //                 if ($categoryID == 16) {
        //                     return view('dashboard.semester.2019_2020_ganjil');
        //                 } else if ($categoryID == 39) {
        //                     return view('dashboard.semester.2019_2020_genap');
        //                 }
        //             }
        //         }
        //     }
        // }


        // $categoryID = $request->query('categoryID');
        // // Jika terdapat categoryID
        // if (is_numeric($categoryID)) {
        //     if ($categoryID == 16) {
        //         return view('dashboard.semester.2019_2020_ganjil');
        //     } else if ($categoryID == 39) {
        //         return view('dashboard.semester.2019_2020_genap');
        //     }
        // }
    }
}
