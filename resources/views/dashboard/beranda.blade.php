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

<<<<<<< HEAD
        <div class="mock-atas">
            <!-- @if (!empty($lastLine))
    <div class="card">
                <div class="card-header">Status Terbaru</div>
                <div class="card-body">
                    <p>{{ $lastLine }}</p>
=======
<div class="mock-atas">
    <!-- @if (!empty($lastLine))
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
    @endif -->

    <?php
    // Memecah string menjadi array berdasarkan karakter "|"
    $data = explode('|', $lastLine);

    // Menghapus spasi di awal dan akhir setiap elemen array
    $time = trim($data[0]);
    $statusServer = trim($data[1]);
    $location = trim($data[2]);
    ?>

@if (!empty($lastLine))
        <div class="server-container">
            <div class="server-header">
                <h1>Status Server</h1>
            </div>
            <div class="server-body">
                <p style="font-weight:600; font-size:24px; text-transform:capitalize">{{ $statusServer }} | <span style="font-weight: 400;">{{ $location }} </span> </p>
                <p style="font-weight: 500;">{{ $time }}</p>
            </div>
        </div>
@else
    <div class="server-container">
        <div class="server-header">
            <h1>Status Server</h1>
        </div>
        <div class="server-body">
            <p>Tidak ada data!</p>
        </div>
    </div>
@endif

    <div class="card-ssl">
        <div class="card-body-ssl">
            <div class="card-content-ssl">
                <div class="right-content-ssl">
                    <h1>SSL</h1>
                    <p>Masa tenggang <span>{{ $daysUntilExpiration }}</span> hari lagi</p>
                    <p style="font-weight: 500;">{{ $lastServerStatus->checked_at }}</p>
>>>>>>> 3b4dfd0cffce426c18ecb8591d37577ac50368c7
                </div>
            </div>
@else
    <div class="card">
                <div class="card-header">Tidak Ada Data</div>
                <div class="card-body">
                    <p>Data status tidak tersedia saat ini.</p>
                </div>
            </div>
    @endif -->
            @if (!empty($lastLine))
                <?php
                // Memecah string menjadi array berdasarkan karakter "|"
                $data = explode('|', $lastLine);
                
                // Menghapus spasi di awal dan akhir setiap elemen array
                $time = trim($data[0]);
                $statusServer = trim($data[1]);
                $location = trim($data[2]);
                ?>
                <div class="server-container">
                    <div class="server-header">
                        <h1>Status Server</h1>
                    </div>
                    <div class="server-body">
                        <p style="font-weight:600; font-size:24px">{{ $statusServer }}</p>
                        <p>Anda sedang memakai jaringan <span
                                style="text-transform: capitalize; font-weight:600">{{ $location }}</span> YARSI</p>
                        <p>{{ $time }}</p>
                    </div>
                </div>
            @else
                <div class="server-container">
                    <div class="server-header">
                        <h1>Status Server</h1>
                    </div>
                    <div class="server-body">
                        <p>Tidak ada data!</p>
                    </div>
                </div>
            @endif




            <div class="card-ssl">
                <div class="card-body-ssl">
                    <div class="card-content-ssl">
                        <div class="right-content-ssl">
                            <h1>SSL</h1>
                            <p>Masa tenggang <span>{{ $daysUntilExpiration }}</span> hari lagi</p>
                            <p style="font-weight: 500;">{{ $lastServerStatus->checked_at }}</p>
                        </div>
                    </div>

                </div>
            </div>
            @yield('card')
        </div>


        <div class="mock-tengah">

            {{-- Jumlah mata kuliah --}}
            <div class="div4">
                <div class="head-matkul">
                    <h2><strong>Jumlah Mata Kuliah</strong> </h2>
                </div>
                <div class="body-matkul">
                    <div>
                        <canvas id="myChart"
                            style="width:400px; height: px; padding-top: 20px; margin-left:20px"></canvas>
                    </div>
                    <div style="margin-left: 50px; margin-top: 25px; width: 20px;">
                        <h3>Total: <strong id="total">3381</strong></h3>
                        <h3 style="margin-bottom: 20px;">Semester Berjalan: <strong id="semester">130</strong></h3>
                        <!-- <div class="garis-separator"></div> -->
                        <label for="jurusan">Filter:</label>
                        <select id="jurusan" name="jurusan" style="margin-bottom: 20px">
                            <option value="semua">Semua</option>
                            <option value="akuntansi">Akuntansi</option>
                            <option value="manajemen">Manajemen</option>
                            <option value="teknologi_informasi">Teknologi Informasi</option>
                            <option value="hukum">Hukum</option>
                            <option value="perpustakaan">Perpustakaan</option>
                            <option value="psikologi">Psikologi</option>
                        </select>
                    </div>
                </div>
            </div>
            {{-- Jumlah mata kuliah --}}


            <div class="mock-container-atas">

                <!-- Informasi Umum -->
                <div class="div5">
                    <div class="head-info" style="background-color: #009d63;">
                        <h2><strong>Informasi Umum</strong></h2>
                        <!-- <div class="garis-separator"></div> -->
                    </div>
                    <div class="body-info"
                        style="display: flex; flex-direction: column; width: 100%; align-items: center; justify-content: center; gap: 10px; padding-bottom: 25px; margin-top: 20px">
                        <h4>Versi : 3.10.223</h4>
                        <h4>Pemeliharaan: Tidak Aktif</h4>
                        <h4>Tahun Ajaran: 2023/2024</h4>
                        <h4>Semester : Genap</h4>
                    </div>
                </div>
                <!-- Informasi Umum -->


                {{-- integrasi dengan S --}}
                <div class="div6">
                    <div class="head-info">
                        <h2><strong>Integrasi dengan SPADA</strong></h2>
                        <!-- <div class="garis-separator"></div> -->
                    </div>
                    <div class="body-info"
                        style="display: flex; flex-direction: column; align-items: center; justify-content: space-around; height: 50%;">
                        @if ($spadaResult)
                            <h3 style="margin: 20px; text-align: center;">Data universitas {{ $spadaResult->universitas }}
                                ditemukan dalam SPADA</h3>
                        @else
                            <h3 style="margin: 20px; text-align: center;">Data universitas tidak ditemukan dalam SPADA</h3>
                        @endif
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
                <div class="head-info">
                    <h2><strong>Statistik (Rata-Rata)</strong></h2>
                    <!-- <div class="garis-separator"></div> -->
                </div>
                <div class="body-info"
                    style="display: flex; flex-direction: column; width: 100%; align-items: center; gap: 10px; padding-bottom: 25px;">
                    <h4>Sumber Belajar: 3</h4>
                    <h4>Aktivitas Belajar: 13</h4>
                    <h4>Tautan Ekesternal: 2</h4>
                    <h4>Ujian: 0.1</h4>
                    <label for="jurusan">Pilih Jurusan:</label>
                    <select id="jurusan" name="jurusan">
                        <option value="akuntansi">Semua</option>
                        <option value="akuntansi">Akuntansi</option>
                        <option value="manajemen">Manajemen</option>
                        <option value="teknologi_informasi">Teknologi Informasi</option>
                        <option value="hukum">Hukum</option>
                        <option value="perpustakaan">Perpustakaan</option>
                        <option value="psikologi">Psikologi</option>
                    </select>

                </div>

            </div>
            <!-- Statistik -->

            {{-- aktivitas terbanyak --}}
            <div class="div8">
                <div class="head-info">
                    <h2><strong>Aktivitas Terbanyak Semester Berjalan</strong></h2>
                    <!-- <div class="garis-separator"></div> -->
                </div>
                <div class="body-info"
                    style="display: flex; flex-direction: column; width: 100%; align-items: center; gap: 10px; padding-bottom: 25px;">
                    <ol style="font-weight: 600;">
                        <li style="margin-bottom: 10px;">Mata Kuliah A</li>
                        <li style="margin-bottom: 10px;">Mata Kuliah C</li>
                        <li style="margin-bottom: 10px;">Mata Kuliah B</li>
                        <li style="margin-bottom: 10px;">Mata Kuliah D</li>
                        {{-- <li style="margin-bottom: 10px;">Mata Kuliah E</li> --}}
                    </ol>
                    <label for="jurusan">Pilih Jurusan:</label>
                    <select id="jurusan" name="jurusan">
                        <option value="akuntansi">Semua</option>
                        <option value="akuntansi">Akuntansi</option>
                        <option value="manajemen">Manajemen</option>
                        <option value="teknologi_informasi">Teknologi Informasi</option>
                        <option value="hukum">Hukum</option>
                        <option value="perpustakaan">Perpustakaan</option>
                        <option value="psikologi">Psikologi</option>
                    </select>
                </div>
            </div>
            {{-- aktivitas terbanyak --}}

            {{-- lengkap administratif --}}
            <div class="div9">
                <div class="head-info">
                    <h2><strong>Lengkap Administratif Semester Berjalan</strong></h2>
                    <!-- <div class="garis-separator"></div> -->
                </div>
                <div class="body-info"
                    style="display: flex; flex-direction: column; width: 100%; align-items: center; gap: 10px; padding-bottom: 25px;">
                    <h4>Akutansi : 0</h4>
                    <h4>Manajemen : 8</h4>
                    <h4>Psikologi : 6</h4>
                    <h4>Teknik Informatika : 10</h4>
                </div>
            </div>
        </div>
        {{-- lengkap administratif --}}

        <div class="chart-container"
            style="width: 100%; height: auto; display:flex; justify-content:space-between; gap:10px">
            <div class="chart-tengah-bar">
                <div class="head-info">
                    <h2><strong>Dosen Pengampu Terbanyak</strong></h2>
                    <!-- <div class="garis-separator"></div> -->
                </div>
                <div class="body-info"
                    style="display: flex; flex-direction: column; width: 100%; align-items: center; gap: px; padding-bottom: 25px; text-align:center;">
                    <h4><strong>Dosen A</strong> <br><span>Jumlah mata kuliah: <strong>25</strong></span></h4>
                    <a href="#">lihat</a>
                    <h4><strong>Dosen B</strong> <br><span>Jumlah mata kuliah: <strong>10</strong></span></h4>
                    <a href="#">lihat</a>
                    <h4><strong>Dosen C</strong> <br><span>Jumlah mata kuliah: <strong>5</strong></span></h4>
                    <a href="#">lihat</a>
                </div>
            </div>
            <div class="chart-tengah-donat">
                <div class="chart-tengah-donat-isi">
                    <h2>Pengguna</h2>
                    <div>
                        <label for="jurusan" style="font-weight: 600;">Jurusan:</label>
                        <select id="jurusan" name="jurusan">
                            <option value="akuntansi">Semua</option>
                            <option value="akuntansi">Akuntansi</option>
                            <option value="manajemen">Manajemen</option>
                            <option value="teknologi_informasi">Teknologi Informasi</option>
                            <option value="hukum">Hukum</option>
                            <option value="perpustakaan">Perpustakaan</option>
                            <option value="psikologi">Psikologi</option>
                        </select>
                    </div>
                    <canvas id="myChart2" width="100%" height="auto"></canvas>
                </div>
                <div class="chart-tengah-donat-isi">
                    <h2>Status Mata Kuliah</h2>
                    <div>
                        <label for="jurusan" style="font-weight: 600;">Jurusan:</label>
                        <select id="jurusan" name="jurusan">
                            <option value="akuntansi">Semua</option>
                            <option value="akuntansi">Akuntansi</option>
                            <option value="manajemen">Manajemen</option>
                            <option value="teknologi_informasi">Teknologi Informasi</option>
                            <option value="hukum">Hukum</option>
                            <option value="perpustakaan">Perpustakaan</option>
                            <option value="psikologi">Psikologi</option>
                        </select>
                    </div>
                    <canvas id="myChart3" width="50%" height="auto"></canvas>
                </div>
            </div>
        </div>

        <!-- Information container -->
        <div class="info-container">
            <div class="info-header">
                <h1>Informasi Mata Kuliah</h1>
            </div>
            <div class="info-content">
                <div class="content-container">
                    <div class="content-header">
                        <h2>Mata Kuliah Saat Ini</h2>
                    </div>
                    <div class="content">
                        <h1>113/129</h1>
                    </div>
                </div>
                <div class="content-container">
                    <div class="content-header">
                        <h2>Update Layar</h2>
                    </div>
                    <div class="content">
                        <p>Tidak ada perubahan baru</p>
                        <p>Terakhir diperbarui:</p>
                        <p style="font-weight:700">{{ $lastServerStatus->checked_at }}</p>
                    </div>
                </div>
                <div class="content-container">
                    <div class="content-header">
                        <h2>Penyelesaian Course</h2>
                    </div>
                    <div class="content">
                        <h1>21%</h1>
                    </div>
                </div>
                <div class="content-container">
                    <div class="content-header">
                        <h2>Akses Terbanyak</h2>
                    </div>
                    <div class="content">
                        <p>Mata kuliah A</p>
                        <p>Mata kuliah A</p>
                        <p>Mata kuliah A</p>
                        <p>Mata kuliah A</p>
                    </div>
                </div>
            </div>
        </div>

<<<<<<< HEAD
        

        <!-- Bootstrap JS (untuk fitur tertentu yang menggunakan JavaScript) -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
=======
<!-- Bootstrap JS (untuk fitur tertentu yang menggunakan JavaScript) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
>>>>>>> 3b4dfd0cffce426c18ecb8591d37577ac50368c7

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Mendapatkan elemen dropdown
                var dropdown = document.getElementById("jurusan");

                // Menambahkan event listener untuk menangani perubahan dropdown
                dropdown.addEventListener("change", function() {
                    // Mendapatkan nilai yang dipilih dari dropdown
                    var selectedValue = dropdown.value;

                    // Mendapatkan elemen Total dan Semester Berjalan
                    var totalElement = document.getElementById("total");
                    var semesterElement = document.getElementById("semester");

                    // Periksa nilai yang dipilih dari dropdown
                    if (selectedValue === "akuntansi") {
                        // Jika dipilih "akuntansi", ubah nilai Total dan Semester Berjalan
                        totalElement.textContent = "293";
                        semesterElement.textContent = "86";
                    } else if (selectedValue === "manajemen") {
                        totalElement.textContent = "241";
                        semesterElement.textContent = "54";
                    } else if (selectedValue === "teknologi_informasi") {
                        totalElement.textContent = "132";
                        semesterElement.textContent = "78";
                    } else if (selectedValue === "hukum") {
                        totalElement.textContent = "167";
                        semesterElement.textContent = "73";
                    } else if (selectedValue === "perpustakaan") {
                        totalElement.textContent = "212";
                        semesterElement.textContent = "55";
                    } else if (selectedValue === "psikologi") {
                        totalElement.textContent = "151";
                        semesterElement.textContent = "89";
                    } else {
                        // Jika dipilih opsi lain, kembalikan nilai Total dan Semester Berjalan ke nilai awal
                        totalElement.textContent = "3381";
                        semesterElement.textContent = "130";
                    }


                });
            });
        </script>

        <script>
            const ctx = document.getElementById('myChart2');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Online', 'Aktif', 'Suspend'],
                    datasets: [{
                        label: 'Pengguna',
                        data: [30, 200, 47],
                        borderWidth: 1
                    }]
                },
            });
            const ctx3 = document.getElementById('myChart3');
            new Chart(ctx3, {
                type: 'doughnut',
                data: {
                    labels: ['Online', 'Aktif', 'Suspend'],
                    datasets: [{
                        label: 'Pengguna',
                        data: [30, 200, 47],
                        borderWidth: 1
                    }]
                },
            });
        </script>



        <script>
            var yValues1 = [200, 180, 178]; //punya ganjil
            var yValues2 = [323, 146, 232]; //punya genap
            var yValues3 = [126, 251, 231]; //punya antara
            var barColors1 = ["red", "green", "blue", "orange", "brown"];
            var barColors2 = ["lightcoral", "lightgreen", "lightblue", "lightsalmon", "sandybrown"];
            var barColors3 = ["salmon", "limegreen", "deepskyblue", "darkorange", "peru"];

            new Chart("myChart", {
                type: "bar",
                data: {
                    labels: ["2021/2022", "2022/2023", "2023/2024"],
                    datasets: [{
                            label: "Ganjil",
                            backgroundColor: barColors1[0],
                            data: [yValues1[0], yValues1[1], yValues1[2]],
                        },
                        {
                            label: "Genap",
                            backgroundColor: barColors1[1],
                            data: [yValues2[0], yValues2[1], yValues2[2]],
                        },
                        {
                            label: "Antara",
                            backgroundColor: barColors1[2],
                            data: [yValues3[0], yValues3[1], yValues3[2]],
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

            document.addEventListener("DOMContentLoaded", function() {
                // Mendapatkan elemen dropdown
                var dropdown = document.getElementById("jurusan");

                // Menambahkan event listener untuk menangani perubahan dropdown
                dropdown.addEventListener("change", function() {
                    // Mendapatkan nilai yang dipilih dari dropdown
                    var selectedValue = dropdown.value;

                    // Periksa nilai yang dipilih dan perbarui data chart sesuai
                    if (selectedValue === "akuntansi") {
                        // Jika dipilih "Akuntansi", perbarui data chart
                        updateChartForAkuntansi();
                    } else if (selectedValue === "manajemen") {
                        updateChartForManajemen();
                    } else if (selectedValue === "teknologi_informasi") {
                        updateChartForTeknologi();
                    } else if (selectedValue === "hukum") {
                        updateChartForHukum();
                    } else if (selectedValue === "perpustakaan") {
                        updateChartForPerpustakaan();
                    } else if (selectedValue === "psikologi") {
                        updateChartForPsikologi();
                    } else {
                        // Jika dipilih opsi lain, kembalikan data chart ke nilai awal
                        restoreDefaultChart();
                    }
                });
            });

            // Fungsi untuk memperbarui data chart untuk "Akuntansi"
            function updateChartForAkuntansi() {
                var newValues1 = [193, 136, 221];
                var newValues2 = [278, 124, 168];
                var newValues3 = [232, 158, 295];
                var chart = Chart.getChart("myChart");
                chart.data.datasets[0].data = newValues1;
                chart.data.datasets[1].data = newValues2;
                chart.data.datasets[2].data = newValues3;
                chart.update();
            }

            function updateChartForManajemen() {
                var newValues1 = [157, 271, 203];
                var newValues2 = [188, 126, 212];
                var newValues3 = [297, 134, 169];
                var chart = Chart.getChart("myChart");
                chart.data.datasets[0].data = newValues1;
                chart.data.datasets[1].data = newValues2;
                chart.data.datasets[2].data = newValues3;
                chart.update();
            }

            function updateChartForTeknologi() {
                var newValues1 = [239, 185, 123];
                var newValues2 = [173, 248, 287];
                var newValues3 = [265, 153, 212];
                var chart = Chart.getChart("myChart");
                chart.data.datasets[0].data = newValues1;
                chart.data.datasets[1].data = newValues2;
                chart.data.datasets[2].data = newValues3;
                chart.update();
            }

            function updateChartForHukum() {
                var newValues1 = [178, 249, 212];
                var newValues2 = [197, 268, 137];
                var newValues3 = [298, 142, 205];
                var chart = Chart.getChart("myChart");
                chart.data.datasets[0].data = newValues1;
                chart.data.datasets[1].data = newValues2;
                chart.data.datasets[2].data = newValues3;
                chart.update();
            }

            function updateChartForPerpustakaan() {
                var newValues1 = [123, 276, 141];
                var newValues2 = [235, 171, 199];
                var newValues3 = [281, 144, 288];
                var chart = Chart.getChart("myChart");
                chart.data.datasets[0].data = newValues1;
                chart.data.datasets[1].data = newValues2;
                chart.data.datasets[2].data = newValues3;
                chart.update();
            }

            function updateChartForPsikologi() {
                var newValues1 = [216, 145, 193];
                var newValues2 = [135, 286, 152];
                var newValues3 = [271, 124, 231];
                var chart = Chart.getChart("myChart");
                chart.data.datasets[0].data = newValues1;
                chart.data.datasets[1].data = newValues2;
                chart.data.datasets[2].data = newValues3;
                chart.update();
            }


            // Fungsi untuk mengembalikan data chart ke nilai awal
            function restoreDefaultChart() {
                var defaultValues1 = [200, 180, 178, 124, 150];
                var defaultValues2 = [323, 146, 232, 234, 141];
                var defaultValues3 = [126, 251, 231, 127, 156];
                var chart = Chart.getChart("myChart");
                chart.data.datasets[0].data = defaultValues1;
                chart.data.datasets[1].data = defaultValues2;
                chart.data.datasets[2].data = defaultValues3;
                chart.update();
            }
        </script>
    @endsection
