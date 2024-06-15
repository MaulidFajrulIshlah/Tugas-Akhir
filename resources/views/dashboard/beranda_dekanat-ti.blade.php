@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Beranda')
@section('content')
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Beranda</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda-dekanat-ti') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Beranda Dekanat TI</li>

    </ol>

    <div class="row g-3 my-3">

        <div class="main-container-sort">
            <div class="content-container-sort">
                <form id="hitung-form" action="{{ route('beranda-dekanat-ti') }}" method="GET" onsubmit="return validateForm()">
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
                            <option value="Teknik Informatika">Teknik Informatika</option>
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
                    <div class="c1-header">Jumlah mata kuliah</div>
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

                <div class="content-1">
                    <div class="c1-header">halaman LAYAR mata kuliah berbasis SCL</div>
                    <div class="c1-content">
                        <p>{{ $totalCoursesWithAllCriteriaSCL }}</p>
                    </div>
                </div>
            </section>

            <div style="width: 100%;" class="hidden-table" id="table-admin">
                <div class="rounded shadow"
                    style="max-height: 400px; overflow-y: auto; border: 2px solid var(--secondary); padding: 10px; background-color: var(--primary);">
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


    <script>
        // Ambil nilai $output dari elemen p dengan id outputValue
        var outputValue = document.getElementById('outputMatkul').textContent.trim();
        var totalMatkulLengkap = document.getElementById('totalMatkulLengkap').textContent.trim();
        var totalkuis = document.getElementById('totalkuis').textContent.trim();
        var totaladmin = document.getElementById('totaladmin').textContent.trim();

        // Parse nilai $output sebagai integer (jika perlu)
        // outputValue = parseInt(outputValue);

        // Data untuk chart
        const xValues = ["Kuis", "Latihan", "Praktikum", "Refleksi", "Ujian", "Tugas", ];
        const yValues = [totalkuis, outputValue, outputValue, totaladmin, totalMatkulLengkap, totalkuis];

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
