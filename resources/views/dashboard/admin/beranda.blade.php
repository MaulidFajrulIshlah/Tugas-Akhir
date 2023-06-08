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
                        <h5 class="fw-bold mt-1">200</h5>
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
                        <h5 class="fw-bold mt-1">200</h5>
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
                        <h5 class="fw-bold mt-1">200</h5>
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
                            <th scope="col" class="text">Nomor Pokok Mahasiswa</th>
                            <th scope="col" class="text">Status</th>
                        </tr>
                    </thead>
                        
                    <tbody>
                        <tr>
                            <td scope="text">1</td>
                            <td class="text">Intan</td>
                            <td class="text">0123456789</td>
                            <td><i class="fas fa-eye-slash"  id="toggleEye" style="cursor: pointer;"></i></td>
                        </tr>
                                
                        <tr>
                            <td scope="text">2</td>
                            <td class="text">Rahmah</td>
                            <td class="text">0123456789</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                    
                        <tr>
                            <td scope="text">3</td>
                            <td class="text">Dila</td>
                            <td class="text">0123456789</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                    
                        <tr>
                            <td scope="text">4</td>
                            <td class="text">Bunga</td>
                            <td class="text">0123456789</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                
                        <tr>
                            <td scope="text">5</td>
                            <td class="text">Nur</td>
                            <td class="text">0123456789</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                
                        <tr>
                            <td scope="text">6</td>
                            <td class="text">Fatimah</td>
                            <td class="text">0123456789</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                    
                        <tr>
                            <td scope="text">7</td>
                            <td class="text">Hana</td>
                            <td class="text">0123456789</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                    
                        <tr>
                            <td scope="text">8</td>
                            <td class="text">Nisa</td>
                            <td class="text">0123456789</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                    
                        <tr>
                            <td scope="text">9</td>
                            <td class="text">Dina</td>
                            <td class="text">0123456789</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                                    
                        <tr>
                            <td scope="text">10</td>
                            <td class="text">Harumi</td>
                            <td class="text">0123456789</td>
                            <td><i class="fas fa-eye-slash"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div> <!--col-->
        </div> <!--row my-5-->
    </div> <!-- /row g-3 my-3 -->
@endsection