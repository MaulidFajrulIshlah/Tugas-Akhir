@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Beranda')
@section('content')

<div class="container-fluid px-5" style="margin-top: 30px;">
    <h5 class="fw-bold" style="margin-top: 35px; font-weight: 400;">Beranda</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Beranda</li>
        </ol>

    <!-- Akun Card -->
    <div class="row g-3 my-3">
        <div class="col-xl-4 col-md-6 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="ps-1">
                            <div class="header-card">
                                <img src="images/Akun.png" style="width: 32px; height: 32px; margin-top: 3px;">
                                <h5 class="card-title fw-bold">Jumlah Akun</h5>
                            </div>
                            <h6 class="fw-bold">10</h6>
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
                            <h6 class="fw-bold">10</h6>
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
                            <h6 class="fw-bold">10</h6>
                            <h6 class="small pt-1">Yang mengakses LAYAR</h6>
                            <span class="small pt-1 text-danger">Dari 2 jam yang lalu</span>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
    </div>
</div>
@endsection