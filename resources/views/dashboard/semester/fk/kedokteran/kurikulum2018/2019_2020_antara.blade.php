@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Mata Kuliah')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Mata Kuliah</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Mata Kuliah</li>
        <li class="breadcrumb-item active">Fakultas Kedokteran</li>
        <li class="breadcrumb-item active">Kedokteran</li>
        <li class="breadcrumb-item active">Kurikulum 2018</li>
        <li class="breadcrumb-item active">2019_2020 Antara</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">

            <div class="row g-0 my-3">
                <div class="row mb-4">
                    <h5 class="mb-2 fw-bold text">Mata Kuliah</h5>
                    <span class="fs-6 mb-3 text">Semester 2019/2020 Antara - Kedokteran</span>

                    <div class="col-xl-4 col-md-6 col-11 col-lg-5 my-3">
                        @include('dashboard.layouts.jumlahDaftarMatkul')
                    </div>

                    <div class="container mt-4">
                        @include('dashboard.layouts.table_matkul')
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/semester/fk/kedokteran/kurikulum2018/2019_2020_antara.js') }}"></script>

@endsection
