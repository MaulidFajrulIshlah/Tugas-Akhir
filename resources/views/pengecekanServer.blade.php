@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Pengecekan Server')
@section('content')

    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Pengecekan Server</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Pengecekan Server</li>
    </ol>


    {{-- Card untuk jaringan luar YARSI --}}
    <div id="card-online-luar" class="card" style="display: none;">
        <div class="card-header">
            Server Online (Akses Dari Luar YARSI)
        </div>
        <div class="card-body">
            <h5 class="card-title">Status: Online</h5>
            <p class="card-text">Details: Server is running smoothly.</p>
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
            <div class="status-check" id="last-checked-yarsi"></div>
        </div>
    </div>



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
    <div class="card-new">
        <div class="card-header">
            Custom Check Interval
        </div>
        <div class="card-body">
            <form id="check-form">
                <label for="interval">Checking Interval (seconds):</label>
                <input type="number" id="interval" name="interval" value="3600" min="1" step="1">
                <button type="button" class="btn-set-interval">Set Interval</button>
                <button type="button" class="btn-stop-interval">Stop Interval</button>
                <button type="button" class="btn-check-now">Check Now</button>
            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var btnCheckNow = document.querySelector('.btn-check-now');
            btnCheckNow.addEventListener('click', function() {
                checkServerStatus(
                'yarsi'); // Ganti 'yarsi' dengan 'luar' jika ingin memeriksa server luar kampus
            });

            function checkServerStatus(signal) {
                var apiUrl = '';
                var location = '';

                if (signal === 'luar') {
                    apiUrl =
                        'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=fc68a1de6a0eb7fcca7d8dafc5ce53a9&wsfunction=core_course_get_categories&moodlewsrestformat=json';
                    location = 'luar kampus';
                } else if (signal === 'yarsi') {
                    apiUrl =
                        'https://yarsi.ac.id/webservice/rest/server.php?wstoken=your_token&wsfunction=your_function&moodlewsrestformat=json';
                    location = 'dalam kampus';
                }

                fetch(apiUrl)
                    .then(function(response) {
                        if (response.status === 200) {
                            // Jika server online, tampilkan card view online
                            showPopup('online', 'Server is running smoothly.', location);
                        } else {
                            // Jika server offline, tampilkan card view offline
                            // Jika terjadi kesalahan dalam fetch, tampilkan card view error
                            showPopup('offline', 'Server is currently down.', location);
                        }
                        // Memperbarui waktu terakhir diperiksa
                        setLastCheckedTime();
                    })
                    .catch(function(error) {
                        // Jika terjadi kesalahan dalam fetch, tampilkan card view error
                        showPopup('error', 'There was an error while checking the server status.', location);
                        console.error('Error during fetch request:', error);
                        // Memperbarui waktu terakhir diperiksa
                        setLastCheckedTime();
                    });
            }


            function showPopup(status, details, location) {
                var popup;
                if (status === 'online') {
                    if (location === 'luar kampus') {
                        popup = document.getElementById("card-online-luar");
                    } else if (location === 'dalam kampus') {
                        popup = document.getElementById("card-online-yarsi");
                    }
                } else if (status === 'offline') {
                    if (location === 'luar kampus') {
                        popup = document.getElementById("card-offline-luar");
                    } else if (location === 'dalam kampus') {
                        popup = document.getElementById("card-offline-yarsi");
                    }
                } else {
                    // Status error
                    popup = document.getElementById("card-error");
                    document.getElementById('server-status').textContent = 'ERROR';
                    document.getElementById('server-details').textContent = details;
                }

                popup.style.display = "block";

                // Menetapkan waktu untuk menghilangkan popup setelah 3 detik (3000 milidetik)
                setTimeout(function() {
                    popup.style.display = "none";
                }, 3000);

                // Memperbarui tampilan waktu terakhir diperiksa di halaman
                lastCheckedElement.textContent = 'Last Checked: ' + new Date().toLocaleString();
            }

            function getLastCheckedTime() {
                var lastCheckedTime = localStorage.getItem('last_executed_time');
                if (lastCheckedTime) {
                    return new Date(JSON.parse(lastCheckedTime));
                }
                return null;
            }

            function setLastCheckedTime() {
                var currentTime = new Date();
                localStorage.setItem('last_executed_time', JSON.stringify(currentTime));
            }




            // Mengakses tombol-tombol di halaman
            var btnSetInterval = document.querySelector('.btn-set-interval');
            var btnStopInterval = document.querySelector('.btn-stop-interval');
            var btnCheckNow = document.querySelector('.btn-check-now');
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
                intervalId = setInterval(checkServerStatus, intervalValue *
                    1000); // Mengubah detik ke milidetik
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
        });
    </script>


@endsection
