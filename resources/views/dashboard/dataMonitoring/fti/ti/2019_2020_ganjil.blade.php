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
        <li class="breadcrumb-item active">2019_2020 Ganjil</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <div class="row g-0 my-3">
                <div class="row mb-4">
                    <h5 class="mb-2 fw-bold text">Data Monitoring Akademik</h5>
                    <span class="fs-6 mb-3 text">Semester 2019/2020 Ganjil - Teknik Informatika</span>
                    {{-- Table --}}
                    <div class="container mt-3">
                        <table id="data-monitoring" class="table table-master table-bordered table-hover">
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
                                    <td class="text">Interaksi Manusia Komputer Kelas B</td>
                                    <td class="text">38 Kegiatan</td>
                                    <td class="text">11 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">2</td>
                                    <td class="text">Agama 3 Kelas C</td>
                                    <td class="text">14 Kegiatan</td>
                                    <td class="text">5 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">3</td>
                                    <td class="text">Realitas Virtual dan Augmentasi</td>
                                    <td class="text">33 Kegiatan</td>
                                    <td class="text">10 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">4</td>
                                    <td class="text">Administrasi Sistem</td>
                                    <td class="text">31 Kegiatan</td>
                                    <td class="text">11 Kegiatan</td>
                                </tr>

                                <tr>
                                    <td class="text">5</td>
                                    <td class="text">Manajemen Pengetahuan</td>
                                    <td class="text">28 Kegiatan</td>
                                    <td class="text">10 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">6</td>
                                    <td class="text">Komputasi Awan dan Grid</td>
                                    <td class="text">34 Kegiatan</td>
                                    <td class="text">11 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">7</td>
                                    <td class="text">Teknologi WAN CCNA 4</td>
                                    <td class="text">34 Kegiatan</td>
                                    <td class="text">13 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">8</td>
                                    <td class="text">Audit Sistem Informasi</td>
                                    <td class="text">36 Kegiatan</td>
                                    <td class="text">12 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">9</td>
                                    <td class="text">Sistem Informasi Enterprise</td>
                                    <td class="text">34 Kegiatan</td>
                                    <td class="text">13 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">10</td>
                                    <td class="text">Teknik Multimedia</td>
                                    <td class="text">30 Kegiatan</td>
                                    <td class="text">10 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">11</td>
                                    <td class="text">Logika Fuzzy dan Sistem Pakar</td>
                                    <td class="text">29 Kegiatan</td>
                                    <td class="text">9 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">12</td>
                                    <td class="text">Etika Profesi</td>
                                    <td class="text">36 Kegiatan</td>
                                    <td class="text">10 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">13</td>
                                    <td class="text">Temu Kembali Informasi</td>
                                    <td class="text">35 Kegiatan</td>
                                    <td class="text">14 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">14</td>
                                    <td class="text">Pengembangan Kepribadian Islam</td>
                                    <td class="text">22 Kegiatan</td>
                                    <td class="text">6 Kegiatan</td>
                                </tr>
                                <tr>
                                    <td class="text">15</td>
                                    <td class="text">Komputer dan Masyarakat</td>
                                    <td class="text">33 Kegiatan</td>
                                    <td class="text">10 Kegiatan</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        $(document).ready(function() {
            let table = new DataTable('#data-monitoring');
        });
    </script>
@endsection
