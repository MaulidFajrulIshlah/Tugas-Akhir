@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Mata Kuliah')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Data Monitoring Akademik</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Monitoring Akademik</li>
        <li class="breadcrumb-item active">Fakultas Teknologi Informasi</li>
        <li class="breadcrumb-item active">Ilmu Perpustakaan</li>
        <li class="breadcrumb-item active">2019_2020 Ganjil</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <div class="row g-0 my-3">
                <div class="row mb-4">
                    <h5 class="mb-2 fw-bold text">Data Monitoring Akademik</h5>
                    <span class="fs-6 mb-3 text">Semester 2019/2020 Ganjil - Ilmu Perpustakaan</span>
                    {{-- Table --}}
                    <div class="container mt-3">
                        <table class="table table-master table-bordered table-hover">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col" class="text">No</th>
                                    <th scope="col" class="text">Nama Mata Kuliah</th>
                                    <th scope="col" class="text">Kegiatan Belajar</th>
                                    <th scope="col" class="text">Pengumpulan Kegiatan Belajar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text">1</td>
                                    <td class="text">Dasar-dasar Pemrograman</td>
                                    <td class="text">100 Kegiatan</td>
                                    <td class="text">95 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">2</td>
                                    <td class="text">Basis Data</td>
                                    <td class="text">200 Kegiatan</td>
                                    <td class="text">100 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">3</td>
                                    <td class="text">Agama 1</td>
                                    <td class="text">20 Kegiatan</td>
                                    <td class="text">5 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">4</td>
                                    <td class="text">Pemrograman Berbasis Platform</td>
                                    <td class="text">78 Kegiatan</td>
                                    <td class="text">90 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">5</td>
                                    <td class="text">Data Mining</td>
                                    <td class="text">100 Kegiatan</td>
                                    <td class="text">95 Kegiatan</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
