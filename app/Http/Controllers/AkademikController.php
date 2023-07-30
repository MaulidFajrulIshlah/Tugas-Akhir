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

        $categoryId = $request->query('categoryid');
        $unitID = $request->query('unitID');

        $data = [
            'categoryId' => $categoryId,
            'unitID' => $unitID,
        ];

        if (!session('id_role')) {
            return redirect('forbidden');
        }

        // semester menuju halaman daftar mata kuliah pasca-kenotariatan
        if ($data['unitID'] == 1) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_kenotariatan.semester', compact('fakultas', 'prodi'));
        } else if ($data['categoryId'] == 209) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_kenotariatan.2020_2021_genap');
        } else if ($data['categoryId'] == 210) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_kenotariatan.2020_2021_ganjil', $data);
        } else if ($data['categoryId'] == 269) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_kenotariatan.2021_2022_ganjil', $data);
        } else if ($data['categoryId'] == 346) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_kenotariatan.2021_2022_genap', $data);
        } else if ($data['categoryId'] == 433) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_kenotariatan.2022_2023_ganjil', $data);
        } else if ($data['categoryId'] == 533) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_kenotariatan.2022_2023_genap', $data);

            // semester menuju halaman daftar mata kuliah pasca-manajemen
        } else if ($data['unitID'] == 2) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_manajemen.semester', compact('fakultas', 'prodi'));
        } else if ($data['categoryId'] == 159) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_manajemen.2020_2021_ganjil', $data);
        } else if ($data['categoryId'] == 204) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_manajemen.2020_2021_genap', $data);
        } else if ($data['categoryId'] == 268) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_manajemen.2021_2022_ganjil', $data);
        } else if ($data['categoryId'] == 394) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_manajemen.2021_2022_genap', $data);
        } else if ($data['categoryId'] == 434) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_manajemen.2022_2023_ganjil', $data);
        } else if ($data['categoryId'] == 532) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_manajemen.2022_2023_genap', $data);

            // semester menuju halaman daftar mata kuliah pasca-sainsBiomedis
        } else if ($data['unitID'] == 3) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_sainsBiomedis.semester', compact('fakultas', 'prodi'));
        } else if ($data['categoryId'] == 167) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_sainsBiomedis.2020_2021_ganjil', $data);
        } else if ($data['categoryId'] == 329) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_sainsBiomedis.2021_2022_ganjil', $data);
        } else if ($data['categoryId'] == 453) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_sainsBiomedis.2022_2023_ganjil', $data);
        } else if ($data['categoryId'] == 537) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_sainsBiomedis.2022_2023_genap', $data);

            // semester menuju halaman daftar mata kuliah pascasarjana-adminRS
        } else if ($data['unitID'] == 4) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_adminRS.semester', compact('fakultas', 'prodi'));
        } else if ($data['categoryId'] == 536) {
            return view('dashboard.dataMonitoring.pascasarjana.magister_adminRS.2022_2023_genap', $data);

            // semester menuju halaman daftar mata kuliah pasca-doktor-sainsBiomedis    
        } else if ($data['unitID'] == 5) {
            return view('dashboard.dataMonitoring.pascasarjana.doktor_sainsBiomedis.semester', $data);
        } else if ($data['categoryId'] == 535) {
            return view('dashboard.dataMonitoring.pascasarjana.doktor_sainsBiomedis.2022_2023_genap', $data);

            // semester menuju halaman daftar mata kuliah kedokteran   
        } else if ($data['unitID'] == 6) {
            return view('dashboard.dataMonitoring.fk.semester', compact('fakultas', 'prodi'));
        } else if ($data['categoryId'] == 83) {
            return view('dashboard.dataMonitoring.fk.kedokteran.2019_2020_antara', $data);

            // kurikulum 2018
        } else if ($data['categoryId'] == 47) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2018.semester', $data);
        } else if ($data['categoryId'] == 41) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2018.2019_2020_genap', $data);
        } else if ($data['categoryId'] == 70) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2018.2019_2020_antara', $data);
        } else if ($data['categoryId'] == 48) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2018.2020_2021_ganjil', $data);
        } else if ($data['categoryId'] == 203) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2018.2020_2021_genap', $data);
        } else if ($data['categoryId'] == 247) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2018.2020_2021_antara', $data);
        } else if ($data['categoryId'] == 253) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2018.2021_2022_ganjil', $data);
        } else if ($data['categoryId'] == 343) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2018.2021_2022_genap', $data);
        } else if ($data['categoryId'] == 401) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2018.2021_2022_antara', $data);
        } else if ($data['categoryId'] == 425) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2018.2022_2023_ganjil', $data);
        } else if ($data['categoryId'] == 486) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2018.2022_2023_genap', $data);
        } else if ($data['categoryId'] == 561) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2018.2022_2023_antara', $data);

            // kurikulum 2013
        } else if ($data['categoryId'] == 49) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2013.semester', $data);
        } else if ($data['categoryId'] == 50) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2013.2019_2020_genap', $data);
        } else if ($data['categoryId'] == 51) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2013.2020_2021_ganjil', $data);
        } else if ($data['categoryId'] == 71) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2013.2019_2020_antara', $data);
        } else if ($data['categoryId'] == 202) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2013.2020_2021_genap', $data);
        } else if ($data['categoryId'] == 250) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2013.2020_2021_antara', $data);
        } else if ($data['categoryId'] == 263) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2013.2021_2022_ganjil', $data);
        } else if ($data['categoryId'] == 348) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2013.2021_2022_genap', $data);
        } else if ($data['categoryId'] == 402) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2013.2021_2022_antara', $data);
        } else if ($data['categoryId'] == 481) {
            return view('dashboard.dataMonitoring.fk.kedokteran.kurikulum2013.2022_2023_ganjil', $data);

            // program profesi kedokteran umum
        } else if ($data['categoryId'] == 46) {
            return view('dashboard.dataMonitoring.fk.profesi.profesi_dokter', $data);

            // semester menuju halaman daftar mata kuliah kedokteran gigi   
        } else if ($data['unitID'] == 8) {
            return view('dashboard.dataMonitoring.fkg.semester', compact('fakultas', 'prodi'));
        } else if ($data['categoryId'] == 569) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2018.2023_2024_antara', $data);

            // kurikulum 2018
        } else if ($data['categoryId'] == 56) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2018.semester', $data);
        } else if ($data['categoryId'] == 78) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2018.2019_2020_antara', $data);
        } else if ($data['categoryId'] == 61) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2018.2019_2020_genap', $data);
        } else if ($data['categoryId'] == 60) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2018.2020_2021_ganjil', $data);
        } else if ($data['categoryId'] == 180) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2018.2020_2021_genap', $data);
        } else if ($data['categoryId'] == 243) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2018.2021_2022_antara', $data);
        } else if ($data['categoryId'] == 260) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2018.2021_2022_ganjil', $data);
        } else if ($data['categoryId'] == 347) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2018.2021_2022_genap', $data);
        } else if ($data['categoryId'] == 416) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2018.2022_2023_antara', $data);
        } else if ($data['categoryId'] == 505) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2018.2022_2023_ganjil', $data);
        } else if ($data['categoryId'] == 507) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2018.2022_2023_genap', $data);

            // kurikulum 2012
        } else if ($data['categoryId'] == 57) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2012.semester', $data);
        } else if ($data['categoryId'] == 59) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2012.2019_2020_genap', $data);
        } else if ($data['categoryId'] == 75) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2012.2019_2020_antara', $data);
        } else if ($data['categoryId'] == 58) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2012.2020_2021_ganjil', $data);
        } else if ($data['categoryId'] == 199) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2012.2020_2021_genap', $data);
        } else if ($data['categoryId'] == 242) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2012.2021_2022_antara', $data);
        } else if ($data['categoryId'] == 259) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2012.2021_2022_ganjil', $data);
        } else if ($data['categoryId'] == 353) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2012.2021_2022_genap', $data);
        } else if ($data['categoryId'] == 418) {
            return view('dashboard.dataMonitoring.fkg.kedokteranGigi.kurikulum2012.2022_2023_antara', $data);

            // program profesi kedokteran gigi
        } else if ($data['categoryId'] == 74) {
            return view('dashboard.dataMonitoring.fkg.profesi.profesi_dokterGigi', $data);

            // semester menuju halaman daftar mata kuliah fti-ti
        } else if ($data['unitID'] == 10) {
            return view('dashboard.dataMonitoring.fti.ti.semester', compact('fakultas', 'prodi'));
        } else if ($data['categoryId'] == 16) {
            return view('dashboard.dataMonitoring.fti.ti.2019_2020_ganjil', $data);
        } else if ($data['categoryId'] == 39) {
            return view('dashboard.dataMonitoring.fti.ti.2019_2020_genap', $data);
        } else if ($data['categoryId'] == 64) {
            return view('dashboard.dataMonitoring.fti.ti.2019_2020_antara', $data);
        } else if ($data['categoryId'] == 157) {
            return view('dashboard.dataMonitoring.fti.ti.2020_2021_ganjil', $data);
        } else if ($data['categoryId'] == 206) {
            return view('dashboard.dataMonitoring.fti.ti.2020_2021_genap', $data);
        } else if ($data['categoryId'] == 238) {
            return view('dashboard.dataMonitoring.fti.ti.2020_2021_antara', $data);
        } else if ($data['categoryId'] == 240) {
            return view('dashboard.dataMonitoring.fti.ti.2021_2022_ganjil', $data);
        } else if ($data['categoryId'] == 358) {
            return view('dashboard.dataMonitoring.fti.ti.2021_2022_genap', $data);
        } else if ($data['categoryId'] == 403) {
            return view('dashboard.dataMonitoring.fti.ti.2021_2022_antara', $data);
        } else if ($data['categoryId'] == 435) {
            return view('dashboard.dataMonitoring.fti.ti.2022_2023_ganjil', $data);
        } else if ($data['categoryId'] == 503) {
            return view('dashboard.dataMonitoring.fti.ti.2022_2023_genap', $data);
        } else if ($data['categoryId'] == 577) {
            return view('dashboard.dataMonitoring.fti.ti.2022_2023_antara', $data);
        } else if ($data['categoryId'] == 578) {
            return view('dashboard.dataMonitoring.fti.ti.2023_2024_ganjil', $data);

            // semester menuju halaman daftar mata kuliah fti-ip
        } else if ($data['unitID'] == 11) {
            return view('dashboard.dataMonitoring.fti.ip.semester', compact('fakultas', 'prodi'));
        } else if ($data['categoryId'] == 17) {
            return view('dashboard.dataMonitoring.fti.ip.2019_2020_ganjil', $data);
        } else if ($data['categoryId'] == 40) {
            return view('dashboard.dataMonitoring.fti.ip.2019_2020_genap', $data);
        } else if ($data['categoryId'] == 156) {
            return view('dashboard.dataMonitoring.fti.ip.2020_2021_ganjil', $data);
        } else if ($data['categoryId'] == 207) {
            return view('dashboard.dataMonitoring.fti.ip.2020_2021_genap', $data);
        } else if ($data['categoryId'] == 239) {
            return view('dashboard.dataMonitoring.fti.ip.2021_2022_ganjil', $data);
        } else if ($data['categoryId'] == 359) {
            return view('dashboard.dataMonitoring.fti.ip.2021_2022_genap', $data);
        } else if ($data['categoryId'] == 439) {
            return view('dashboard.dataMonitoring.fti.ip.2022_2023_ganjil', $data);
        } else if ($data['categoryId'] == 488) {
            return view('dashboard.dataMonitoring.fti.ip.2022_2023_genap', $data);

            // semester menuju halaman daftar mata kuliah feb-manajemen 
        } else if ($data['unitID'] == 12) {
            return view('dashboard.dataMonitoring.feb.manajemen.semester', compact('fakultas', 'prodi'));
        } else if ($data['categoryId'] == 8) {
            return view('dashboard.dataMonitoring.feb.manajemen.2019_2020_ganjil', $data);
        } else if ($data['categoryId'] == 32) {
            return view('dashboard.dataMonitoring.feb.manajemen.2019_2020_genap', $data);
        } else if ($data['categoryId'] == 66) {
            return view('dashboard.dataMonitoring.feb.manajemen.2019_2020_antara', $data);
        } else if ($data['categoryId'] == 131) {
            return view('dashboard.dataMonitoring.feb.manajemen.2020_2021_ganjil', $data);
        } else if ($data['categoryId'] == 185) {
            return view('dashboard.dataMonitoring.feb.manajemen.2020_2021_genap', $data);
        } else if ($data['categoryId'] == 248) {
            return view('dashboard.dataMonitoring.feb.manajemen.2020_2021_antara', $data);
        } else if ($data['categoryId'] == 278) {
            return view('dashboard.dataMonitoring.feb.manajemen.2021_2022_ganjil', $data);
        } else if ($data['categoryId'] == 360) {
            return view('dashboard.dataMonitoring.feb.manajemen.2021_2022_genap', $data);
        } else if ($data['categoryId'] == 404) {
            return view('dashboard.dataMonitoring.feb.manajemen.2021_2022_antara', $data);
        } else if ($data['categoryId'] == 443) {
            return view('dashboard.dataMonitoring.feb.manajemen.2022_2023_ganjil', $data);
        } else if ($data['categoryId'] == 493) {
            return view('dashboard.dataMonitoring.feb.manajemen.2022_2023_genap', $data);
        } else if ($data['categoryId'] == 550) {
            return view('dashboard.dataMonitoring.feb.manajemen.2022_2023_antara', $data);

            // semester menuju halaman daftar mata kuliah feb-akuntansi   
        } else if ($data['unitID'] == 13) {
            return view('dashboard.dataMonitoring.feb.akuntansi.semester', compact('fakultas', 'prodi'));
        } else if ($data['categoryId'] == 7) {
            return view('dashboard.dataMonitoring.feb.akuntansi.2019_2020_ganjil', $data);
        } else if ($data['categoryId'] == 33) {
            return view('dashboard.dataMonitoring.feb.akuntansi.2019_2020_genap', $data);
        } else if ($data['categoryId'] == 67) {
            return view('dashboard.dataMonitoring.feb.akuntansi.2019_2020_antara', $data);
        } else if ($data['categoryId'] == 130) {
            return view('dashboard.dataMonitoring.feb.akuntansi.2020_2021_ganjil', $data);
        } else if ($data['categoryId'] == 193) {
            return view('dashboard.dataMonitoring.feb.akuntansi.2020_2021_genap', $data);
        } else if ($data['categoryId'] == 420) {
            return view('dashboard.dataMonitoring.feb.akuntansi.2021_2022_antara', $data);
        } else if ($data['categoryId'] == 277) {
            return view('dashboard.dataMonitoring.feb.akuntansi.2021_2022_ganjil', $data);
        } else if ($data['categoryId'] == 371) {
            return view('dashboard.dataMonitoring.feb.akuntansi.2021_2022_genap', $data);
        } else if ($data['categoryId'] == 448) {
            return view('dashboard.dataMonitoring.feb.akuntansi.2022_2023_ganjil', $data);
        } else if ($data['categoryId'] == 508) {
            return view('dashboard.dataMonitoring.feb.akuntansi.2022_2023_genap', $data);
        } else if ($data['categoryId'] == 562) {
            return view('dashboard.dataMonitoring.feb.akuntansi.2022_2023_antara', $data);

            // semester menuju halaman daftar mata kuliah fh-hukum 
        } else if ($data['unitID'] == 14) {
            return view('dashboard.dataMonitoring.fh.semester', compact('fakultas', 'prodi'));
        } else if ($data['categoryId'] == 11) {
            return view('dashboard.dataMonitoring.fh.2019_2020_ganjil', $data);
        } else if ($data['categoryId'] == 34) {
            return view('dashboard.dataMonitoring.fh.2019_2020_genap', $data);
        } else if ($data['categoryId'] == 154) {
            return view('dashboard.dataMonitoring.fh.2020_2021_ganjil', $data);
        } else if ($data['categoryId'] == 176) {
            return view('dashboard.dataMonitoring.fh.2020_2021_genap', $data);
        } else if ($data['categoryId'] == 246) {
            return view('dashboard.dataMonitoring.fh.2020_2021_antara', $data);
        } else if ($data['categoryId'] == 344) {
            return view('dashboard.dataMonitoring.fh.2021_2022_ganjil', $data);
        } else if ($data['categoryId'] == 349) {
            return view('dashboard.dataMonitoring.fh.2021_2022_genap', $data);
        } else if ($data['categoryId'] == 419) {
            return view('dashboard.dataMonitoring.fh.2021_2022_antara', $data);
        } else if ($data['categoryId'] == 428) {
            return view('dashboard.dataMonitoring.fh.2022_2023_ganjil', $data);
        } else if ($data['categoryId'] == 498) {
            return view('dashboard.dataMonitoring.fh.2022_2023_genap', $data);
        } else if ($data['categoryId'] == 567) {
            return view('dashboard.dataMonitoring.fh.2022_2023_antara', $data);

            // semester menuju halaman daftar mata kuliah fpsi
        } else if ($data['unitID'] == 15) {
            return view('dashboard.dataMonitoring.fpsi.semester', compact('fakultas', 'prodi'));
        } else if ($data['categoryId'] == 13) {
            return view('dashboard.dataMonitoring.fpsi.2019_2020_ganjil', $data);
        } else if ($data['categoryId'] == 36) {
            return view('dashboard.dataMonitoring.fpsi.2019_2020_genap', $data);
        } else if ($data['categoryId'] == 68) {
            return view('dashboard.dataMonitoring.fpsi.2020_2021_ganjil', $data);
        } else if ($data['categoryId'] == 184) {
            return view('dashboard.dataMonitoring.fpsi.2020_2021_genap', $data);
        } else if ($data['categoryId'] == 265) {
            return view('dashboard.dataMonitoring.fpsi.2021_2022_ganjil', $data);
        } else if ($data['categoryId'] == 357) {
            return view('dashboard.dataMonitoring.fpsi.2021_2022_genap', $data);
        } else if ($data['categoryId'] == 427) {
            return view('dashboard.dataMonitoring.fpsi.2022_2023_ganjil', $data);
        } else if ($data['categoryId'] == 489) {
            return view('dashboard.dataMonitoring.fpsi.2022_2023_genap', $data);
        }

        return view('dashboard.akademik', compact('fakultas', 'prodi'));
    }

    public function show()
    {
    }
}
