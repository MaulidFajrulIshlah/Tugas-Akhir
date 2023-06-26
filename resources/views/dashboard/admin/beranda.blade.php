@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Beranda')
@section('content')
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Beranda</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Beranda</li>
        </ol>

    <div class="row g-3 my-3">
        <!-- Akun Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Akun</h5>
                        </div>
                        <h5 class="fw-bold mt-1">8784</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Akun Card -->

        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">50</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Mahasiswa Card -->

        <!-- Dosen Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Dosen</h5>
                        </div>
                        <h5 class="fw-bold mt-1">25</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->

        {{-- Table Status Suspend --}}
        <div class="row my-5">
            <h5 class="mb-3 fw-bold title">Daftar Pengguna Dengan Status Suspend</h5>
            <div class="content mx-2 col bg-white p-3 rounded card">
                <table class="table table-bordered table-hover" id="suspend-users">
                    <thead class="table-success">
                        <tr class="text">
                            <th scope="col" class="text" width="50">No</th>
                            <th scope="col" class="text">Nama</th>
                            <th scope="col" class="text">Username</th>
                            <th scope="col" class="text">Status</th>
                        </tr>
                    </thead>
                        
                    <tbody>
                        <tr>
                            <td scope="text">1</td>
                            <td class="text">Admin Mubarik Ahmad</td>
                            <td class="text">admin_mubarik</td>
                            <td><i class="fas fa-eye-slash"  id="toggleEye" style="cursor: pointer;"></i></td>
                        </tr>
                                
                        <tr>
                            <td scope="text">2</td>
                            <td class="text">Operator Dimas Aldi Pratama</td>
                            <td class="text">op_dimas</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                    
                        <tr>
                            <td scope="text">3</td>
                            <td class="text">Admin Wardiyono</td>
                            <td class="text">admin_wardiyono</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                    
                        <tr>
                            <td scope="text">4</td>
                            <td class="text">Dede Pratiwi</td>
                            <td class="text">dede.pratiwi</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                
                        <tr>
                            <td scope="text">5</td>
                            <td class="text">Yana Adharani</td>
                            <td class="text">yana.adharani</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                
                        <tr>
                            <td scope="text">6</td>
                            <td class="text">Jullend Gatc</td>
                            <td class="text">jullendgatc</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                    
                        <tr>
                            <td scope="text">7</td>
                            <td class="text">AFNAN SUHALYA</td>
                            <td class="text">afnan.suhalya</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                    
                        <tr>
                            <td scope="text">8</td>
                            <td class="text">DIYANTARI</td>
                            <td class="text">diyantari</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                    
                        <tr>
                            <td scope="text">9</td>
                            <td class="text">MOHAMMAD FERNANDA LEVIGTA</td>
                            <td class="text">fernanda.levigta</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                    
                        <tr>
                            <td scope="text">10</td>
                            <td class="text">ISTIQLALIAH NURUL</td>
                            <td class="text">istiqlaliah.nurul</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">11</td>
                            <td class="text">KARYONO MIHARTA</td>
                            <td class="text">karyono.miharta</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">12</td>
                            <td class="text">NANDA OCTAVIA</td>
                            <td class="text">nanda.octavia</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">13</td>
                            <td class="text">PANGKUH AJISOKO</td>
                            <td class="text">pangkuh.ajisoko</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">14</td>
                            <td class="text">RITA AMALIA</td>
                            <td class="text">rita.amalia</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">15</td>
                            <td class="text">YETTY WANNY MUALIM</td>
                            <td class="text">yetty.wanny</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">16</td>
                            <td class="text">YULIANTI</td>
                            <td class="text">yulianti</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">17</td>
                            <td class="text">Juliani Kusumaputra</td>
                            <td class="text">juliani.kusumaputra</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">18</td>
                            <td class="text">Nofikha Nasution</td>
                            <td class="text">nofikha.nasution</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">19</td>
                            <td class="text">Muhammad Haris</td>
                            <td class="text">m.haris</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">20</td>
                            <td class="text">Juliani Juliani</td>
                            <td class="text">juliani</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">21</td>
                            <td class="text">Liana Zulfa</td>
                            <td class="text">liana.zulfa</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">22</td>
                            <td class="text">Tiara Antasari</td>
                            <td class="text">tiara.antasari</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">23</td>
                            <td class="text">Aldila Aldila</td>
                            <td class="text">aldila</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">24</td>
                            <td class="text">Rika Nuraisyah</td>
                            <td class="text">rika.nuraisyah</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">25</td>
                            <td class="text">Nicky Nurfajri</td>
                            <td class="text">nicky.nurfajri</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                        <tr>
                            <td scope="text">26</td>
                            <td class="text">Agung Priambodo</td>
                            <td class="text">agung.priambodo</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div> <!--col-->
        </div> <!--row my-5-->
    </div> <!-- /row g-3 my-3 -->
@endsection