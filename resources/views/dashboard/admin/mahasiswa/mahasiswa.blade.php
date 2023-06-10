@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Mahasiswa')
@section('content')
    <!-- Route -->
        <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Mahasiswa</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Mahasiswa</li>
        </ol>

        <div class="row g-3 my-3">
            <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
                @include('dashboard.layouts.navFakultas')
            
                <div class="row g-0 my-0 mx-2">
                    <div class="row my-4">
                        <h5 class="mb-4 fw-bold text">Jumlah Mahasiswa Yang Mengakses LAYAR Per Semester</h5>
                        <div class="container">
                            <table id="table-data" class="table bg-white table-bordered table-hover">
                                <thead class="table-success">
                                    <tr>
                                        <th scope="col" width="80px" class="text">Semester</th>
                                        <th scope="col" class="text">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row" width="40%" class="text">2018/2019 Ganjil</td>
                                        <td class="text"></td>
                                    </tr>
                                    <tr>
                                        <td scope="row"class="text">2018/2019 Genap</td>
                                        <td class="text"></td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text">2019/2020 Ganjil</td>
                                        <td class="text"></td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text">2019/2020 Genap</td>
                                        <td class="text"></td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text">2020/2021 Ganjil</td>
                                        <td class="text"></td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text">2020/2021 Genap</td>
                                        <td class="text"></td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text">2021/2022 Ganjil</td>
                                        <td class="text"></td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text">2021/2022 Genap</td>
                                        <td class="text"></td>
                                    </tr>
                                    <tr>
                                        <td scope="row" class="text">Total</td>
                                        <td class="text"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!--col-->
                    </div> <!--row my-4-->
                </div> <!-- /row g-0 my-0 -->
            </div> <!-- /col bg-white -->
        </div>
@endsection