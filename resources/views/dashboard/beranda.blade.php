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
                        <p style="font-weight:600; font-size:24px">{{ $statusServer }} <span
                                style="text-transform: capitalize; font-weight:400"> | Jaringan {{ $location }}
                                YARSI</span></p>
                        <!-- <p>Anda sedang memakai jaringan <span style="text-transform: capitalize; font-weight:600">{{ $location }}</span> YARSI</p> -->
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
                            <p>Masa tenggang <span>{{ $daysUntilExpiration }}</span> hari lagi <br>
                                {{ $lastServerStatus->checked_at }}</p>
                        </div>
                    </div>

                </div>
            </div>

            @yield('card')
        </div>

        <div class="info-header">
            <h1>Informasi Mata Kuliah</h1>
        </div>

        <div class="main-container-sort">
            <div class="content-container-sort">
                <div class="left-container-sort">
                    <label for="jurusan" style="font-weight: 600; font-size: 16px;">Tahun Ajaran</label>
                    <select id="jurusan" name="jurusan">
                        <option value="akuntansi">Semua</option>
                        <option value="akuntansi">Genap 2023/2024</option>
                        <option value="perpustakaan">Ganjil 2023/2024</option>
                        <option value="manajemen">Genap 2022/2023</option>
                        <option value="hukum">Ganjil 2022/2023</option>
                        <option value="teknologi_informasi">Genap 2021/2022</option>
                        <option value="psikologi">Ganjil 2021/2022</option>
                        <!-- <option value="hukum">Hukum</option>
                                        <option value="perpustakaan">Perpustakaan</option>
                                        <option value="psikologi">Psikologi</option> -->
                    </select>
                </div>
                <div class="right-container-sort">
                    <label for="jurusan" style="font-weight: 600; font-size: 16px;">Prodi:</label>
                    <form id="hitung-form" action="{{ route('beranda') }}">
                        <select name="kategori" id="kategori" onchange="submitForm()">
                            <option value="">Pilih Kategori</option>
                            <option value="16">PRODI TI</option>
                            <option value="40">PRODI Perpus</option>
                            <option value="37">PRODI PSI</option>
                            <option value="402">PRODI KEDOKTERAN</option>
                            <option value="180">PRODI KEDOKTERAN GIGI</option>
                            <option value="34">PRODI HUKUM</option>
                            <option value="187">PRODI MANAJEMEN</option>
                            <option value="130">PRODI AKUNTASI</option>
                        </select>
                </div>
            </div>
            <div class="button-sort">
                <button>Submit</button>
            </div>
        </div>
        <!-- Information container -->
        <div class="info-container">
            <section>
                <div class="content-1">
                    <div class="c1-header">Jumlah mata kuliah</div>
                    <div class="c1-content">
                        <!-- Menampilkan pesan jika tidak ada hasil perhitungan -->
                        @isset($output)
                            <p>{{ $output }}</p>
                        @endisset
                    </div>
                </div>
                <div class="content-1">
                    <div class="c1-header">Jumlah dosen terdaftar</div>
                    <div class="c1-content">
                        <p>64</p>
                    </div>
                </div>
                <div class="content-1">
                    <div class="c1-header">Jumlah mahasiswa aktif</div>
                    <div class="c1-content">
                        <p>802</p>
                    </div>
                </div>
                <div class="content-3">
                    <div class="c1-header">Integrasi dengan spada</div>
                    <div class="c3-content">
                        @if ($spadaResult)
                            <h4><strong>Data {{ $spadaResult->universitas }}
                                    {{ $spadaResult->status === 'Ditemukan' ? 'ditemukan' : 'tidak ditemukan' }} dalam
                                    SPADA</strong></h4>
                        @else
                            <h4><strong>Data universitas tidak ditemukan dalam SPADA</strong></h4>
                        @endif

                        <p>{{ $time }}</p>
                    </div>
                </div>

            </section>
            <section style="display: flex;">
                <div class="content-4">
                    <div class="c1-header">Mata kuliah terdaftar</div>
                    <div>
                        <canvas id="myChart"
                            style="width:400px; height: px; padding-top: 20px; margin-left:20px"></canvas>
                    </div>
                    <div class="c4-chart-ket">
                        <p>Total: <strong id="total">3381</strong></p>
                        <p>Semester Berjalan: <strong id="semester">130</strong></p>
                        <!-- <div class="garis-separator"></div> -->
                        <!-- <label for="jurusan">Filter:</label>
                                        <select id="jurusan" name="jurusan" style="width: 20%;">
                                            <option value="semua">Semua</option>
                                            <option value="akuntansi">Akuntansi</option>
                                            <option value="manajemen">Manajemen</option>
                                            <option value="teknologi_informasi">Teknologi Informasi</option>
                                            <option value="hukum">Hukum</option>
                                            <option value="perpustakaan">Perpustakaan</option>
                                            <option value="psikologi">Psikologi</option>
                                        </select> -->
                    </div>
                </div>
                <div class="section-2-div">
                    <div class="content-5">
                        <div class="c5-header">Informasi Umum</div>
                        <div class="c5-content">
                            <div class="c5-content-div">
                                <h4>Versi: <br>3.10.223</h4>
                            </div>
                            <div class="c5-content-div">
                                <h4>Pemeliharaan: <br>Tidak Aktif</h4>
                            </div>
                            <div class="c5-content-div">
                                <h4>Tahun Ajaran: <br>2023/2024</h4>
                            </div>
                            <div class="c5-content-div">
                                <h4>Semester: <br>Genap</h4>
                            </div>
                        </div>
                    </div>
                    <div class="content-6">
                        <div class="c5-header">Role Anda Saat Ini</div>
                        <div class="c6-content">
                            <i>{{ session('users') }}</i>
                            <p>TIM DPJJ</p>
                        </div>
                    </div>
                </div>
        </div>
        </section>
        <section>
            <div class="content-7" id="container">
                <div class="c1-header">Aktivitas terbanyak</div>
                <div class="c7-content">
                    <div style="width: 100%; height: 285px;">
                        <canvas id="myLineChart"></canvas>
                    </div>

                    <label for="matkul-aktivitas">Mata Kuliah:</label>
                    <select name="matkul-aktivitas" id="matkul-aktivitas">
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
            <div class="content-8">
                <div class="c1-header">Statistik Tren Aktivitas</div>

                <div class="c8-content">
                    <table
                        class="charts-css column show-labels show-primary-axis show-4-secondary-axes show-data-axes data-spacing-5 hide-data">
                        <caption> 2024 </caption>
                        <thead>
                            <tr>
                                <th scope="col"> Year </th>
                                <th scope="col"> Value </th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <tr>
                                <th> Kuis </th>
                                <td style="--size: calc( 20 / 100 );"> 20 </td>
                            </tr>
                            <tr>
                                <th> Latihan </th>
                                <td style="--size: calc( 40 / 100 );"> 40 </td>
                            </tr>
                            <tr>
                                <th> Refleksi </th>
                                <td style="--size: calc( 60 / 100 );"> 60 </td>
                            </tr>
                            <tr>
                                <th> PPT </th>
                                <td style="--size: calc( 80 / 100 );"> 80 </td>
                            </tr>
                        </tbody>
                    </table>
                    <label for="tahun-tren">Tahun:</label>
                    <select name="tahun-tren" id="tahun-tren">
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                        <option value="2021">2021</option>
                    </select>
                    <label for="tahun-tren">Basis:</label>
                    <select name="tahun-tren" id="tahun-tren">
                        <option value="2024">Semua</option>
                        <option value="2023">SCL</option>
                        <option value="2022">Halaman LAYAR</option>
                    </select>
                </div>

            </div>


            <div class="content-9"></div>
            <!-- <div class="content-10">dasdasda</div> -->
        </section>
    </div>



    <!-- Bootstrap JS (untuk fitur tertentu yang menggunakan JavaScript) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

    <script>
        document.getElementById('tahun-tren').addEventListener('change', function() {
            var year = this.value;
            var tableBody = document.getElementById('table-body');

            var data = {
                "2024": [{
                        "label": "Kuis",
                        "value": 20
                    },
                    {
                        "label": "Latihan",
                        "value": 40
                    },
                    {
                        "label": "Refleksi",
                        "value": 60
                    },
                    {
                        "label": "PPT",
                        "value": 80
                    }
                ],
                "2023": [{
                        "label": "Kuis",
                        "value": 30
                    },
                    {
                        "label": "Latihan",
                        "value": 10
                    },
                    {
                        "label": "Refleksi",
                        "value": 90
                    },
                    {
                        "label": "PPT",
                        "value": 60
                    }
                ],
                "2022": [{
                        "label": "Kuis",
                        "value": 90
                    },
                    {
                        "label": "Latihan",
                        "value": 30
                    },
                    {
                        "label": "Refleksi",
                        "value": 70
                    },
                    {
                        "label": "PPT",
                        "value": 40
                    }
                ],
                "2021": [{
                        "label": "Kuis",
                        "value": 40
                    },
                    {
                        "label": "Latihan",
                        "value": 50
                    },
                    {
                        "label": "Refleksi",
                        "value": 20
                    },
                    {
                        "label": "PPT",
                        "value": 90
                    }
                ]
            };

            var selectedData = data[year];

            // Update table rows smoothly
            Array.from(tableBody.children).forEach((row, index) => {
                var td = row.querySelector('td');
                var value = selectedData[index].value;
                td.style.setProperty('--size', 'calc(' + value + ' / 100)');
                td.textContent = value;
            });
        });
    </script>

    <script>
        var ctx = document.getElementById('myLineChart').getContext('2d');
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Jumlah',
                    data: [],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: false,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // Data untuk setiap mata kuliah
        const dataMap = {
            'semua': {
                labels: ['Akuntansi', 'Manajemen', 'Ti', 'Hukum', 'Psikologi', 'perpustakaan'],
                data: [84, 23, 59, 25, 74, 32]
            },
            'akuntansi': {
                labels: ['f', 'g', 'h', 'i', 'j'],
                data: [23, 45, 67, 89, 12]
            },
            'manajemen': {
                labels: ['a', 'b', 'c', 'd', 'e'],
                data: [34, 56, 78, 90, 23]
            },
            'teknologi_informasi': {
                labels: ['DDP', 'RDP', 'PDT', 'AdJar', 'SDA'],
                data: [120, 147, 56, 23, 89]
            },
            'hukum': {
                labels: ['k', 'l', 'm', 'n', 'o'],
                data: [45, 67, 89, 12, 34]
            },
            'psikologi': {
                labels: ['p', 'q', 'r', 's', 't'],
                data: [67, 89, 12, 34, 56]
            },
            'perpustakaan': {
                labels: [],
                data: []
            }
        };

        document.getElementById('matkul-aktivitas').addEventListener('change', function() {
            var selectedValue = this.value;
            var selectedData = dataMap[selectedValue];

            myLineChart.data.labels = selectedData.labels;
            myLineChart.data.datasets[0].data = selectedData.data;
            myLineChart.update();
        });
    </script>

    <script>
        function submitForm() {
            document.getElementById("hitung-form").submit();
        }
    </script>


@endsection
