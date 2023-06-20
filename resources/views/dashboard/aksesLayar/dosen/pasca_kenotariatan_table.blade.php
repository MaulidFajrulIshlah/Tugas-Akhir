@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Dosen')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Dosen</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Dosen</li>
        <li class="breadcrumb-item active">Pascasarjana</li>
        <li class="breadcrumb-item active">Magister Kenotariatan</li>
    </ol>
    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <div class="row g-0 my-0">
                <div class="row my-4 content">
                    <h5 class="mb-3 fw-bold text">Jumlah Dosen Yang Mengakses LAYAR Per Semester</h5>
                    <div class="col">
                        <table id="table-data" class="table bg-white table-bordered table-hover">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col" width="80px" class="text">Semester</th>
                                    <th scope="col" class="text">Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" width="40%" class="text">2018/2019 Ganjil</th>
                                    <td class="text"></td>
                                </tr>
                                <tr>
                                    <th scope="row"class="text">2018/2019 Genap</th>
                                    <td class="text"></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text">2019/2020 Ganjil</th>
                                    <td class="text"></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text">2019/2020 Genap</th>
                                    <td class="text"></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text">2020/2021 Ganjil</th>
                                    <td class="text"></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text">2020/2021 Genap</th>
                                    <td class="text"></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text">2021/2022 Ganjil</th>
                                    <td class="text"></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text">2021/2022 Genap</th>
                                    <td class="text"></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text">Total</th>
                                    <td class="text"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!--col-->
                </div> <!--row my-4-->
            </div> <!-- /row g-0 my-0 -->
        </div>
    </div>    
@endsection