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
        <li class="breadcrumb-item active">2020_2021 Genap</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <div class="row g-0 my-3">
                <div class="row mb-4">
                    <h5 class="mb-2 fw-bold text">Data Monitoring Akademik</h5>
                    <span class="fs-6 mb-3 text">Semester 2020/2021 Genap - Ilmu Perpustakaan</span>
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
                                    <td class="text">Agama 2 Thaharah</td>
                                    <td class="text">28 Kegiatan</td>
                                    <td class="text">4 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">2</td>
                                    <td class="text">Aspek Hukum dalam Informasi</td>
                                    <td class="text">27 Kegiatan</td>
                                    <td class="text">10 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">3</td>
                                    <td class="text">Indeks dan Abstrak</td>
                                    <td class="text">32 Kegiatan</td>
                                    <td class="text">14 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">4</td>
                                    <td class="text">Informasi dalam Perspektif Islam</td>
                                    <td class="text">28 Kegiatan</td>
                                    <td class="text">12 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">5</td>
                                    <td class="text">Informasi Kesehatan</td>
                                    <td class="text">29 Kegiatan</td>
                                    <td class="text">10 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">6</td>
                                    <td class="text">Jasa Rujukan Informasi</td>
                                    <td class="text">30 Kegiatan</td>
                                    <td class="text">12 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">7</td>
                                    <td class="text">Komunikasi Terapan</td>
                                    <td class="text">32 Kegiatan</td>
                                    <td class="text">12 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">8</td>
                                    <td class="text">Manajemen Basis Data</td>
                                    <td class="text">35 Kegiatan</td>
                                    <td class="text">15 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">9</td>
                                    <td class="text">Manajemen Perpustakaan Digital</td>
                                    <td class="text">28 Kegiatan</td>
                                    <td class="text">7 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">10</td>
                                    <td class="text">Manajemen Pusat Arsip</td>
                                    <td class="text">31 Kegiatan</td>
                                    <td class="text">10 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">11</td>
                                    <td class="text">Manajemen Terbitan Berseri</td>
                                    <td class="text">13 Kegiatan</td>
                                    <td class="text">5 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">12</td>
                                    <td class="text">Metode Penelitian Kualitatif</td>
                                    <td class="text">26 Kegiatan</td>
                                    <td class="text">9 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">13</td>
                                    <td class="text">Otomasi Perkantoran</td>
                                    <td class="text">35 Kegiatan</td>
                                    <td class="text">15 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">14</td>
                                    <td class="text">Otomasi Perpustakaan</td>
                                    <td class="text">27 Kegiatan</td>
                                    <td class="text">12 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">15</td>
                                    <td class="text">Penerbitan Grafis dan Elektronik</td>
                                    <td class="text">35 Kegiatan</td>
                                    <td class="text">14 Kegiatan</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
