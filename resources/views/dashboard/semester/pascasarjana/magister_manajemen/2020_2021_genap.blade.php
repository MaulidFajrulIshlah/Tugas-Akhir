@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Mata Kuliah')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Mata Kuliah</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Mata Kuliah</li>
        <li class="breadcrumb-item active">Fakultas Pascasarjana</li>
        <li class="breadcrumb-item active">Magister Manajemen</li>
        <li class="breadcrumb-item active">2020_2021 Genap</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">

            <div class="row g-0 my-3">
                <div class="row mb-4">
                    <h5 class="mb-2 fw-bold text">Mata Kuliah</h5>
                    <span class="fs-6 mb-3 text">Semester 2020/2021 Genap - Magister Manajemen</span>

                    <div class="col-xl-4 col-md-6 col-11 col-lg-5 my-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="ps-1">
                                    <div class="header">
                                        <h5 class="card-title fw-bold">Jumlah Daftar Mata Kuliah</h5>
                                    </div>
                                    <h5 class="fw-bold mt-3" id="jumlah-matkul"></h5>
                                    <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                                    <div class="card-footer bg-transparent mt-3 ps-0">
                                        <small class="text-danger"><span id="last-updated"></span></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-4">
                        <table  id="data-matkul" table class="table table-bordered table-hover cell-border">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col" class="text">No</th>
                                    <th scope="col" class="text">Daftar Mata Kuliah</th>
                                    <th scope="col" class="text">Halaman Mata Kuliah Lengkap</th>
                                </tr>
                            </thead>

                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/semester/pascasarjana/magister_manajemen/2020_2021_genap.js') }}"></script>

@endsection
