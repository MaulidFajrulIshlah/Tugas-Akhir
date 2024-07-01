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
                <button type="submit">Submit</button>
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
                <div class="c1-header">Jumlah mata kuliah</div>
                <div class="c1-content">
                    <!-- Menampilkan pesan jika tidak ada hasil perhitungan -->
                    @if (isset($output))
                    <p id="outputMatkul">{{ $output }}</p>
                    @endif
                </div>
            </div>
            <div class="content-1">
                <div class="c1-header">Halaman Mata Kuliah Lengkap</div>
                <div class="c1-content">
                    <p id="totalMatkulLengkap">{{ $totalCoursesWithAllCriteria }}</p>
                </div>
            </div>
            <!-- <div class="content-1">
                    <div class="c1-header">Total kuis</div>
                    <div class="c1-content">
                        <p id="totalkuis">{{ $totalKuisAutoGrading }}</p>
                    </div>
                </div> -->
            <div class="content-1">
                <div class="c1-header">Jumlah halaman LAYAR</div>
                <div class="c1-content">
                    @if (isset($output))
                    <p>{{ $output }}</p>
                    @endif
                </div>
            </div>
            <div class="content-1" id="content-1-click">
                <div class="c1-header">Mata Kuliah Lengkap Administrasi</div>
                <div class="c1-content">
                    <p id="totaladmin">{{ $totalCourses }}</p>
                </div>
            </div>

            <div class="content-1">
                <div class="c1-header">Halaman LAYAR berbasis SCL</div>
                <div class="c1-content">
                    <p>{{ $totalCoursesWithAllCriteriaSCL }}</p>
                </div>
            </div>


        </section>

        <div id="overlay-loader" style="display: none;">
            <div id="loader"></div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Event listener untuk semua link atau tombol yang menyebabkan page refresh
                $('a, button').on('click', function(e) {
                    // Cek apakah ini tombol submit dari form kita
                    if ($(this).closest('form').attr('id') === 'hitung-form') {
                        // Cek validasi form sebelum nampilin loader
                        if (!validateForm()) {
                            e.preventDefault();
                            return false;
                        }
                    }
                    // Nampilin overlay loader
                    $('#overlay-loader').show();
                });

                // Event listener saat page mulai unload
                $(window).on('beforeunload', function() {
                    // Nampilin overlay loader
                    $('#overlay-loader').show();
                    // Simpan posisi scroll saat ini
                    localStorage.setItem('scrollPosition', $(window).scrollTop());
                });

                // Event listener saat page selesai load
                $(window).on('load', function() {
                    // Ngilangin overlay loader
                    $('#overlay-loader').hide();
                    // Balikin posisi scroll sebelumnya
                    var scrollPosition = localStorage.getItem('scrollPosition');
                    if (scrollPosition) {
                        $(window).scrollTop(scrollPosition);
                        localStorage.removeItem(
                            'scrollPosition'); // Hapus posisi scroll dari localStorage setelah dipake
                    }
                });
            });

            function validateForm() {
                var tahunajaran = document.getElementById("tahunajaran").value;
                var prodi = document.getElementById("prodi").value;

                if (tahunajaran === "" || prodi === "") {
                    alert("Mohon pilih Tahun Ajaran dan Prodi.");
                    return false;
                }
                return true;
            }
        </script>


        <div class="table-wrapper-spada hidden-table" id="table-admin">
            <h4 style="text-align: center; color: var(--primary-green); ">Mata Kuliah Lengkap Secara Administrasi</h4>
            <table id="table-rekap-spada">
                <thead class="thead-dark thead-spada">
                    <tr>
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
                <div class="charts-header">Statistik Tren Mata Kuliah</div>

                <div class="c8-content">
                    <div style="width: 100%; height: 285px; display:flex; align-items:center; justify-content:center">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="content-8 content-8-click button-hidden-chart" id="container">
                <div class="charts-header">Statistik Tren Aktivitas</div>

                <div class="c8-content">
                    <div style="width: 100%; height: 285px; display:flex; align-items:center; justify-content:center">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>

            </div>

        </section>

        <div class="table-chart-aktivitas">
            <div class="table-wrapper-aktivitas hidden-table" id="table-chart">
                <h4 style="text-align: center; color: var(--primary-green); ">Tabel Rekap Aktivitas</h4>
                <table id="table-rekap-aktivitas">
                    <thead class="thead-dark thead-aktivitas">
                        <tr>
                            <th>Aktivitas</th>
                            <th>Otomatis</th>
                            <th>Manual</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tugas</td>
                            <td id="tugasauto">{{ $totalTugasAutoGrading }}</td>
                            <td id="tugasmanual">{{ $totalTugasManualGrading }}</td>
                            <td>{{ $totalTugasManualGrading + $totalTugasAutoGrading }}</td>
                        </tr>
                        <tr>
                            <td>Latihan</td>
                            <td id="latihanauto">{{ $totalLatihanAutoGrading }}</td>
                            <td id="latihanmanual">{{ $totalLatihanManual }}</td>
                            <td>{{ $totalLatihanManual + $totalLatihanAutoGrading }}</td>
                        </tr>
                        <tr>
                            <td>Praktikum</td>
                            <td id="praktikumauto">{{ $totalPraktikumAutoGrading }}</td>
                            <td id="praktikummanual">{{ $totalPraktikumManualGrading }}</td>
                            <td>{{ $totalPraktikumAutoGrading + $totalPraktikumManualGrading }}</td>
                        </tr>
                        <tr>
                            <td>Ujian</td>
                            <td id="ujianauto">{{ $totalUjianAutoGrading }}</td>
                            <td id="ujianmanual">{{ $totalUjianManualGrading }}</td>
                            <td>{{ $totalUjianAutoGrading + $totalUjianManualGrading }}</td>
                        </tr>
                        <tr>
                            <td>Kuis</td>
                            <td>-</td>
                            <td>-</td>
                            <td id="totalkuis">{{ $totalKuisAutoGrading }}</td>
                        </tr>
                        <tr>
                            <td>Visi Misi</td>
                            <td>-</td>
                            <td>-</td>
                            <td id="totalvisimisi">{{ $totalVisiMisi }}</td>
                        </tr>
                        <tr>
                            <td>Kontrak Kuliah</td>
                            <td>-</td>
                            <td>-</td>
                            <td id="totalkontrak">{{ $totalKontrakKuliah }}</td>
                        </tr>
                        <tr>
                            <td>RPS</td>
                            <td>-</td>
                            <td>-</td>
                            <td id="totalrps">{{ $totalRPS }}</td>
                        </tr>
                        <tr>
                            <td>Refleksi</td>
                            <td>-</td>
                            <td>-</td>
                            <td id="totalrefleksi">{{ $totalRefleksi }}</td>
                        </tr>
                        <tr>
                            <td>Log Kerja</td>
                            <td>-</td>
                            <td>-</td>
                            <td id="totallog">{{ $totalLogKerja }}</td>
                        </tr>
                        <tr>
                            <td>Video Pembelajaran</td>
                            <td>-</td>
                            <td>-</td>
                            <td id="totalvideo">{{ $totalVideoPembelajaran }}</td>
                        </tr>
                        <tr>
                            <td>Kegiatan Belajar Eksternal</td>
                            <td>-</td>
                            <td>-</td>
                            <td id="totallink">{{ $totalKegiatanBelajarEksternal }}</td>
                        </tr>
                        <tr>
                            <td><strong>Total</strong></td>
                            <td><strong>{{ $totalTugasAutoGrading + $totalLatihanAutoGrading + $totalPraktikumAutoGrading + $totalUjianAutoGrading }}</strong>
                            </td>
                            <td><strong>{{ $totalTugasManualGrading + $totalLatihanManual + $totalPraktikumManualGrading + $totalUjianManualGrading }}</strong>
                            </td>
                            <td><strong>{{ $totalTugasManualGrading +
                                    $totalTugasAutoGrading +
                                    $totalLatihanManual +
                                    $totalLatihanAutoGrading +
                                    $totalPraktikumManualGrading +
                                    $totalPraktikumAutoGrading +
                                    $totalUjianManualGrading +
                                    $totalUjianAutoGrading +
                                    $totalKuisAutoGrading +
                                    $totalVisiMisi +
                                    $totalKontrakKuliah +
                                    $totalRPS +
                                    $totalRefleksi +
                                    $totalLogKerja +
                                    $totalVideoPembelajaran +
                                    $totalKegiatanBelajarEksternal }}</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="container-rekap-outer">
            <h3>Jumlah Mata Kuliah di Setiap Kategori Monitoring</h3>
            <div class="container-rekap">
                <div class="chart-auto">
                    <h4>Otomatis</h4>
                    <canvas id="myChart-auto" width="400px" height="400px"></canvas>
                </div>

                <div class="chart-manual">
                    <h4>Manual</h4>
                    <canvas id="myChart-manual" width="400px" height="400px"></canvas>
                </div>
                <div class="chart-administrasi">
                    <h4>Lain-lain</h4>
                    <canvas id="myChart-administrasi" width="400px" height="400px"></canvas>
                </div>
            </div>
        </div>
        

        <h4 style="text-align: center; color: var(--primary-green); font-size: 2rem; ">Tabel Rekap Layar</h4>
        <div class="table-chart-layar shadow">
            <div class="table-wrapper-layar no-scrollbar" id="table-chart">
                <table id="logTable">
                    <thead class="thead-dark thead-layar">
                        <tr>
                            <th>Course</th>
                            <th>Tugas A.Grading</th>
                            <th>Tugas M.Grading</th>
                            <th>Kuis A.Grading</th>
                            <th>Latihan M.Grading</th>
                            <th>Latihan A.Grading</th>
                            <th>Praktikum A.Grading</th>
                            <th>Praktikum M.Grading</th>
                            <th>Ujian A.Grading</th>
                            <th>Ujian M.Grading</th>
                            <th>Refleksi</th>
                            <th>Log Kerja</th>
                            <th>Kegiatan Eksternal</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const card = document.querySelector('.button-hidden-chart');
            const table = document.getElementById('table-chart');

            card.addEventListener('click', () => {
                if (table.classList.contains('hidden-table')) {
                    table.classList.remove('hidden-table');
                } else {
                    table.classList.add('hidden-table');
                }
            });
        });
    </script>

    <p id="logContent" data-log="{{ $logContent }}"></p>

    <!-- <div class="rekap-layar-container">
        <div class="table-wrapper-rekap-layar">
            <h4 style="text-align: center; color: var(--primary-green); ">Tabel Rekap Layar</h4>
            <table id="logTable" class="tabel-rekap-layar">
                <thead class="thead-rekap-layar">
                    <tr>
                        <th>Course</th>
                        <th>Tugas A.Grading</th>
                        <th>Tugas M.Grading</th>
                        <th>Kuis A.Grading</th>
                        <th>Latihan M.Grading</th>
                        <th>Latihan A.Grading</th>
                        <th>Praktikum A.Grading</th>
                        <th>Praktikum M.Grading</th>
                        <th>Ujian A.Grading</th>
                        <th>Ujian M.Grading</th>
                        <th>Refleksi</th>
                        <th>Log Kerja</th>
                        <th>Kegiatan Eksternal</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div> -->
</div>



<script>
    document.addEventListener("DOMContentLoaded", function() {
        const logContent = document.getElementById('logContent').dataset.log;

        function parseLogContent(logContent) {
            const courses = logContent.trim().split('\n').map(line => line.trim()).filter(line => line.startsWith('Course:'));
            return courses.map(course => {
                const parts = course.split(' - ');
                const courseName = parts[0].replace('Course: ', '');
                const details = parts.slice(1).reduce((acc, part) => {
                    const [key, value] = part.split(': ');
                    acc[key.trim()] = parseInt(value.trim(), 10);
                    return acc;
                }, {
                    Course: courseName
                });

                // Menghitung total aktivitas tanpa kolom yang dihilangkan
                const total = [
                    'Total Tugas Auto Grading', 'Total Tugas Manual', 'Total Kuis Auto Grading',
                    'Total Latihan Manual', 'Total Latihan Auto Grading', 'Total Praktikum Auto Grading',
                    'Total Praktikum Manual Grading', 'Total Ujian Auto Grading', 'Total Ujian Manual Grading',
                    'Total Refleksi', 'Total Log Kerja', 'Total Kegiatan Belajar Eksternal'
                ].reduce((sum, key) => sum + (details[key] || 0), 0);

                details.Total = total;
                return details;
            });
        }

        function generateTable(logData) {
            const tableBody = document.querySelector('#logTable tbody');
            tableBody.innerHTML = ''; // Clear existing table body

            // Sort data by Total descending
            logData.sort((a, b) => b.Total - a.Total);

            // Get top 10 courses
            const top10Courses = logData.slice(0, 10).map(course => course.Course);

            // Generate table for all courses
            logData.forEach(course => {
                const row = document.createElement('tr');
                if (top10Courses.includes(course.Course)) {
                    row.classList.add('highlight');
                }
                [
                    'Course', 'Total Tugas Auto Grading', 'Total Tugas Manual', 'Total Kuis Auto Grading',
                    'Total Latihan Manual', 'Total Latihan Auto Grading', 'Total Praktikum Auto Grading',
                    'Total Praktikum Manual Grading', 'Total Ujian Auto Grading', 'Total Ujian Manual Grading',
                    'Total Refleksi', 'Total Log Kerja', 'Total Kegiatan Belajar Eksternal', 'Total'
                ].forEach(key => {
                    const cell = document.createElement('td');
                    cell.textContent = course[key] || 0;
                    row.appendChild(cell);
                });
                tableBody.appendChild(row);
            });
        }

        const parsedLogData = parseLogContent(logContent);

        // Generate table with all courses and highlight top 10 by activity
        generateTable(parsedLogData);
    });
</script>

<!-- <table border="1">
    <thead>
        <tr>
            <th>Activity Type</th>
            <th>Count of Courses with Activity</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $activity => $count)
        <tr>
            <td>{{ $activity }}</td>
            <td>{{ $count }}</td>
        </tr>
        @endforeach
    </tbody>
</table> -->


<div style="display: none;">
    <p id="countTugasAuto">{{ $countTugasAuto }}</p>
    <p id="countTugasManual">{{ $countTugasManual }}</p>
    <p id="countKuisAuto">{{ $countKuisAuto }}</p>
    <p id="countLatihanManual">{{ $countLatihanManual }}</p>
    <p id="countLatihanAuto">{{ $countLatihanAuto }}</p>
    <p id="countPraktikumAuto">{{ $countPraktikumAuto }}</p>
    <p id="countPraktikumManual">{{ $countPraktikumManual }}</p>
    <p id="countUjianAuto">{{ $countUjianAuto }}</p>
    <p id="countUjianManual">{{ $countUjianManual }}</p>
    <p id="countVisiMisi">{{ $countVisiMisi }}</p>
    <p id="countKontrakKuliah">{{ $countKontrakKuliah }}</p>
    <p id="countRPS">{{ $countRPS }}</p>
    <p id="countRefleksi">{{ $countRefleksi }}</p>
    <p id="countLogKerja">{{ $countLogKerja }}</p>
    <p id="countVideoPembelajaran">{{ $countVideoPembelajaran }}</p>
    <p id="countKegiatanBelajarEksternal">{{ $countKegiatanBelajarEksternal }}</p>
</div>

</div>

<div class="random" style="display: none;">
    <p id="matakuliahscl">{{ $totalCoursesWithAllCriteriaSCL }}</p> Jumlah matkul SCL
    <p id="matakuliahlengkap">{{ $totalCoursesWithAllCriteria }}</p> Jumlah Matkul Lengkap
    <p id="matakuliahadmin">{{ $totalCourses }}</p> Jumlah matkul Lengkap administrasi
    <p id="totalmatkul">{{ $output }}</p> Jumlah matkul
    <p id="jumlahkuis">{{ $totalKuisAutoGrading }}</p> Jumlah total kuis
</div>






<!-- Bootstrap JS (untuk fitur tertentu yang menggunakan JavaScript) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Menghapus log saat halaman di-refresh
        $.ajax({
            url: '/hapus-log',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response.message);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error deleting log file:', textStatus, errorThrown);
            }
        });
    });

    function validateForm() {
        $.ajax({
            url: '/hapus-log',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log(response.message);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.error('Error deleting log file:', textStatus, errorThrown);
            }
        });
        return true;
    }
</script>


<script>
    // Ambil nilai $output dari elemen p dengan id outputValue
    var totalmatkul = document.getElementById('totalmatkul').textContent.trim();
    var matakuliahlengkap = document.getElementById('matakuliahlengkap').textContent.trim();
    var matakuliahscl = document.getElementById('matakuliahscl').textContent.trim();

    // Parse nilai $output sebagai integer (jika perlu)
    // outputValue = parseInt(outputValue);

    // Data untuk chart
    const xValues = ["Mata Kuliah", "Mata Kuliah Lengkap", "Halaman Mata Kuliah", "Mata Kuliah SCL"];
    const yValues = [totalmatkul, matakuliahlengkap, totalmatkul, matakuliahscl, ];

    // Inisialisasi Chart.js
    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                label: false,
                labelColor: "rgba(79, 111, 82, 0.5)",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "rgba(0,0,255,1.0)",
                borderColor: "rgba(79, 111, 82, 0.5)",
                pointBackgroundColor: "rgba(79, 111, 82, 1)",
                data: yValues
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false // Pastikan legend dihilangkan
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0, // Atur min sesuai data lo
                        max: 10 // Atur max sesuai data lo
                    }
                }],
            }
        }

    });
</script>

<script>
    var tugasauto = parseInt(document.getElementById('tugasauto').textContent.trim());
    var tugasmanual = parseInt(document.getElementById('tugasmanual').textContent.trim());
    var totalkuis = parseInt(document.getElementById('totalkuis').textContent.trim());
    var latihanmanual = parseInt(document.getElementById('latihanmanual').textContent.trim());
    var latihanauto = parseInt(document.getElementById('latihanauto').textContent.trim());
    var praktikumauto = parseInt(document.getElementById('praktikumauto').textContent.trim());
    var praktikummanual = parseInt(document.getElementById('praktikummanual').textContent.trim());
    var ujianauto = parseInt(document.getElementById('ujianauto').textContent.trim());
    var ujianmanual = parseInt(document.getElementById('ujianmanual').textContent.trim());
    var totalvisimisi = parseInt(document.getElementById('totalvisimisi').textContent.trim());
    var totalkontrak = parseInt(document.getElementById('totalkontrak').textContent.trim());
    var totalrps = parseInt(document.getElementById('totalrps').textContent.trim());
    var totalrefleksi = parseInt(document.getElementById('totalrefleksi').textContent.trim());
    var totallog = parseInt(document.getElementById('totallog').textContent.trim());
    var totalvideo = parseInt(document.getElementById('totalvideo').textContent.trim());
    var totallink = parseInt(document.getElementById('totallink').textContent.trim());

    const xValues2 = ["Kuis", "Tugas", "Latihan", "Praktikum", "Ujian", "Refleksi", "Log Kerja", "Eksternal", "Video"];

    new Chart("myChart2", {
        type: "line",
        data: {
            labels: xValues2,
            datasets: [{
                    data: [totalkuis, (tugasauto + tugasmanual), (latihanauto + latihanmanual), (
                            praktikumauto + praktikummanual),
                        (ujianauto + ujianmanual), totalrefleksi, totallog, totallink, totalvideo
                    ],
                    borderColor: "red",
                    fill: false
                },

                {
                    data: [totalkuis, tugasauto, latihanauto, praktikumauto, ujianauto],
                    borderColor: "green",
                    fill: false
                },
                {
                    data: [totalkuis, tugasmanual, latihanmanual, praktikummanual, ujianmanual],
                    borderColor: "blue",
                    fill: false
                }
            ]
        },
        options: {
            plugins: {
                legend: {
                    display: false // Pastikan legend dihilangkan
                }
            }
        }
    });
</script>

<script>
    var countTugasAuto = parseInt(document.getElementById('countTugasAuto').textContent.trim());
    var countTugasManual = parseInt(document.getElementById('countTugasManual').textContent.trim());
    var countKuisAuto = parseInt(document.getElementById('countKuisAuto').textContent.trim());
    var countLatihanManual = parseInt(document.getElementById('countLatihanManual').textContent.trim());
    var countLatihanAuto = parseInt(document.getElementById('countLatihanAuto').textContent.trim());
    var countPraktikumAuto = parseInt(document.getElementById('countPraktikumAuto').textContent.trim());
    var countPraktikumManual = parseInt(document.getElementById('countPraktikumManual').textContent.trim());
    var countUjianAuto = parseInt(document.getElementById('countUjianAuto').textContent.trim());
    var countUjianManual = parseInt(document.getElementById('countUjianManual').textContent.trim());
    var countVisiMisi = parseInt(document.getElementById('countVisiMisi').textContent.trim());
    var countKontrakKuliah = parseInt(document.getElementById('countKontrakKuliah').textContent.trim());
    var countRPS = parseInt(document.getElementById('countRPS').textContent.trim());
    var countRefleksi = parseInt(document.getElementById('countRefleksi').textContent.trim());
    var countLogKerja = parseInt(document.getElementById('countLogKerja').textContent.trim());
    var countVideoPembelajaran = parseInt(document.getElementById('countVideoPembelajaran').textContent.trim());
    var countKegiatanBelajarEksternal = parseInt(document.getElementById('countKegiatanBelajarEksternal').textContent.trim());
    // Data yang lo punya dari PHP, gue asumsikan lo sudah mendapatkan nilainya dalam variabel JavaScript
    const data = {
        labels: [
            'Tugas', 'Kuis',
            'Latihan', 'Praktikum',
            'Ujian',
        ],
        datasets: [{
            label: 'Jumlah Mata Kuliah',
            data: [
                countTugasAuto, countKuisAuto, countLatihanAuto, countPraktikumAuto, countUjianAuto,
            ],
            backgroundColor: 'rgba(255, 0, 0, 0.5)',
            borderColor: 'rgba(255, 0, 0, 1)',
            borderWidth: 1
        }]
    };

    // Inisialisasi chart
    const ctx = document.getElementById('myChart-auto').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    //manual
    const data2 = {
        labels: [
            'Tugas', 'Latihan', 'Kuis',
            'Praktikum',
            'Ujian',
        ],
        datasets: [{
            label: 'Jumlah Mata Kuliah',
            data: [
                countTugasManual, countLatihanManual, countKuisAuto, countPraktikumManual, countUjianManual,
            ],
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    };

    // Inisialisasi chart
    const ctx2 = document.getElementById('myChart-manual').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: data2,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    //administratif
    const data3 = {
        labels: [
            'Visi misi', 'Kontrak', 'RPS',
            'Refleksi', 'Log kerja', 'Video', 'Link'
        ],
        datasets: [{
            label: 'Jumlah Mata Kuliah',
            data: [
                countVisiMisi, countKontrakKuliah, countRPS,
                countRefleksi, countLogKerja, countVideoPembelajaran, countKegiatanBelajarEksternal
            ],
            backgroundColor: 'rgba(26, 77, 46, 0.5)',
            borderColor: 'rgba(26, 77, 46, 1)',
            borderWidth: 1
        }]
    };

    // Inisialisasi chart
    const ctx3 = document.getElementById('myChart-administrasi').getContext('2d');
    const myChart3 = new Chart(ctx3, {
        type: 'bar',
        data: data3,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>





@endsection