@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Akademik')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Akademik</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Akademik</li>
        <li class="breadcrumb-item active">Fakultas Pascasarjana</li>
        <li class="breadcrumb-item active">Magister Sains Biomedis</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <h5 class="m-3 mt-4 mb-0 fw-bold text">Daftar Semester</h5>
            <hr>
                    
            <div class="row g-0">
                <div class="row">
                    <ul id="semester" class="fakultas-prodi"></ul>
                </div>
            </div>
        </div> <!-- /col bg-white -->
    </div>
        
    <script src="{{ asset('js/dataMonitoring/pascasarjana/magister_sainsBiomedis/semester.js') }}"></script>

@endsection