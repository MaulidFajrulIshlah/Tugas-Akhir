@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Beranda')
@section('content')
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Beranda</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Beranda</li>
        </ol>

    <div class="row g-3 my-3">
        <div class="cards">
            <!-- Mahasiswa Card -->
            <div class="card-item">
                <div class="card info-card mhs-card" style="width: 20rem;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="ps-1">
                                <div class="card-title">
                                    <img src="/images/Akun.png" style="width: 32px; height: 32px; margin-top: 3px;">
                                    <h5 class="card-text fw-bold">Jumlah Mahasiswa</h5>
                                </div>
                                <h6 class="fw-bold">150</h6>
                                <h6 class="small pt-1">Yang mengakses LAYAR</h6>
                                <span class="small pt-1 text-danger">Dari 2 jam yang lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Mahasiswa Card -->

            <!-- Dosen Card -->
            <div class="card-item">
                <div class="card info-card dosen-card" style="width: 20rem;">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="ps-1">
                                <div class="card-title">
                                    <img src="/images/Akun.png" style="width: 32px; height: 32px; margin-top: 3px;">
                                    <h5 class="card-text fw-bold">Jumlah Dosen</h5>
                                </div>
                                <h6 class="fw-bold">150</h6>
                                <h6 class="small pt-1">Yang mengakses LAYAR</h6>
                                <span class="small pt-1 text-danger">Dari 2 jam yang lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Dosen Card -->
        </div>
    </div> <!-- /row g-3 my-3 -->
@endsection

@section('stylesheets')
    <link rel="stylesheet" href="/css/dashboard/main2.css">
@endsection