<header>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg" style="color: white;">
            <div class="d-flex align-items-center mx-3">
                <i class="fas fa-bars fs-4 me-2" id="menu-toggle" style="width:32px; height:32px"></i>
                <h2 class="fw-bold" style="font-size: 25px; font-weight: 300;"><a href="{{ route('beranda') }}"
                        style="color: white;">PANDAY</a></h2>
            </div>

            <ul class="navbar-nav ms-auto me-4">

                {{-- <!-- Notifikasi Dropdown -->
                <li class="nav-item dropdown show">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-bell me-2" id="menu-toggle" style="width:35px; height:35px; color:white; background-image: url('bell.png');"></i>Pemberitahuan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <!-- List notifikasi masukin sini pake PHP atau sesuai data yang lo punya -->
                        <a class="dropdown-item" href="#">SERVER OFFLINE</a>
                        <a class="dropdown-item" href="#">SERVER KEMBALI ONLINE</a>
                        <a class="dropdown-item" href="#">Masa Berakhir SSL Sisa 30 Hari</a>
                    </div>
                </li> --}}

                <li class="nav-item">
                    <span class="text-white">
                        <i class="fas fa-user me-3"></i>{{ session('users') }}
                    </span>
                </li>
                <!-- /Notifikasi Dropdown -->
            </ul>
        </nav>
    </div>
    
</header>

<script src="{{ asset('js/dataMonitoring/fti/ti/newToken.js') }}"></script>
