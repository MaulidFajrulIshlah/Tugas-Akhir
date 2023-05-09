@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Beranda')
@section('content')
<div class="container-fluid px-5" style="margin-top: 30px;">
    <h5 class="fw-bold" style="margin-top: 35px; font-weight: 400;">Beranda</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Beranda</li>
        </ol>

    <div class="row g-3 my-3">
        <!-- Akun Card -->
        <div class="col-xl-4 col-md-6 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="ps-1">
                            <div class="header-card">
                                <img src="images/Akun.png" style="width: 32px; height: 32px; margin-top: 3px;">
                                <h5 class="card-title fw-bold">Jumlah Akun</h5>
                            </div>
                            <h6 class="fw-bold">200</h6>
                            <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                            <span class="small pt-1 text-danger">Dari 2 jam yang lalu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Akun Card -->

        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card mhs-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="ps-1">
                            <div class="header-card">
                                <img src="images/Akun.png" style="width: 32px; height: 32px; margin-top: 3px;">
                                <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                            </div>
                            <h6 class="fw-bold">200</h6>
                            <h6 class="small pt-1">Yang mengakses LAYAR</h6>
                            <span class="small pt-1 text-danger">Dari 2 jam yang lalu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Mahasiswa Card -->

        <!-- Dosen Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card dosen-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="ps-1">
                            <div class="header-card">
                                <img src="images/Akun.png" style="width: 32px; height: 32px; margin-top: 3px;">
                                <h5 class="card-title fw-bold">Jumlah Dosen</h5>
                            </div>
                            <h6 class="fw-bold">200</h6>
                            <h6 class="small pt-1">Yang mengakses LAYAR</h6>
                            <span class="small pt-1 text-danger">Dari 2 jam yang lalu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->

        {{-- Table Status Suspend --}}
            <div class="row my-5">
                <h5 class="mb-3 fw-bold text">Daftar Pengguna Dengan Status Suspend</h5>
                <div class="mx-2 col bg-white p-3 rounded card">
                    <table class="table table-bordered table">
                        <thead>
                            <tr class="text">
                                <th scope="col" class="text" width="50">No</th>
                                <th scope="col" class="text">Nama</th>
                                <th scope="col" class="text">Nomor Pokok Mahasiswa</th>
                                <th scope="col" class="text">Status</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td class="text">Intan</td>
                                <td class="text">0123456789</td>
                                <td><i class="fas fa-eye-slash"  id="toggleEye" style="cursor: pointer;"></i></td>
                            </tr>
                                
                            <tr>
                                <th scope="row">2</th>
                                <td class="text">Rahmah</td>
                                <td class="text">0123456789</td>
                                <td><i class="fas fa-eye-slash"></i></td>
                            </tr>
                                    
                            <tr>
                                <th scope="row">3</th>
                                <td class="text">Dila</td>
                                <td class="text">0123456789</td>
                                <td><i class="fas fa-eye-slash"></i></td>
                            </tr>
                                    
                            <tr>
                                <th scope="row">4</th>
                                <td class="text">Bunga</td>
                                <td class="text">0123456789</td>
                                <td><i class="fas fa-eye-slash"></i></td>
                            </tr>
                                
                            <tr>
                                <th scope="row">5</th>
                                <td class="text">Nur</td>
                                <td class="text">0123456789</td>
                                <td><i class="fas fa-eye-slash"></i></td>
                            </tr>
                                
                            <tr>
                                <th scope="row">6</th>
                                <td class="text">Fatimah</td>
                                <td class="text">0123456789</td>
                                <td><i class="fas fa-eye-slash"></i></td>
                            </tr>
                                    
                            <tr>
                                <th scope="row">7</th>
                                <td class="text">Hana</td>
                                <td class="text">0123456789</td>
                                <td><i class="fas fa-eye-slash"></i></td>
                            </tr>
                                    
                            <tr>
                                <th scope="row">8</th>
                                <td class="text">Nisa</td>
                                <td class="text">0123456789</td>
                                <td><i class="fas fa-eye-slash"></i></td>
                            </tr>
                                    
                            <tr>
                                <th scope="row">9</th>
                                <td class="text">Dina</td>
                                <td class="text">0123456789</td>
                                <td><i class="fas fa-eye-slash"></i></td>
                            </tr>
                                    
                            <tr>
                                <th scope="row">10</th>
                                <td class="text">Harumi</td>
                                <td class="text">0123456789</td>
                                <td><i class="fas fa-eye-slash"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div> <!--col-->
            </div> <!--row my-5-->
    </div> <!-- /row g-3 my-3 -->
</div> <!-- /container-fluid -->
@endsection