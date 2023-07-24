@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Mata Kuliah')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Data Monitoring Akademik</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Monitoring Akademik</li>
        <li class="breadcrumb-item active">Fakultas Pascasarjana</li>
        <li class="breadcrumb-item active">Magister Sains Biomedis</li>
        <li class="breadcrumb-item active">2021_2022 Ganjil</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <div class="row g-0 my-3">
                <div class="row mb-4">
                    <h5 class="mb-2 fw-bold text">Data Monitoring Akademik</h5>
                    <span class="fs-6 mb-3 text">Semester 2021/2022 Ganjil - Magister Sains Biomedis</span>
                    {{-- Table --}}
                    <div class="container mt-3">
                        <table id="data-matkul" class="table table-bordered table-hover cell-border">
                            <thead class="table-success">
                                <tr>
                                    <th rowspan="2" scope="col" class="text" style="text-align: center;">No</th>
                                    <th rowspan="2" scope="col" class="text" style="text-align: center;">Nama Mata Kuliah</th>
                                    <th colspan="2" scope="col" class="text" style="text-align: center;">Pengumpulan</th>
                                    <th colspan="16" scope="col" class="text merged-cell" style="text-align: center;">Kegiatan Belajar</th>
                                </tr>
                                <tr>
                                    <th style="text-align: center;">Tugas</th>
                                    <th style="text-align: center;">Kuis</th>
                                    <th style="text-align: center;">P1</th>
                                    <th style="text-align: center;">P2</th>
                                    <th style="text-align: center;">P3</th>
                                    <th style="text-align: center;">P4</th>
                                    <th style="text-align: center;">P5</th>
                                    <th style="text-align: center;">P6</th>
                                    <th style="text-align: center;">P7</th>
                                    <th style="text-align: center;">P7</th>
                                    <th style="text-align: center;">P9</th>
                                    <th style="text-align: center;">P10</th>
                                    <th style="text-align: center;">P11</th>
                                    <th style="text-align: center;">P12</th>
                                    <th style="text-align: center;">P13</th>
                                    <th style="text-align: center;">P14</th>
                                    <th style="text-align: center;">P15</th>
                                    <th style="text-align: center;">P16</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('js/dataMonitoring/pascasarjana/magister_sainsBiomedis/2021_2022_ganjil.js') }}"></script>

@endsection
