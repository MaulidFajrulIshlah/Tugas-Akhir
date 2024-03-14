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
            <p><strong>Last checked: <span id="last-checked-luar"></span></strong></p>
            <div class="status-check"></div>
        </div>
    </div>

    <div id="card-offline-luar" class="card" style="display: none;">
        <div class="card-header">
            Server Offline (Akses Dari Luar YARSI)
        </div>
        <div class="card-body">
            <h5 class="card-title">Status: Offline</h5>
            <p class="card-text">Details: Server is currently down.</p>
            <p><strong>Last checked: <span id="last-checked-luar"></span></strong></p>
            <div class="status-check"></div>
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
            <p><strong>Last checked: <span id="last-checked-yarsi"></span></strong></p>
            <div class="status-check"></div>
        </div>
    </div>

    <div class="card" id="card-online-yarsi" style="display: none;">
        <div class="card-header">
            Server Online (Akses Dari Dalam YARSI)
        </div>
        <div class="card-body-online">
            <h5 class="card-title">Status: Online</h5>
            <p class="card-text">Details: Server is running smoothly.</p>
            <p><strong>Last checked: <span id="last-checked-yarsi"></span></strong></p>
            <div class="status-check"></div>
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
       document.addEventListener('DOMContentLoaded', function () {
    var intervalId; // Tambahkan variabel global untuk menyimpan ID interval

    function fetchIpAddressAndCheckStatus() {
        fetch('https://ipinfo.io/json')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Failed to fetch IP address data');
                }
                return response.json();
            })
            .then(data => {
                var ipAddress = data.ip;
                var location = (ipAddress === '103.78.212.10') ? 'dalam' : 'luar';
                checkServerStatus(location);
            })
            .catch(error => {
                console.error('Error during IP Address fetch:', error);
                showPopup('error', 'There was an error while checking the server status.');
                setLastCheckedTime();
            });
    }

    function checkServerStatus(location) {
        var apiUrl = 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=76debee2b62a3d38a48963f60b5c76ee&wsfunction=core_course_get_categories&moodlewsrestformat=json';

        fetch(apiUrl)
            .then(response => {
                if (response.status === 200) {
                    showPopup('online', 'Server is running smoothly.', location);
                } else {
                    showPopup('offline', 'Server is currently down.', location);
                }
                setLastCheckedTime();
            })
            .catch(error => {
                console.error('Error during fetch request:', error);
                showPopup('error', 'There was an error while checking the server status.');
                setLastCheckedTime();
            });
    }

    function showPopup(status, message, location) {
        var popup;
        if (status === 'online') {
            popup = document.getElementById(location === 'luar' ? "card-online-luar" : "card-online-yarsi");
        } else if (status === 'offline') {
            popup = document.getElementById(location === 'luar' ? "card-offline-luar" : "card-offline-yarsi");
        } else {
            popup = document.getElementById("card-error");
            document.getElementById('server-status').textContent = 'ERROR';
            document.getElementById('server-details').textContent = message;
        }

        popup.style.display = "block";

        setTimeout(function () {
            popup.style.display = "none";
        }, 3500);

        lastCheckedElement.textContent = 'Last Checked: ' + new Date().toLocaleString();
    }

    function setLastCheckedTime() {
        var currentTime = new Date();
        localStorage.setItem('last_executed_time', JSON.stringify(currentTime));
    }

    var btnCheckNow = document.querySelector('.btn-check-now');
    btnCheckNow.addEventListener('click', function () {
        fetchIpAddressAndCheckStatus();
    });

    // Menetapkan event listener ke tombol-tombol
    var btnSetInterval = document.querySelector('.btn-set-interval');
    var btnStopInterval = document.querySelector('.btn-stop-interval');
    var lastCheckedElement = document.getElementById('last-checked');

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
        lastCheckedElement.textContent = 'Last Checked: ' + lastCheckedTime.toLocaleDateString(undefined, options);
    }

    btnSetInterval.addEventListener('click', function () {
        var intervalValue = document.getElementById('interval').value;
        intervalId = setInterval(function () {
            fetchIpAddressAndCheckStatus();
        }, intervalValue * 1000);
        Swal.fire({
            title: 'Interval Diatur!',
            text: 'Interval sekarang diatur ke ' + intervalValue + ' detik.',
            icon: 'success',
            confirmButtonText: 'Oke'
        });
    });

    btnStopInterval.addEventListener('click', function () {
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
