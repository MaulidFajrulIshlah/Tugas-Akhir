<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class AkademikController extends Controller
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
                            return view('dashboard.dataMonitoring.pascasarjana.magister_kenotariatan.2020_2021_ganjil');
                        } else if ($categoryID == 209) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_kenotariatan.2020_2021_genap');
                        } else if ($categoryID == 269) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_kenotariatan.2021_2022_ganjil');
                        } else if ($categoryID == 346) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_kenotariatan.2021_2022_genap');
                        } else if ($categoryID == 433) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_kenotariatan.2022_2023_ganjil');
                        } else if ($categoryID == 533) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_kenotariatan.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.dataMonitoring.pascasarjana.magister_kenotariatan.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 2) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 159) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_manajemen.2020_2021_ganjil');
                        } else if ($categoryID == 204) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_manajemen.2020_2021_genap');
                        } else if ($categoryID == 268) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_manajemen.2021_2022_ganjil');
                        } else if ($categoryID == 394) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_manajemen.2021_2022_genap');
                        } else if ($categoryID == 434) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_manajemen.2022_2023_ganjil');
                        } else if ($categoryID == 532) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_manajemen.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.dataMonitoring.pascasarjana.magister_manajemen.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 3) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 167) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_sainsBiomedis.2020_2021_ganjil');
                        } else if ($categoryID == 329) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_sainsBiomedis.2021_2022_ganjil');
                        } else if ($categoryID == 453) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_sainsBiomedis.2022_2023_ganjil');
                        } else if ($categoryID == 537) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_sainsBiomedis.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.dataMonitoring.pascasarjana.magister_sainsBiomedis.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 4) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 536) {
                            return view('dashboard.dataMonitoring.pascasarjana.magister_adminRS.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.dataMonitoring.pascasarjana.magister_adminRS.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 5) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 535) {
                            return view('dashboard.dataMonitoring.pascasarjana.doktor_sainsBiomedis.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.dataMonitoring.pascasarjana.doktor_sainsBiomedis.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 6) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 41) {
                            return view('dashboard.dataMonitoring.fk.kedokteran.2019_2020_genap');
                        } else if ($categoryID == 48) {
                            return view('dashboard.dataMonitoring.fk.kedokteran.2020_2021_ganjil');
                        } else if ($categoryID == 203) {
                            return view('dashboard.dataMonitoring.fk.kedokteran.2020_2021_genap');
                        } else if ($categoryID == 253) {
                            return view('dashboard.dataMonitoring.fk.kedokteran.2021_2022_ganjil');
                        } else if ($categoryID == 343) {
                            return view('dashboard.dataMonitoring.fk.kedokteran.2021_2022_genap');
                        } else if ($categoryID == 425) {
                            return view('dashboard.dataMonitoring.fk.kedokteran.2022_2023_ganjil');
                        } else if ($categoryID == 486) {
                            return view('dashboard.dataMonitoring.fk.kedokteran.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.dataMonitoring.fk.kedokteran.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 7) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 46) {
                            return view('dashboard.dataMonitoring.fk.profesi.profesi_dokter');
                        }
                    }
                }
            } else if ($unitID == 8) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 61) {
                            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.2019_2020_genap');
                        } else if ($categoryID == 60) {
                            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.2020_2021_ganjil');
                        } else if ($categoryID == 180) {
                            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.2020_2021_genap');
                        } else if ($categoryID == 260) {
                            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.2021_2022_ganjil');
                        } else if ($categoryID == 347) {
                            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.2021_2022_genap');
                        } else if ($categoryID == 505) {
                            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.2022_2023_ganjil');
                        } else if ($categoryID == 507) {
                            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.dataMonitoring.fkg.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 9) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 74) {
                            return view('dashboard.dataMonitoring.fkg.profesi.profesi_dokterGigi');
                        }
                    }
                }
            } else if ($unitID == 10) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 16) {
                            return view('dashboard.dataMonitoring.fti.ti.2019_2020_ganjil');
                        } else if ($categoryID == 39) {
                            return view('dashboard.dataMonitoring.fti.ti.2019_2020_genap');
                        } else if ($categoryID == 157) {
                            return view('dashboard.dataMonitoring.fti.ti.2020_2021_ganjil');
                        } else if ($categoryID == 206) {
                            return view('dashboard.dataMonitoring.fti.ti.2020_2021_genap');
                        } else if ($categoryID == 240) {
                            return view('dashboard.dataMonitoring.fti.ti.2021_2022_ganjil');
                        } else if ($categoryID == 358) {
                            return view('dashboard.dataMonitoring.fti.ti.2021_2022_genap');
                        } else if ($categoryID == 435) {
                            return view('dashboard.dataMonitoring.fti.ti.2022_2023_ganjil');
                        } else if ($categoryID == 503) {
                            return view('dashboard.dataMonitoring.fti.ti.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.dataMonitoring.fti.ti.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 11) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 17) {
                            return view('dashboard.dataMonitoring.fti.ip.2019_2020_ganjil');
                        } else if ($categoryID == 40) {
                            return view('dashboard.dataMonitoring.fti.ip.2019_2020_genap');
                        } else if ($categoryID == 156) {
                            return view('dashboard.dataMonitoring.fti.ip.2020_2021_ganjil');
                        } else if ($categoryID == 207) {
                            return view('dashboard.dataMonitoring.fti.ip.2020_2021_genap');
                        } else if ($categoryID == 239) {
                            return view('dashboard.dataMonitoring.fti.ip.2021_2022_ganjil');
                        } else if ($categoryID == 359) {
                            return view('dashboard.dataMonitoring.fti.ip.2021_2022_genap');
                        } else if ($categoryID == 439) {
                            return view('dashboard.dataMonitoring.fti.ip.2022_2023_ganjil');
                        } else if ($categoryID == 488) {
                            return view('dashboard.dataMonitoring.fti.ip.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.dataMonitoring.fti.ip.semester', compact('fakultas', 'prodi'));
            } else if ($unitID ==  12) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 8) {
                            return view('dashboard.dataMonitoring.feb.manajemen.2019_2020_ganjil');
                        } else if ($categoryID == 32) {
                            return view('dashboard.dataMonitoring.feb.manajemen.2019_2020_genap');
                        } else if ($categoryID == 160 || $categoryID == 161 || $categoryID == 162 || $categoryID == 163) {
                            return view('dashboard.dataMonitoring.feb.manajemen.2020_2021_ganjil');
                        } else if ($categoryID == 186 || $categoryID == 187 || $categoryID == 188 || $categoryID == 189) {
                            return view('dashboard.dataMonitoring.feb.manajemen.2020_2021_genap');
                        } else if ($categoryID == 279 || $categoryID == 313 || $categoryID == 314 || $categoryID == 328) {
                            return view('dashboard.dataMonitoring.feb.manajemen.2021_2022_ganjil');
                        } else if ($categoryID == 362 || $categoryID == 363 || $categoryID == 364 || $categoryID == 365) {
                            return view('dashboard.dataMonitoring.feb.manajemen.2021_2022_genap');
                        } else if ($categoryID == 444 || $categoryID == 445 || $categoryID == 446) {
                            return view('dashboard.dataMonitoring.feb.manajemen.2022_2023_ganjil');
                        } else if ($categoryID == 494 || $categoryID == 495 || $categoryID == 496 || $categoryID == 497) {
                            return view('dashboard.dataMonitoring.feb.manajemen.2022_2023_ganjil');
                        }
                    }
                }
                return view('dashboard.dataMonitoring.feb.manajemen.semester', compact('fakultas', 'prodi'));
            } else if ($unitID ==  13) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 7) {
                            return view('dashboard.dataMonitoring.feb.akuntansi.2019_2020_ganjil');
                        } else if ($categoryID == 33) {
                            return view('dashboard.dataMonitoring.feb.akuntansi.2019_2020_genap');
                        } else if ($categoryID == 130) {
                            return view('dashboard.dataMonitoring.feb.akuntansi.2020_2021_ganjil');
                        } else if ($categoryID == 194 || $categoryID == 195 || $categoryID == 196) {
                            return view('dashboard.dataMonitoring.feb.akuntansi.2020_2021_genap');
                        } else if ($categoryID == 280 || $categoryID == 281 || $categoryID == 282) {
                            return view('dashboard.dataMonitoring.feb.akuntansi.2021_2022_ganjil');
                        } else if ($categoryID == 372 || $categoryID == 373 || $categoryID == 374 || $categoryID == 376) {
                            return view('dashboard.dataMonitoring.feb.akuntansi.2021_2022_genap');
                        } else if ($categoryID == 449 || $categoryID == 450 || $categoryID == 451 || $categoryID == 452) {
                            return view('dashboard.dataMonitoring.feb.akuntansi.2022_2023_ganjil');
                        } else if ($categoryID == 509 || $categoryID == 510 || $categoryID == 511 || $categoryID == 512) {
                            return view('dashboard.dataMonitoring.feb.akuntansi.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.dataMonitoring.feb.akuntansi.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 14) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 11) {
                            return view('dashboard.dataMonitoring.fh.2019_2020_ganjil');
                        } else if ($categoryID == 34) {
                            return view('dashboard.dataMonitoring.fh.2019_2020_genap');
                        } else if ($categoryID == 154) {
                            return view('dashboard.dataMonitoring.fh.2020_2021_ganjil');
                        } else if ($categoryID == 181 || $categoryID == 182 || $categoryID == 183) {
                            return view('dashboard.dataMonitoring.fh.2020_2021_genap');
                        } else if ($categoryID == 271 || $categoryID == 272 || $categoryID == 273 || $categoryID == 274 || $categoryID == 275) {
                            return view('dashboard.dataMonitoring.fh.2021_2022_ganjil');
                        } else if ($categoryID == 372 || $categoryID == 350 || $categoryID == 351 || $categoryID == 352) {
                            return view('dashboard.dataMonitoring.fh.2021_2022_genap');
                        } else if ($categoryID == 429 || $categoryID == 430 || $categoryID == 431 || $categoryID == 432) {
                            return view('dashboard.dataMonitoring.fh.2022_2023_ganjil');
                        } else if ($categoryID == 500 || $categoryID == 501 || $categoryID == 502) {
                            return view('dashboard.dataMonitoring.fh.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.dataMonitoring.fh.semester', compact('fakultas', 'prodi'));
            } else if ($unitID == 15) {
                // Cek apakah parameter categoryID ada dalam request
                if ($request->has('categoryID')) {
                    $categoryID = $request->input('categoryID');
                    if (is_numeric($categoryID)) {
                        if ($categoryID == 14) {
                            return view('dashboard.dataMonitoring.fpsi.2019_2020_ganjil');
                        } else if ($categoryID == 37) {
                            return view('dashboard.dataMonitoring.fpsi.2019_2020_genap');
                        } else if ($categoryID == 68) {
                            return view('dashboard.dataMonitoring.fpsi.2020_2021_ganjil');
                        } else if ($categoryID == 184) {
                            return view('dashboard.dataMonitoring.fpsi.2020_2021_genap');
                        } else if ($categoryID == 265) {
                            return view('dashboard.dataMonitoring.fpsi.2021_2022_ganjil');
                        } else if ($categoryID == 357) {
                            return view('dashboard.dataMonitoring.fpsi.2021_2022_genap');
                        } else if ($categoryID == 427) {
                            return view('dashboard.dataMonitoring.fpsi.2022_2023_ganjil');
                        } else if ($categoryID == 489) {
                            return view('dashboard.dataMonitoring.fpsi.2022_2023_genap');
                        }
                    }
                }
                return view('dashboard.dataMonitoring.fpsi.semester', compact('fakultas', 'prodi'));
            }
        }
        // Jika unitID == null
        return view('dashboard.akademik', compact('fakultas', 'prodi'));
    }
}
