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
            if ($unitID == 1) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 210) {
                            return view('dashboard.semester.pascasarjana.magister_kenotariatan.2020_2021_ganjil');
                        } else if ($categoryID == 209) {
                            return view('dashboard.semester.pascasarjana.magister_kenotariatan.2020_2021_genap');
                        } else if ($categoryID == 269) {
                            return view('dashboard.semester.pascasarjana.magister_kenotariatan.2021_2022_ganjil');
                        } else if ($categoryID == 346) {
                            return view('dashboard.semester.pascasarjana.magister_kenotariatan.2021_2022_genap');
                        } else if ($categoryID == 433) {
                            return view('dashboard.semester.pascasarjana.magister_kenotariatan.2022_2023_ganjil');
                        } else if ($categoryID == 533) {
                            return view('dashboard.semester.pascasarjana.magister_kenotariatan.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.semester.pascasarjana.magister_kenotariatan.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 2) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 16) {
                            return view('dashboard.semester.pascasarjana.magister_manajemen.2019_2020_ganjil');
                        } else if ($categoryID == 39) {
                            return view('dashboard.semester.pascasarjana.magister_manajemen.2019_2020_genap');
                        } else if ($categoryID == 157) {
                            return view('dashboard.semester.pascasarjana.magister_manajemen.2020_2021_ganjil');
                        } else if ($categoryID == 206) {
                            return view('dashboard.semester.pascasarjana.magister_manajemen.2020_2021_genap');
                        } else if ($categoryID == 240) {
                            return view('dashboard.semester.pascasarjana.magister_manajemen.2021_2022_ganjil');
                        } else if ($categoryID == 358) {
                            return view('dashboard.semester.pascasarjana.magister_manajemen.2021_2022_genap');
                        } else if ($categoryID == 435) {
                            return view('dashboard.semester.pascasarjana.magister_manajemen.2022_2023_ganjil');
                        } else if ($categoryID == 503) {
                            return view('dashboard.semester.pascasarjana.magister_manajemen.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.semester.pascasarjana.magister_manajemen.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 3) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 16) {
                            return view('dashboard.semester.pascasarjana.magister_sainsBiomedis.2019_2020_ganjil');
                        } else if ($categoryID == 39) {
                            return view('dashboard.semester.pascasarjana.magister_sainsBiomedis.2019_2020_genap');
                        } else if ($categoryID == 157) {
                            return view('dashboard.semester.pascasarjana.magister_sainsBiomedis.2020_2021_ganjil');
                        } else if ($categoryID == 206) {
                            return view('dashboard.semester.pascasarjana.magister_sainsBiomedis.2020_2021_genap');
                        } else if ($categoryID == 240) {
                            return view('dashboard.semester.pascasarjana.magister_sainsBiomedis.2021_2022_ganjil');
                        } else if ($categoryID == 358) {
                            return view('dashboard.semester.pascasarjana.magister_sainsBiomedis.2021_2022_genap');
                        } else if ($categoryID == 435) {
                            return view('dashboard.semester.pascasarjana.magister_sainsBiomedis.2022_2023_ganjil');
                        } else if ($categoryID == 503) {
                            return view('dashboard.semester.pascasarjana.magister_sainsBiomedis.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.semester.pascasarjana.magister_sainsBiomedis.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 4) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 16) {
                            return view('dashboard.semester.pascasarjana.magister_adminRS.2019_2020_ganjil');
                        } else if ($categoryID == 39) {
                            return view('dashboard.semester.pascasarjana.magister_adminRS.2019_2020_genap');
                        } else if ($categoryID == 157) {
                            return view('dashboard.semester.pascasarjana.magister_adminRS.2020_2021_ganjil');
                        } else if ($categoryID == 206) {
                            return view('dashboard.semester.pascasarjana.magister_adminRS.2020_2021_genap');
                        } else if ($categoryID == 240) {
                            return view('dashboard.semester.pascasarjana.magister_adminRS.2021_2022_ganjil');
                        } else if ($categoryID == 358) {
                            return view('dashboard.semester.pascasarjana.magister_adminRS.2021_2022_genap');
                        } else if ($categoryID == 435) {
                            return view('dashboard.semester.pascasarjana.magister_adminRS.2022_2023_ganjil');
                        } else if ($categoryID == 503) {
                            return view('dashboard.semester.pascasarjana.magister_adminRS.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.semester.pascasarjana.magister_adminRS.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 5) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 16) {
                            return view('dashboard.semester.pascasarjana.doktor_sainsBiomedis.2019_2020_ganjil');
                        } else if ($categoryID == 39) {
                            return view('dashboard.semester.pascasarjana.doktor_sainsBiomedis.2019_2020_genap');
                        } else if ($categoryID == 157) {
                            return view('dashboard.semester.pascasarjana.doktor_sainsBiomedis.2020_2021_ganjil');
                        } else if ($categoryID == 206) {
                            return view('dashboard.semester.pascasarjana.doktor_sainsBiomedis.2020_2021_genap');
                        } else if ($categoryID == 240) {
                            return view('dashboard.semester.pascasarjana.doktor_sainsBiomedis.2021_2022_ganjil');
                        } else if ($categoryID == 358) {
                            return view('dashboard.semester.pascasarjana.doktor_sainsBiomedis.2021_2022_genap');
                        } else if ($categoryID == 435) {
                            return view('dashboard.semester.pascasarjana.doktor_sainsBiomedis.2022_2023_ganjil');
                        } else if ($categoryID == 503) {
                            return view('dashboard.semester.pascasarjana.doktor_sainsBiomedis.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.semester.pascasarjana.doktor_sainsBiomedis.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 6) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 16) {
                            return view('dashboard.semester.fk.kedokteran.2019_2020_ganjil');
                        } else if ($categoryID == 39) {
                            return view('dashboard.semester.fk.kedokteran.2019_2020_genap');
                        } else if ($categoryID == 157) {
                            return view('dashboard.semester.fk.kedokteran.2020_2021_ganjil');
                        } else if ($categoryID == 206) {
                            return view('dashboard.semester.fk.kedokteran.2020_2021_genap');
                        } else if ($categoryID == 240) {
                            return view('dashboard.semester.fk.kedokteran.2021_2022_ganjil');
                        } else if ($categoryID == 358) {
                            return view('dashboard.semester.fk.kedokteran.2021_2022_genap');
                        } else if ($categoryID == 435) {
                            return view('dashboard.semester.fk.kedokteran.2022_2023_ganjil');
                        } else if ($categoryID == 503) {
                            return view('dashboard.semester.fk.kedokteran.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.semester.fk.kedokteran.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 7) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 16) {
                            return view('dashboard.semester.fk.profesi.2019_2020_ganjil');
                        } else if ($categoryID == 39) {
                            return view('dashboard.semester.fk.profesi.2019_2020_genap');
                        } else if ($categoryID == 157) {
                            return view('dashboard.semester.fk.profesi.2020_2021_ganjil');
                        } else if ($categoryID == 206) {
                            return view('dashboard.semester.fk.profesi.2020_2021_genap');
                        } else if ($categoryID == 240) {
                            return view('dashboard.semester.fk.profesi.2021_2022_ganjil');
                        } else if ($categoryID == 358) {
                            return view('dashboard.semester.fk.profesi.2021_2022_genap');
                        } else if ($categoryID == 435) {
                            return view('dashboard.semester.fk.profesi.2022_2023_ganjil');
                        } else if ($categoryID == 503) {
                            return view('dashboard.semester.fk.profesi.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.semester.fk.profesi.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 8) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 16) {
                            return view('dashboard.semester.fkg.kg.2019_2020_ganjil');
                        } else if ($categoryID == 39) {
                            return view('dashboard.semester.fkg.kg.2019_2020_genap');
                        } else if ($categoryID == 157) {
                            return view('dashboard.semester.fkg.kg.2020_2021_ganjil');
                        } else if ($categoryID == 206) {
                            return view('dashboard.semester.fkg.kg.2020_2021_genap');
                        } else if ($categoryID == 240) {
                            return view('dashboard.semester.fkg.kg.2021_2022_ganjil');
                        } else if ($categoryID == 358) {
                            return view('dashboard.semester.fkg.kg.2021_2022_genap');
                        } else if ($categoryID == 435) {
                            return view('dashboard.semester.fkg.kg.2022_2023_ganjil');
                        } else if ($categoryID == 503) {
                            return view('dashboard.semester.fkg.kg.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.semester.fkg.kg.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 9) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 16) {
                            return view('dashboard.semester.fti.ti.2019_2020_ganjil');
                        } else if ($categoryID == 39) {
                            return view('dashboard.semester.fti.ti.2019_2020_genap');
                        } else if ($categoryID == 157) {
                            return view('dashboard.semester.fti.ti.2020_2021_ganjil');
                        } else if ($categoryID == 206) {
                            return view('dashboard.semester.fti.ti.2020_2021_genap');
                        } else if ($categoryID == 240) {
                            return view('dashboard.semester.fti.ti.2021_2022_ganjil');
                        } else if ($categoryID == 358) {
                            return view('dashboard.semester.fti.ti.2021_2022_genap');
                        } else if ($categoryID == 435) {
                            return view('dashboard.semester.fti.ti.2022_2023_ganjil');
                        } else if ($categoryID == 503) {
                            return view('dashboard.semester.fti.ti.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.semester.fti.ti.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 10) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 16) {
                            return view('dashboard.semester.fti.ip.2019_2020_ganjil');
                        } else if ($categoryID == 39) {
                            return view('dashboard.semester.fti.ip.2019_2020_genap');
                        } else if ($categoryID == 157) {
                            return view('dashboard.semester.fti.ip.2020_2021_ganjil');
                        } else if ($categoryID == 206) {
                            return view('dashboard.semester.fti.ip.2020_2021_genap');
                        } else if ($categoryID == 240) {
                            return view('dashboard.semester.fti.ip.2021_2022_ganjil');
                        } else if ($categoryID == 358) {
                            return view('dashboard.semester.fti.ip.2021_2022_genap');
                        } else if ($categoryID == 435) {
                            return view('dashboard.semester.fti.ip.2022_2023_ganjil');
                        } else if ($categoryID == 503) {
                            return view('dashboard.semester.fti.ip.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.semester.fti.ip.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 11) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 16) {
                            return view('dashboard.semester.feb.manajemen.2019_2020_ganjil');
                        } else if ($categoryID == 39) {
                            return view('dashboard.semester.feb.manajemen.2019_2020_genap');
                        } else if ($categoryID == 157) {
                            return view('dashboard.semester.feb.manajemen.2020_2021_ganjil');
                        } else if ($categoryID == 206) {
                            return view('dashboard.semester.feb.manajemen.2020_2021_genap');
                        } else if ($categoryID == 240) {
                            return view('dashboard.semester.feb.manajemen.2021_2022_ganjil');
                        } else if ($categoryID == 358) {
                            return view('dashboard.semester.feb.manajemen.2021_2022_genap');
                        } else if ($categoryID == 435) {
                            return view('dashboard.semester.feb.manajemen.2022_2023_ganjil');
                        } else if ($categoryID == 503) {
                            return view('dashboard.semester.feb.manajemen.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.semester.feb.manajemen.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 12) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 16) {
                            return view('dashboard.semester.feb.akuntansi.2019_2020_ganjil');
                        } else if ($categoryID == 39) {
                            return view('dashboard.semester.feb.akuntansi.2019_2020_genap');
                        } else if ($categoryID == 157) {
                            return view('dashboard.semester.feb.akuntansi.2020_2021_ganjil');
                        } else if ($categoryID == 206) {
                            return view('dashboard.semester.feb.akuntansi.2020_2021_genap');
                        } else if ($categoryID == 240) {
                            return view('dashboard.semester.feb.akuntansi.2021_2022_ganjil');
                        } else if ($categoryID == 358) {
                            return view('dashboard.semester.feb.akuntansi.2021_2022_genap');
                        } else if ($categoryID == 435) {
                            return view('dashboard.semester.feb.akuntansi.2022_2023_ganjil');
                        } else if ($categoryID == 503) {
                            return view('dashboard.semester.feb.akuntansi.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.semester.feb.akuntansi.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 13) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 16) {
                            return view('dashboard.semester.fh.hukum.2019_2020_ganjil');
                        } else if ($categoryID == 39) {
                            return view('dashboard.semester.fh.hukum.2019_2020_genap');
                        } else if ($categoryID == 157) {
                            return view('dashboard.semester.fh.hukum.2020_2021_ganjil');
                        } else if ($categoryID == 206) {
                            return view('dashboard.semester.fh.hukum.2020_2021_genap');
                        } else if ($categoryID == 240) {
                            return view('dashboard.semester.fh.hukum.2021_2022_ganjil');
                        } else if ($categoryID == 358) {
                            return view('dashboard.semester.fh.hukum.2021_2022_genap');
                        } else if ($categoryID == 435) {
                            return view('dashboard.semester.fh.hukum.2022_2023_ganjil');
                        } else if ($categoryID == 503) {
                            return view('dashboard.semester.fh.hukum.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.semester.fh.hukum.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 14) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 16) {
                            return view('dashboard.semester.fpsi.psi.2019_2020_ganjil');
                        } else if ($categoryID == 39) {
                            return view('dashboard.semester.fpsi.psi.2019_2020_genap');
                        } else if ($categoryID == 157) {
                            return view('dashboard.semester.fpsi.psi.2020_2021_ganjil');
                        } else if ($categoryID == 206) {
                            return view('dashboard.semester.fpsi.psi.2020_2021_genap');
                        } else if ($categoryID == 240) {
                            return view('dashboard.semester.fpsi.psi.2021_2022_ganjil');
                        } else if ($categoryID == 358) {
                            return view('dashboard.semester.fpsi.psi.2021_2022_genap');
                        } else if ($categoryID == 435) {
                            return view('dashboard.semester.fpsi.psi.2022_2023_ganjil');
                        } else if ($categoryID == 503) {
                            return view('dashboard.semester.fpsi.psi.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.semester.fpsi.psi.semester', compact('fakultas', 'prodi'));
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
