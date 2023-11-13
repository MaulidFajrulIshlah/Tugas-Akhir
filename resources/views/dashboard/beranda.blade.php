@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Beranda')
@section('content')
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Beranda</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Beranda</li>
    </ol>



    <div class="row g-3 my-3">


        @yield('card')
        {{-- @yield('card.dekanat_tendik_fkg') --}}

        <div class="w-100 d-flex gap-5">
            @can('admin')
                {{-- Table Status Suspend --}}
                <div class="row my-5  w-100" id="loading">
                    <div class="content mx-2 col bg-white p-3 rounded card">
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


            {{-- Card untuk custom check server --}}
            <div class="card-new bg-white w-50 h-auto p-3 my-5 rounded shadow-lg">
                <h5 class="title" style="font-weight: bold; color: black; text-align: center;">Custom Check Server</h5>
                <div class="card-body h-auto p-2 w-auto d-flex flex-column">
                    <form id="check-form " class="d-flex flex-column justify-center align-content-center">
                        <label for="interval" style="font-weight: bold; color: black;">Checking Interval (seconds):</label>
                        <input class="p-1 rounded border border-success px-3 my-3" type="number" id="interval"
                            name="interval" value="3600" min="1" step="1">
                    </form>
                    <div class="d-flex justify-content-around mt-1 mb-2">
                        <button type="button" class="btn-set-interval px-3 btn btn-custom-color">Set Interval</button>
                        <button type="button" class="btn-stop-interval px-3 btn btn-custom-color">Stop Interval</button>
                    </div>
                    <div class="align-content-center justify-content-center w-auto d-flex m-3 gap-3">

                        <button type="button " class="btn-check-now p-2 w-25 btn btn-custom-color">Check Now</button>
                    </div>
                </div>
            </div>

        </div>
    </div> <!-- /row g-3 my-3 -->


    {{-- Card Cek Server Start --}}

    {{-- Card untuk jaringan luar YARSI --}}
    <div id="card-online-luar" class="card" style="display: none;">
        <div class="card-header">
            Server Online (Akses Dari Luar YARSI)
        </div>
        <div class="card-body">
            <h5 class="card-title">Status: Online</h5>
            <p class="card-text">Details: Server is running smoothly.</p>
            <p><strong>Last checked: <span id="last-executed-time">{{ Cache::get('last_executed_time') }}</span></strong>
            </p>
            <div class="status-check" id="last-checked-luar"></div>
        </div>
    </div>

    <div id="card-offline-luar" class="card" style="display: none;">
        <div class="card-header">
            Server Offline (Akses Dari Luar YARSI)
        </div>
        <div class="card-body">
            <h5 class="card-title">Status: Offline</h5>
            <p class="card-text">Details: Server is currently down.</p>
            <p><strong>Last checked: <span id="last-executed-time">{{ Cache::get('last_executed_time') }}</span></strong>
            </p>
            <div class="status-check" id="last-checked-luar"></div>
        </div>
    </div>

    {{-- Card untuk Jaringan dalam YARSI --}}
    <div class="card" id="card-offline-yarsi" style="display: none;">
        <div class="card-header">
            Server Offline (Akses Dari Dalam YARSI)
        </div>
        <div class="card-body-offline">
            <h5 class="card-title">Status: Offline</h5>
            <p class="card-text">Details: Server is currently down.</p>
            <p><strong>Last checked: <span id="last-executed-time">{{ Cache::get('last_executed_time') }}</span></strong>
            </p>
            <div class="status-check" id="last-checked-yarsi"></div>
        </div>
    </div>

    <div class="card" id="card-online-yarsi" style="display: none;">
        <div class="card-header">
            Server Online (Akses Dari Dalam YARSI)
        </div>
        <div class="card-body-online">
            <h5 class="card-title">Status: Online</h5>
            <p class="card-text">Details: Server is running smoothly.</p>
            <p><strong>Last checked: <span id="last-executed-time">{{ Cache::get('last_executed_time') }}</span></strong>
            </p>
            <div class="status-check" id="last-checked-yarsi"></div>
        </div>
    </div>

    {{-- Card untuk error saat pengecekan server --}}
    <div id="card-error" class="card" style="display: none;">
        <div class="card-header">
            ERROR
        </div>
        <div class="card-body">
            <h5 class="card-title">Status: <span id="server-status">ERROR</span></h5>
            <p class="card-text">Details: <span id="server-details">There was an error while checking the
                    server status.</span></p>
            <div class="status-check" id="last-checked"></div>
        </div>
    </div>

    {{-- Chart --}}
    <div class="row g-3 my-3">
        <div class="card bg-white w-50 h-auto p-3 my-5 rounded shadow-lg">
            <h5 class="title" style="font-weight: bold; color: black; text-align: center;">Statik</h5>
            <div class="card-body h-auto p-2 w-auto d-flex flex-column">
                <canvas id="donutChartCanvas" width="150" height="100"></canvas>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.7.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <script>
        // Fungsi buat generate donut chart
        function generateDonutChart(data, labels, colors, elementId) {
            var ctx = document.getElementById(elementId).getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: colors,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: 'right',
                    },
                    plugins: {
                        datalabels: {
                            color: '#fff',
                            backgroundColor: '#333',
                            borderRadius: 5,
                            font: {
                                weight: 'bold'
                            },
                            formatter: (value) => {
                                return value + '%';
                            }
                        }
                    }
                }
            });
        }

        // Data, labels, dan colors untuk donut chart
        var donutChartData = [40, 30, 20]; // Contoh data
        var donutChartLabels = ['Akses Mata Kuliah', 'Akses Akademik', 'Akses Pengguna']; // Contoh labels
        var donutChartColors = ['#FF6384', '#36A2EB', '#FFCE56']; // Contoh colors

        // Panggil fungsi buat generate donut chart
        generateDonutChart(donutChartData, donutChartLabels, donutChartColors, 'donutChartCanvas');


        // Tambahin ini di akhir event listener DOMContentLoaded
        var ipAddress;
        document.addEventListener('DOMContentLoaded', function() {
            function fetchIpAddressAndCheckStatus() {
                // Dapatkan IP Address client menggunakan ipinfo.io API
                fetch('https://ipinfo.io/json')
                    .then(response => response.json())
                    .then(data => {
                        ipAddress = data.ip; // Simpen IP Address ke variabel global
                        // Sekarang ipAddress berisi IP Address client, lanjutkan dengan pengecekan server status
                        var location = (ipAddress === '103.78.212.1') ? 'luar' : 'dalam';
                        checkServerStatus(location);
                    })
                    .catch(error => {
                        // Handle error jika gagal mendapatkan IP Address
                        console.error('Error during IP Address fetch:', error);
                        showPopup('error', 'There was an error while checking the server status.');
                        setLastCheckedTime();
                    });
            }

            fetchIpAddressAndCheckStatus(); // Mengecek status server otomatis saat halaman dimuat

            var btnCheckNow = document.querySelector('.btn-check-now');
            btnCheckNow.addEventListener('click', function() {
                fetchIpAddressAndCheckStatus(); // Mengecek status server saat tombol 'Check Now' ditekan
            });

            function checkServerStatus(location) {
                var apiUrl =
                    'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=fc68a1de6a0eb7fcca7d8dafc5ce53a9&wsfunction=core_course_get_categories&moodlewsrestformat=json';

                fetch(apiUrl)
                    .then(function(response) {
                        if (response.status === 200) {
                            showPopup('online', 'Server is running smoothly.', location);
                        } else {
                            showPopup('offline', 'Server is currently down.', location);
                        }
                        setLastCheckedTime();
                    })
                    .catch(function(error) {
                        showPopup('error', 'There was an error while checking the server status.');
                        console.error('Error during fetch request:', error);
                        setLastCheckedTime();
                    });
            }

            // Dapatkan elemen span yang berisi waktu terakhir
            var lastExecutedTime = document.getElementById('last-executed-time');

            function setLastCheckedTime() {
                // Ambil waktu terbaru dari server dan update ke elemen span
                fetch('/api/getLastExecutedTime')
                    .then(response => response.json())
                    .then(data => {
                        lastExecutedTime.innerText = data.lastExecutedTime;
                    })
                    .catch(error => {
                        console.error('Error during fetch request:', error);
                    });
            }

            // Fungsi buat auto-refresh waktu terakhir setiap 5 detik
            function autoRefreshLastCheckedTime() {
                setInterval(function() {
                    setLastCheckedTime();
                }, 1000); // Auto-refresh setiap 5 detik
            }

            // Panggil fungsi auto-refresh saat halaman selesai dimuat
            document.addEventListener('DOMContentLoaded', function() {
                autoRefreshLastCheckedTime();
            });


            function showPopup(status, message, location) {
                var popup;
                if (status === 'online') {
                    if (location === 'luar') {
                        popup = document.getElementById("card-online-luar");
                    } else if (location === 'dalam') {
                        popup = document.getElementById("card-online-yarsi");
                    }
                } else if (status === 'offline') {
                    if (location === 'luar') {
                        popup = document.getElementById("card-offline-luar");
                    } else if (location === 'dalam') {
                        popup = document.getElementById("card-offline-yarsi");
                    }
                } else {
                    // Status error
                    popup = document.getElementById("card-error");
                    document.getElementById('server-status').textContent = 'ERROR';
                    document.getElementById('server-details').textContent =
                        details; // Ini harusnya didefinisikan atau dihapus
                }

                popup.style.display = "block";

                // Menetapkan waktu untuk menghilangkan popup setelah 3 detik (3000 milidetik)
                setTimeout(function() {
                    popup.style.display = "none";
                }, 3500);

                // Memperbarui tampilan waktu terakhir diperiksa di halaman
                lastCheckedElement.textContent = 'Last Checked: ' + new Date().toLocaleString();
            }

            function setLastCheckedTime() {
                var currentTime = new Date();
                localStorage.setItem('last_executed_time', JSON.stringify(currentTime));

                // Update tampilan waktu terakhir diperiksa di halaman
                var lastCheckedElement = document.getElementById('last-checked');
                var options = {
                    day: 'numeric',
                    month: 'numeric',
                    year: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    second: 'numeric'
                };
                lastCheckedElement.textContent = 'Last Checked: ' + currentTime.toLocaleDateString(undefined,
                    options);
            }

            // Mengakses tombol-tombol di halaman
            var btnSetInterval = document.querySelector('.btn-set-interval');
            var btnStopInterval = document.querySelector('.btn-stop-interval');
            var lastCheckedElement = document.getElementById('last-checked');



            // Menetapkan event listener ke tombol-tombol
            btnSetInterval.addEventListener('click', function() {
                var intervalValue = document.getElementById('interval').value;
                intervalId = setInterval(function() {
                    var ipAddress =
                        '192.168.0.118'; // Ganti ini dengan cara lo dapetin IP Address client
                    var location = (ipAddress === '192.168.0.118') ? 'dalam' : 'luar';
                    checkServerStatus(location);
                }, intervalValue * 1000); // Mengubah detik ke milidetik
                Swal.fire({
                    title: 'Interval Diatur!',
                    text: 'Interval sekarang diatur ke ' + intervalValue + ' detik.',
                    icon: 'success',
                    confirmButtonText: 'Oke'
                });
            });

            btnStopInterval.addEventListener('click', function() {
                clearInterval(intervalId);
                Swal.fire({
                    title: 'Interval Dihentikan',
                    text: 'Pengecekan server dihentikan.',
                    icon: 'info',
                    confirmButtonText: 'Oke'
                });
            });

            // Fungsi untuk mendapatkan waktu terakhir diperiksa dari localStorage
            function getLastCheckedTime() {
                var lastCheckedTime = localStorage.getItem('last_executed_time');
                if (lastCheckedTime) {
                    return new Date(JSON.parse(lastCheckedTime));
                }
                return null;
            }
        });
    </script>
    {{-- Card cek server stop --}}



@endsection
