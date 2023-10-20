@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Pengecekan Server')
@section('content')

    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Pengecekan Server</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Pengecekan Server</li>
    </ol>

    <div id="card-online" class="card" style="display: none;">
        <div class="card-header">
            Server Online (Akses Dari Luar YARSI)
        </div>
        <div class="card-body">
            <h5 class="card-title">Status: Online</h5>
            <p class="card-text">Details: Server is running smoothly.</p>
            <div class="status-check" id="last-checked"></div>
            <button id="close-popup">Close</button>
        </div>
    </div>
    <div id="card-offline" class="card" style="display: none;">
        <div class="card-header">
            Server Offline (Akses Dari Luar YARSI)
        </div>
        <div class="card-body">
            <h5 class="card-title">Status: Offline</h5>
            <p class="card-text">Details: Server is currently down.</p>
            <div class="status-check" id="last-checked"></div>
            <button id="close-popup">Close</button>
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
            <button id="close-popup">Close</button>
        </div>
    </div>
    <div class="card-new">
        <div class="card-header">
            Custom Check Interval
        </div>
        <div class="card-body">
            <form id="check-form">
                <label for="interval">Checking Interval (seconds):</label>
                <input type="number" id="interval" name="interval" value="3600" min="1"
                    step="1">
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
            // Fungsi untuk menampilkan popup dengan pesan yang sesuai
            function showPopup(status, details) {
                var popup;
                if (status === 'online') {
                    popup = document.getElementById("card-online");
                    popup.style.display = "block";
                } else if (status === 'offline') {
                    popup = document.getElementById("card-offline");
                    popup.style.display = "block";
                } else {
                    // Status error
                    popup = document.getElementById("card-error");
                    document.getElementById('server-status').textContent = 'ERROR';
                    document.getElementById('server-details').textContent = details;
                    popup.style.display = "block";
                }

                // Setelah menampilkan popup, tambahkan event listener ke tombol close-popup
                var closePopupButton = document.getElementById("close-popup");
                closePopupButton.addEventListener("click", function() {
                    popup.style.display = "none";
                });

                // Menetapkan waktu terakhir diperiksa setiap kali popup ditampilkan
                setLastCheckedTime();

                // Memperbarui tampilan waktu terakhir diperiksa di halaman
                lastCheckedElement.textContent = 'Last Checked: ' + new Date().toLocaleString();
            }

            var intervalId; // Variabel untuk menyimpan ID interval

            // Fungsi untuk mendapatkan waktu terakhir diperiksa dari localStorage
            function getLastCheckedTime() {
                var lastCheckedTime = localStorage.getItem('last_executed_time');
                if (lastCheckedTime) {
                    return new Date(JSON.parse(lastCheckedTime));
                }
                return null;
            }

            // Fungsi untuk menetapkan waktu terakhir diperiksa ke dalam localStorage
            function setLastCheckedTime() {
                var currentTime = new Date();
                localStorage.setItem('last_executed_time', JSON.stringify(currentTime));
            }

            // Fungsi untuk memeriksa status server
            function checkServerStatus() {
                fetch(
                        'https://layar.arsi.ac.id/webservice/rest/server.php?wstoken=fc68a1de6a0eb7fcca7d8dafc5ce53a9&wsfunction=core_course_get_categories&moodlewsrestformat=json'
                    )
                    .then(function(response) {
                        if (response.ok) {
                            // Jika server online, tampilkan Sweet Alert online
                            showPopup('online', 'Server is running smoothly.');
                        } else {
                            // Jika server offline, tampilkan Sweet Alert offline
                            // Jika terjadi kesalahan dalam fetch, tampilkan Sweet Alert error
                            showPopup('offline', 'Server is currently down.');
                        }
                    })
                    .catch(function(error) {
                        // Jika terjadi kesalahan dalam fetch, tampilkan Sweet Alert error
                        showPopup('error', 'There was an error while checking the server status.');
                    });
            }

            // Mengakses tombol-tombol di halaman
            var btnSetInterval = document.querySelector('.btn-set-interval');
            var btnStopInterval = document.querySelector('.btn-stop-interval');
            var btnCheckNow = document.querySelector('.btn-check-now');
            var lastCheckedElement = document.getElementById('last-checked');

            // Memeriksa apakah ada waktu terakhir diperiksa di localStorage saat halaman dimuat
            var lastCheckedTime = getLastCheckedTime();
            if (lastCheckedTime) {
                lastCheckedElement.textContent = 'Last Checked: ' + lastCheckedTime.toLocaleString();
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

            btnCheckNow.addEventListener('click', function() {
                // Lakukan pengecekan server sekarang saat tombol ditekan
                checkServerStatus();
            });
        });
    </script>


@endsection
