<header> 
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg" style="color: white;">
            <div class="d-flex align-items-center mx-3">
                <i class="fas fa-bars fs-4 me-2" id="menu-toggle" style="width:32px; height:32px"></i>
                <h2 class="fw-bold" style="font-size: 25px; font-weight: 300;"><a href="{{ route('beranda') }}" style="color: white;">PANDAY</a></h2>
            </div>

            <ul class="navbar-nav ms-auto me-4">
                <li class="nav-item">
                    <span class="text-white">
                        <i class="fas fa-user me-3"></i>{{ session('users') }}
                    </span>
                </li>
            </ul>
        </nav>
    </div>
</header>