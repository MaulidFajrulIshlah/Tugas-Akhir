@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Mahasiswa')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Mahasiswa</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Mahasiswa</li>
        <li class="breadcrumb-item active">Pascasarjana</li>
        <li class="breadcrumb-item active">Magister Administrasi Rumah Sakit</li>
        
    </ol>
    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <div class="row g-0 my-0">
                <div class="row my-4 content">
                    <h5 class="mb-3 fw-bold text">Jumlah Mahasiswa Yang Mengakses LAYAR Per Semester</h5>
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
                                    <td class="text">32</td>
                                </tr>
                                <tr>
                                    <th scope="row"class="text">2018/2019 Genap</th>
                                    <td class="text">28</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text">2019/2020 Ganjil</th>
                                    <td class="text">38</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text">2019/2020 Genap</th>
                                    <td class="text">31</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text">2020/2021 Ganjil</th>
                                    <td class="text">43</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text">2020/2021 Genap</th>
                                    <td class="text">39</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text">2021/2022 Ganjil</th>
                                    <td class="text">49</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text">2021/2022 Genap</th>
                                    <td class="text">42</td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text">Total</th>
                                    <td class="text">302</td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!--col-->
                </div> <!--row my-4-->
            </div> <!-- /row g-0 my-0 -->
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
        $(document).ready(function() {
            let table = new DataTable('#table-data');
        });
    </script>
@endsection