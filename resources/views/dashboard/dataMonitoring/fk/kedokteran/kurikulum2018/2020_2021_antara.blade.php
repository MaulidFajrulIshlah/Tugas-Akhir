@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Akademik')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Data Monitoring Akademik</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Akademik</li>
        <li class="breadcrumb-item active">Fakultas Kedokteran</li>
        <li class="breadcrumb-item active">Kedokteran</li>
        <li class="breadcrumb-item active">Kurikulum 2018</li>
        <li class="breadcrumb-item active">2020_2021 Antara</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">

            <div class="row g-0 my-3">
                <div class="row mb-4">
                    <h5 class="mb-2 fw-bold text">Data Monitoring Akademik</h5>
                    <span class="fs-6 mb-3 text">Semester 2020/2021 Antara - Kedokteran</span>
                    {{-- Table --}}
                    <div class="container mt-3">
                        @include('dashboard.layouts.table_dataMonitoring')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/dataMonitoring/fk/kedokteran/kurikulum2018/2020_2021_antara.js') }}"></script>

@endsection
