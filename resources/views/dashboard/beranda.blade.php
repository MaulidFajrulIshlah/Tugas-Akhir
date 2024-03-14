@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Beranda')
@section('content')
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Beranda</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Beranda</li>

    </ol>

    <div class="row g-3 my-3">

        {{-- Suggest: Cek lagi, apakah penggunaan @yield('card') ini beneran dibutuhin atau enggak --}}

        {{-- <div class="w-100 d-flex">
            @can('admin')
                <div class="row my-5 w-100" id="loading">
                    <div class="content col w-100 bg-white p-3 rounded card">
                        <h5 class="mb-3 text text-center fw-bold title">Daftar Pengguna Dengan Status Suspend</h5>
                        <table id="data-suspend" class="table table-bordered table-hover cell-border">
                            <thead class="table-success">
                                <tr class="text">
                                    <th scope="col" class="text" width="50">No</th>
                                    <th scope="col" class="text">Nama Pengguna</th>
                                    <th scope="col" class="text">Nama Lengkap</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div> <!--col-->
                </div> <!--row my-5-->
                <script src="{{ asset('js/suspend.js') }}"></script>
            @endcan
        </div>
    </div> <!-- /row g-3 my-3 --> --}}

        <div class="mock-atas">
            @if (!empty($lastLine))
                <div class="card">
                    <div class="card-header">Status Terbaru</div>
                    <div class="card-body">
                        <p>{{ $lastLine }}</p>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-header">Tidak Ada Data</div>
                    <div class="card-body">
                        <p>Data status tidak tersedia saat ini.</p>
                    </div>
                </div>
            @endif



            <div class="col-xl-4 col-md-6 col-11 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <div class="ps-1">
                            <div class="header-card">
                                <img src="{{ asset('images/akun.png') }}"
                                    style="width: 35px; height: 35px; margin-top: 3px;">
                                <h5 class="card-title fw-bold">Status SSL</h5>
                            </div>
                            <h5 id="ssl-check" class="fw-bold mt-1"></h5>

                            <!-- Tampilkan informasi SSL certificate -->
                            <p>Sisa Hari SSL Certificate: {{ $daysUntilExpiration }}</p>

                        </div>
                    </div>
                </div>
            </div><!-- End Akun Card -->

            @yield('card')
        </div>


        <div class="mock-tengah">

            {{-- Jumlah mata kuliah --}}
            <div class="div4">
                <div class="head-matkul">
                    <h2> <strong>Jumlah Mata Kuliah</strong> </h2>
                </div>
                <div class="body-matkul">
                    <div>
                        <canvas id="myChart" style="width:400px; height: auto;"></canvas>
                    </div>
                    <div style="margin-left: 50px; width: 20px;">
                        <h3>Total: <strong>3381</strong></h3>
                        <h3 style="margin-bottom: 20px;">Semester Berjalan: <strong>130</strong></h3>
                        <div class="garis-separator"></div>
                        <label for="dropdown" style="font-weight: 600; margin-right: 10px;">Filter:</label>
                        <div class="dropdown">
                            <button class="dropbtn">Semua</button>
                            <div class="dropdown-content">
                                <a href="#">Akutansi</a>
                                <a href="#">Manajemen</a>
                                <a href="#">Psikologi</a>
                                <a href="#">Hukum</a>
                                <a href="#">Teknik Informatika</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Jumlah mata kuliah --}}

            <div class="mock-container-atas">

                <!-- Informasi Umum -->
                <div class="div5">
                    <div>
                        <h2 style="margin: 20px;"><strong>Informasi Umum</strong></h2>
                        <div class="garis-separator"></div>
                    </div>
                    <div
                        style="display: flex; flex-direction: column; width: 100%; align-items: center; justify-content: center; gap: 10px; padding-bottom: 25px; margin-top: 20px">
                        <h4>Versi : 3.10.223</h4>
                        <h4>Pemeliharaan: Tidak Aktif</h4>
                        <h4>Tahun Ajaran: 2023/2024</h4>
                        <h4>Semester : Genap</h4>
                    </div>
                </div>
                <!-- Informasi Umum -->


                {{-- integrasi dengan spada --}}
                <div class="div6">
                    <div>
                        <h2 style="margin: 20px;"><strong>Integrasi dengan SPADA</strong></h2>
                        <div class="garis-separator"></div>
                    </div>
                    <div
                        style="display: flex; flex-direction: column; align-items: center; justify-content: space-around; height: 50%;">
                        <h3 style="margin: 20px; text-align: center;">Data universitas YARSI ditemukan dalam SPADA</h3>
                        <h5 style="text-align: center"> <strong>Terakhir akses: <span>2024-11-1 16:20:14</span></strong>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        {{-- integrasi dengan spada --}}




        <div class="mock-container-bawah">

            <!-- Statistik -->
            <div class="div7">
                <div>
                    <h2 style="margin: 20px;"><strong>Statistik (Rata-Rata)</strong></h2>
                    <div class="garis-separator"></div>
                </div>
                <div
                    style="display: flex; flex-direction: column; width: 100%; align-items: center; gap: 10px; padding-bottom: 25px;">
                    <h4>Sumber Belajar: 3</h4>
                    <h4>Aktivitas Belajar: 13</h4>
                    <h4>Tautan Ekesternal: 2</h4>
                    <h4>Ujian: 0.1</h4>
                    <div class="dropup">
                        <button class="dropbtn">Semua</button>
                        <div class="dropup-content">
                            <a href="#">Link 1</a>
                            <a href="#">Link 2</a>
                            <a href="#">Link 3</a>
                        </div>
                    </div>

                </div>

            </div>
            <!-- Statistik -->

            {{-- aktivitas terbanyak --}}
            <div class="div8">
                <div>
                    <h2 style="margin: 20px;"><strong>Aktivitas Terbanyak Semester Berjalan</strong></h2>
                    <div class="garis-separator"></div>
                </div>
                <div
                    style="display: flex; flex-direction: column; width: 100%; align-items: center; gap: 10px; padding-bottom: 25px;">
                    <ol>
                        <li style="margin-bottom: 10px;">Mata Kuliah A</li>
                        <li style="margin-bottom: 10px;">Mata Kuliah C</li>
                        <li style="margin-bottom: 10px;">Mata Kuliah B</li>
                        <li style="margin-bottom: 10px;">Mata Kuliah D</li>
                        {{-- <li style="margin-bottom: 10px;">Mata Kuliah E</li> --}}
                    </ol>
                    <div class="dropup">
                        <button class="dropbtn">Semua</button>
                        <div class="dropup-content">
                            <a href="#">Link 1</a>
                            <a href="#">Link 2</a>
                            <a href="#">Link 3</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- aktivitas terbanyak --}}

            {{-- lengkap administratif --}}
            <div class="div9">
                <div>
                    <h2 style="margin: 20px;"><strong>Lengkap Administratif Semester Berjalan</strong></h2>
                    <div class="garis-separator"></div>
                </div>
                <div
                    style="display: flex; flex-direction: column; width: 100%; align-items: center; gap: 10px; padding-bottom: 25px;">
                    <h4>Akutansi : 0</h4>
                    <h4>Manajemen : 8</h4>
                    <h4>Psikologi : 6</h4>
                    <h4>Teknik Informatika : 10</h4>
                </div>
            </div>
        </div>
        {{-- lengkap administratif --}}



        <!-- Bootstrap JS (untuk fitur tertentu yang menggunakan JavaScript) -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



        <script>
            var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
            var yValues1 = [200, 180, 78, 24, 15];
            var yValues2 = [30, 42, 33, 22, 18];
            var yValues3 = [18, 32, 27, 20, 12];
            var barColors1 = ["red", "green", "blue", "orange", "brown"];
            var barColors2 = ["lightcoral", "lightgreen", "lightblue", "lightsalmon", "sandybrown"];
            var barColors3 = ["salmon", "limegreen", "deepskyblue", "darkorange", "peru"];

            new Chart("myChart", {
                type: "bar",
                data: {
                    labels: ["2021/2022", "2021/2022", "2021/2022"],
                    datasets: [{
                            label: "Ganjil",
                            backgroundColor: barColors1[0],
                            data: [yValues1[0], yValues1[0], yValues1[0]],
                        },
                        {
                            label: "Genap",
                            backgroundColor: barColors1[1],
                            data: [yValues1[1], yValues1[1], yValues1[1]],
                        },
                        {
                            label: "Antara",
                            backgroundColor: barColors1[2],
                            data: [yValues1[2], yValues1[2], yValues1[2]],
                        },
                        // Repeat the same for other countries and categories...
                    ],

                },
                options: {
                    indexAxis: 'y',
                    scales: {
                        x: {
                            beginAtZero: true,
                            max: 400, // Sesuaikan dengan kebutuhan lo
                            stepSize: 10,
                        },
                    },
                    legend: {
                        display: true
                    },
                    title: {
                        display: true,
                        text: "World Wine Production 2018",
                    },
                },
            });
        </script>

    @endsection
