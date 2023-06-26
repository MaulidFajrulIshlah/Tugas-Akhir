@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Mata Kuliah')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Data Monitoring Akademik</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Monitoring Akademik</li>
        <li class="breadcrumb-item active">Fakultas Teknologi Informasi</li>
        <li class="breadcrumb-item active">Teknik Informatika</li>
        <li class="breadcrumb-item active">2020_2021 Genap</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <div class="row g-0 my-3">
                <div class="row mb-4">
                    <h5 class="mb-2 fw-bold text">Data Monitoring Akademik</h5>
                    <span class="fs-6 mb-3 text">Semester 2020/2021 Genap - Teknik Informatika</span>
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
                                    <td class="text">Agama 2 - Kelas A dan C</td>
                                    <td class="text">14 Kegiatan</td>
                                    <td class="text">4 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">2</td>
                                    <td class="text">Basis Data 1</td>
                                    <td class="text">30 Kegiatan</td>
                                    <td class="text">11 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">3</td>
                                    <td class="text">Agama 4 - Kelas A dan B</td>
                                    <td class="text">15 Kegiatan</td>
                                    <td class="text">5 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">4</td>
                                    <td class="text">Dasar - DAsar Jaringan 2</td>
                                    <td class="text">32 Kegiatan</td>
                                    <td class="text">12 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">5</td>
                                    <td class="text">Data Mining</td>
                                    <td class="text">10 Kegiatan</td>
                                    <td class="text">3 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">6</td>
                                    <td class="text">Data Wirehouse</td>
                                    <td class="text">16 Kegiatan</td>
                                    <td class="text">7 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">7</td>
                                    <td class="text">Desain dan Analisis Algoritma</td>
                                    <td class="text">29 Kegiatan</td>
                                    <td class="text">8 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">8</td>
                                    <td class="text">Desain dan Pemrograman Web</td>
                                    <td class="text">23 Kegiatan</td>
                                    <td class="text">14 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">9</td>
                                    <td class="text">Kalkulus</td>
                                    <td class="text">32 Kegiatan</td>
                                    <td class="text">14 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">10</td>
                                    <td class="text">Kecerdasan Buatan</td>
                                    <td class="text">34 Kegiatan</td>
                                    <td class="text">10 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">11</td>
                                    <td class="text">Kewarganegaraan </td>
                                    <td class="text">28 Kegiatan</td>
                                    <td class="text">9 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">12</td>
                                    <td class="text">Kewirausahaan</td>
                                    <td class="text">18 Kegiatan</td>
                                    <td class="text">7 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">13</td>
                                    <td class="text">Kewirausahaan Teknologi</td>
                                    <td class="text">17 Kegiatan</td>
                                    <td class="text">8 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">14</td>
                                    <td class="text">Manajemen Jaringan</td>
                                    <td class="text">29 Kegiatan</td>
                                    <td class="text">12 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">15</td>
                                    <td class="text">Nirkabel dan Komputasi Bergerak</td>
                                    <td class="text">34 Kegiatan</td>
                                    <td class="text">13 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">16</td>
                                    <td class="text">Pemrograman Paralel</td>
                                    <td class="text">10 Kegiatan</td>
                                    <td class="text">3 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">17</td>
                                    <td class="text">Pemrosesan Data Terdistribusi</td>
                                    <td class="text">35 Kegiatan</td>
                                    <td class="text">14 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">18</td>
                                    <td class="text">Rekayasa Perangkat Lunak</td>
                                    <td class="text">35 Kegiatan</td>
                                    <td class="text">13 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">19</td>
                                    <td class="text">Sistem Operasi</td>
                                    <td class="text">33 Kegiatan</td>
                                    <td class="text">10 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">20</td>
                                    <td class="text">Pengantar E-health</td>
                                    <td class="text">25 Kegiatan</td>
                                    <td class="text">7 Kegiatan</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
