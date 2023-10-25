@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Pengecekan Server')
@section('content')

    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Pengecekan Server</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Pengecekan Server</li>
    </ol>

    {{-- Card untuk custom check server --}}
    <div class="card-new">
        <div class="card-header">
            Custom Check Server
        </div>
        <div class="card-body">
            <form id="check-form">
                <label for="interval">Checking Interval (seconds):</label>
                <input type="number" id="interval" name="interval" value="3600" min="1" step="1">
                <button type="button" class="btn-set-interval">Set Interval</button>
                <button type="button" class="btn-stop-interval">Stop Interval</button>
            </form>
            <button type="button" class="btn-check-now">Check Now</button>
        </div>
    </div>

    {{-- Card untuk jaringan luar YARSI --}}
    <div id="card-online-luar" class="card" style="display: none;">
        <div class="card-header">
            Server Online (Akses Dari Luar YARSI)
        </div>
        <div class="card-body">
            <h5 class="card-title">Status: Online</h5>
            <p class="card-text">Details: Server is running smoothly.</p>
            <p><strong>Last checked: {{ Cache::get('last_executed_time') }}</strong></p>
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
            <p><strong>Last checked: {{ Cache::get('last_executed_time') }}</strong></p>
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
            <p><strong>Last checked: {{ Cache::get('last_executed_time') }}</strong></p>
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
            <p><strong>Last checked: {{ Cache::get('last_executed_time') }}</strong></p>
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



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            

            var intervalId; // Variabel untuk menyimpan ID interval

            var btnCheckNow = document.querySelector('.btn-check-now');
            btnCheckNow.addEventListener('click', function() {
                var ipAddress; // Gak perlu diinisialisasi karena nilainya bakal diambil dari API

                // Dapatkan IP Address client menggunakan ipinfo.io API
                fetch('https://ipinfo.io/json')
                    .then(response => response.json())
                    .then(data => {
                        ipAddress = data.ip;
                        // Sekarang ipAddress berisi IP Address client, lanjutkan dengan pengecekan server status
                        var location = (ipAddress === '192.168.0.118') ? 'dalam' : 'luar';
                        checkServerStatus(location);
                    })
                    .catch(error => {
                        // Handle error jika gagal mendapatkan IP Address
                        console.error('Error during IP Address fetch:', error);
                        // Sekarang ipAddress tetap null, kamu bisa handle ini sesuai kebutuhan
                    });

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
            }

            // Mengakses tombol-tombol di halaman
            var btnSetInterval = document.querySelector('.btn-set-interval');
            var btnStopInterval = document.querySelector('.btn-stop-interval');
            var lastCheckedElement = document.getElementById('last-checked');

            // Memeriksa apakah ada waktu terakhir diperiksa di localStorage saat halaman dimuat
            var lastCheckedTime = getLastCheckedTime();
            if (lastCheckedTime) {
                var options = {
                    day: 'numeric',
                    month: 'numeric',
                    year: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    second: 'numeric'
                };
                lastCheckedElement.textContent = 'Last Checked: ' + lastCheckedTime.toLocaleDateString(undefined,
                    options);
            }

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


@endsection
