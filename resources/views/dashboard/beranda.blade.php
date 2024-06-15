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
                <p style="font-weight:600; font-size:24px">{{ $statusServer }} <span style="text-transform: capitalize; font-weight:400"> | Jaringan {{ $location }}
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
                            {{ $lastServerStatus->checked_at }}
                        </p>
                    </div>
                </div>

            </div>
        </div>

        @yield('card')
    </div>

    <div class="container-fluid d-flex mt-3 gap-3 justify-content-between">
        <div style="width: 100%; ">
            <div class="rounded shadow" style="max-height: 400px; overflow-y: auto; border: 2px solid var(--secondary); padding: 10px; background-color: var(--primary);">
                <div class="header-suspend">
                    <h1>Status Suspend</h1>
                </div>
                <table class="table" style="width:100%;">
                    <thead>
                        <tr style="text-align: center;">
                            <th scope="col">Nama Pengguna</th>
                            <th scope="col">Nama Lengkap</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $page = request()->query('page', 1);
                        $perPage = 5;
                        $startIndex = ($page - 1) * $perPage;
                        $endIndex = min($startIndex + $perPage, count($suspendedUsers));
                        @endphp
                        @for ($i = $startIndex; $i < $endIndex; $i++) <tr>
                            <td>{{ $suspendedUsers[$i]['username'] }}</td>
                            <td>{{ $suspendedUsers[$i]['fullname'] }}</td>
                            </tr>
                            @endfor
                    </tbody>
                </table>
                <div class="mt-3 d-flex justify-content-end">
                    @if ($page > 1)
                    <a href="{{ route('beranda', ['page' => $page - 1]) }}" class="btn me-2 shadow-sm" style="background-color:var(--secondary-green); color: var(--primary);">Previous</a>
                    @endif
                    @if ($endIndex < count($suspendedUsers)) <a href="{{ route('beranda', ['page' => $page + 1]) }}" class="btn shadow-sm" style="background-color:var(--secondary-green); color: var(--primary);">Next</a>
                        @endif
                </div>
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
            <div class="content-3" id="content-3-click">
                <div class="c5-header">Integrasi Dengan Spada</div>
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
        </div>
    </div>

        <div class="table-wrapper-spada hidden-table" id="table-spada-hidden">
            <h4 style="text-align: center; color: var(--primary-green); ">Rekap Spada</h4>
            <table id="table-rekap-spada">
                <thead class="thead-dark thead-spada">
                    <tr>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Jumlah Hari Ditemukan</th>
                        <th>Jumlah Hari Tidak Ditemukan</th>
                        <th>Tanggal Pengecekan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $latestSummary->tahun }}</td>
                        <td>{{ $latestSummary->bulan }}</td>
                        <td>{{ $latestSummary->hari_ditemukan }}</td>
                        <td>{{ $latestSummary->hari_tidak_ditemukan }}</td>
                        <td>{{ $latestSummary->created_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const card = document.getElementById('content-3-click');
            const table = document.getElementById('table-spada-hidden');

            card.addEventListener('click', () => {
                if (table.classList.contains('hidden-table')) {
                    table.classList.remove('hidden-table');
                } else {
                    table.classList.add('hidden-table');
                }
            });
        });
    </script>



    <!-- <div class="info-header">
                                                                                    <h1>Informasi Mata Kuliah</h1>
                                                                                </div> -->

    <div class="main-container-sort">
        <div class="content-container-sort">
            <form id="hitung-form" action="{{ route('beranda') }}" method="GET" onsubmit="return validateForm()">
                <div style="height: fit-content;">
                    <label for="tahunajaran">Tahun Ajaran:</label>
                    <select name="tahunajaran" id="tahunajaran">
                        <option value="">Pilih Tahun Ajaran</option>
                        <option value="2023/2024-Ganjil">2023/2024 Ganjil</option>
                        <option value="2023/2024-Genap">2023/2024 Genap</option>
                    </select>
                </div>
                <div style="height: fit-content;">
                    <label for="prodi">Prodi:</label>
                    <select name="prodi" id="prodi">
                        <option value="">Pilih Prodi</option>
                        <option value="Teknik Informatika">TI</option>
                        <option value="Perpustakaan dan Sains Informasi">Perpus</option>
                        <option value="Manajemen">Manajemen</option>
                        <option value="Akuntasi">Akuntasi</option>
                        <option value="Hukum">Hukum</option>
                        <option value="Psikolog">Psikolog</option>
                    </select>
                </div>
                <button type="submit">Hitung</button>
            </form>
        </div>
    </div>

    {{-- js untuk stay pilihan sortir --}}
    <script>
        document.querySelector('#hitung-form').addEventListener('submit', function() {
            const tahunAjaran = document.querySelector('#tahunajaran').value;
            const prodi = document.querySelector('#prodi').value;

            localStorage.setItem('tahunajaran', tahunAjaran);
            localStorage.setItem('prodi', prodi);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const savedTahunAjaran = localStorage.getItem('tahunajaran');
            const savedProdi = localStorage.getItem('prodi');

            if (savedTahunAjaran) {
                document.querySelector('#tahunajaran').value = savedTahunAjaran;
            }

            if (savedProdi) {
                document.querySelector('#prodi').value = savedProdi;
            }
        });
    </script>
    <!-- Information container -->
    <div class="info-container">
        <section>
            <div class="content-1">
                <div  class="c1-header">Jumlah mata kuliah</div>
                <div class="c1-content">
                    <!-- Menampilkan pesan jika tidak ada hasil perhitungan -->
                    @if (isset($output))
                    <p id="outputMatkul">{{ $output }}</p>
                    @endif
                </div>
            </div>
            <div class="content-1">
                <div class="c1-header">Jumlah halaman LAYAR</div>
                <div class="c1-content">
                    @if (isset($output))
                    <p>{{ $output }}</p>
                    @endif
                </div>
            </div>
            <div class="content-1">
                <div class="c1-header">Jumlah halaman Mata Kuliah Yang Lengkap</div>
                <div class="c1-content">
                    <p id="totalMatkulLengkap">{{ $totalCoursesWithAllCriteria }}</p>
                </div>
            </div>
            <div class="content-1">
                <div class="c1-header">Total kuis</div>
                <div class="c1-content">
                    <p id="totalkuis">{{ $totalQuiz }}</p>
                </div>
            </div>
            <div class="content-1" id="content-1-click">
                <div class="c1-header">Mata Kuliah Lengkap Secara Administrasi</div>
                <div class="c1-content">
                    <p id="totaladmin">{{ $totalCourses }}</p>
                </div>
            </div>


            <!-- <div class="content-3">
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
                                                                    </div> -->

        </section>

        <div style="width: 100%;" class="hidden-table" id="table-admin">
            <div class="rounded shadow" style="max-height: 400px; overflow-y: auto; border: 2px solid var(--secondary); padding: 10px; background-color: var(--primary);">
                <div class="header-suspend">
                    <h1>Mata Kuliah Lengkap Administrasi</h1>
                </div>
                <table class="table" style="width:100%;">
                    <thead>
                        <tr style="text-align: left;">
                            <th scope="col">Nama Mata Kuliah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ implode(', ', $courseNames) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        {{-- js untuk hidden table administrasi  --}}
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const card = document.getElementById('content-1-click');
                const table = document.getElementById('table-admin');

                card.addEventListener('click', () => {
                    if (table.classList.contains('hidden-table')) {
                        table.classList.remove('hidden-table');
                    } else {
                        table.classList.add('hidden-table');
                    }
                });
            });
        </script>

        <section style="display: flex;">
            <div class="content-8" id="container">
                <div class="c1-header">Statistik Tren Aktivitas</div>

                <div class="c8-content">
                    <div style="width: 100%; height: 285px; display:flex; align-items:center; justify-content:center">
                        <canvas id="myChart"></canvas>
                    </div>
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
</div>



<!-- Bootstrap JS (untuk fitur tertentu yang menggunakan JavaScript) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

@if (isset($logContent))
<script>
    // Pass PHP data to JavaScript
    var logContent = json_encode($logContent);

    document.addEventListener('DOMContentLoaded', function() {
        var tableBody = document.getElementById('table-body');

        var data = {
            "2024": [{
                    "label": "Kuis",
                    "value": logContent // Use logContent for Kuis value in 2024
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

        var yearSelector = document.getElementById('prodi');
        yearSelector.addEventListener('change', function() {
            var year = this.value;
            var selectedData = data[year];

            // Update table rows smoothly
            Array.from(tableBody.children).forEach((row, index) => {
                var td = row.querySelector('td');
                var value = selectedData[index].value;
                td.style.setProperty('--size', 'calc(' + value + ' / 100)');
                td.textContent = value;
            });
        });

        // Initial update for the default selected year (2024)
        var defaultYear = yearSelector.value;
        var selectedData = data[defaultYear];
        Array.from(tableBody.children).forEach((row, index) => {
            var td = row.querySelector('td');
            var value = selectedData[index].value;
            td.style.setProperty('--size', 'calc(' + value + ' / 100)');
            td.textContent = value;
        });
    });
</script>
@endif


<script>
                // Ambil nilai $output dari elemen p dengan id outputValue
                var outputValue = document.getElementById('outputMatkul').textContent.trim();
                var totalMatkulLengkap = document.getElementById('totalMatkulLengkap').textContent.trim();
                var totalkuis = document.getElementById('totalkuis').textContent.trim();
                var totaladmin = document.getElementById('totaladmin').textContent.trim();
                
                // Parse nilai $output sebagai integer (jika perlu)
                // outputValue = parseInt(outputValue);

                // Data untuk chart
                const xValues = ["Kuis", "Latihan", "Praktikum","Refleksi","Ujian","Tugas",];
                const yValues = [totalkuis, outputValue, outputValue, totaladmin,totalMatkulLengkap , totalkuis];

                // Inisialisasi Chart.js
                new Chart("myChart", {
                    type: "line",
                    data: {
                        labels: xValues,
                        datasets: [{
                            fill: false,
                            lineTension: 0.1,
                            backgroundColor: "rgba(0,0,255,1.0)",
                            borderColor: "rgba(79, 111, 82, 0.2)",
                            pointBackgroundColor: "rgba(79, 111, 82, 1)",
                            data: yValues
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    min: 6,
                                    max: 16
                                }
                            }],
                        }
                    }
                });
            </script>



@endsection