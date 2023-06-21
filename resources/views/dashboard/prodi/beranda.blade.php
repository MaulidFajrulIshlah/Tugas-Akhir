@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Beranda')
@section('content')
    <h5 class="fw-bold" style="margin-top: 40px; color: #303030; font-weight: 400;">Beranda</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Beranda</li>
        </ol>

    <div class="row g-3 my-3">
        @can('prodi-magister-kenotariatan')
        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">20</h5>
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
                        <h5 class="fw-bold mt-1">20</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
        @endcan

        @can('prodi-magister-manajemen')
        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">20</h5>
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
                        <h5 class="fw-bold mt-1">20</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
        @endcan

        @can('prodi-magister-sainsBiomedis')
        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">20</h5>
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
                        <h5 class="fw-bold mt-1">20</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
        @endcan

        @can('prodi-magister-adminRS')
        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">20</h5>
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
                        <h5 class="fw-bold mt-1">20</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
        @endcan

        @can('prodi-doktor-sainsBiomedis')
        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">20</h5>
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
                        <h5 class="fw-bold mt-1">20</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
        @endcan

        @can('prodi-kedokteran')
        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">20</h5>
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
                        <h5 class="fw-bold mt-1">20</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
        @endcan

        @can('prodi-profesi-dokter')
        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">20</h5>
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
                        <h5 class="fw-bold mt-1">20</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
        @endcan

        @can('prodi-kedokteranGigi')
        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">20</h5>
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
                        <h5 class="fw-bold mt-1">20</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
        @endcan

        @can('prodi-profesi-kedokteranGigi')
        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">20</h5>
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
                        <h5 class="fw-bold mt-1">20</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
        @endcan

        @can('prodi-ti')
        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">20</h5>
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
                        <h5 class="fw-bold mt-1">20</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
        @endcan

        @can('prodi-ip')
        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">20</h5>
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
                        <h5 class="fw-bold mt-1">20</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
        @endcan

        @can('prodi-manajemen')
        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">20</h5>
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
                        <h5 class="fw-bold mt-1">20</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
        @endcan

        @can('prodi-akuntansi')
        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">20</h5>
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
                        <h5 class="fw-bold mt-1">20</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
        @endcan

        @can('prodi-hukum')
        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">20</h5>
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
                        <h5 class="fw-bold mt-1">20</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
        @endcan

        @can('prodi-psikologi')
        <!-- Mahasiswa Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
            <div class="card info-card akun-card">
                <div class="card-body">
                    <div class="ps-1">
                        <div class="header-card">
                            <img src="/images/Akun.png" style="width: 35px; height: 35px; margin-top: 3px;">
                            <h5 class="card-title fw-bold">Jumlah Mahasiswa</h5>
                        </div>
                        <h5 class="fw-bold mt-1">20</h5>
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
                        <h5 class="fw-bold mt-1">20</h5>
                        <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                        <div class="card-footer bg-transparent mt-3 ps-0">
                            <small class="text-danger">Dari 2 jam yang lalu</small>
                        </div> 
                    </div>
                </div>
            </div>
        </div><!-- End Dosen Card -->
        @endcan
    </div>
@endsection