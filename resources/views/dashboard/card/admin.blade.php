@extends('dashboard.beranda')
@section('card')
    <!-- Daftar Akun Card -->
    {{-- <div class="col-xl-4 col-md-6 col-11 col-lg-5">
        <div class="card">
            <div class="card-body">
                <div class="ps-1">
                    <div class="header-card">
                        <img src="{{ asset('images/akun.png') }}" style="width: 35px; height: 35px; margin-top: 3px;">
                        <h5 class="card-title fw-bold">Akun Pengguna</h5>
                    </div>
                    <h5 id="jumlah-akun" class="fw-bold mt-1"></h5>
                    <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                    <div class="card-footer bg-transparent mt-3 ps-0">
                        <small class="text-danger"><span id="last-updated-akun"></span></small>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Akun Card --> --}}

    <!-- Daftar Matkul Card -->
    {{-- <div class="col-xl-4 col-md-6 col-11 col-lg-5">
        <div class="card">
            <div class="card-body">
                <div class="ps-1">
                    <div class="header-card">
                        <img src="{{ asset('images/book.png') }}" style="margin-top: 3px;">
                        <h5 class="card-title fw-bold">Daftar Mata Kuliah</h5>
                    </div>
                    <h5 id="jumlah-matkul" class="fw-bold mt-1"></h5>
                    <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                    <div class="card-footer bg-transparent mt-3 ps-0">
                        <small class="text-danger"><span id="last-updated"></span></small>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- End Mahasiswa Card --> --}}

    <!-- Daftar Akun Card -->

    <!-- Bagian lain dari view admin -->
<div class="ps-1">
    <div class="header-card">
        <img src="{{ asset('images/akun.png') }}" style="width: 35px; height: 35px; margin-top: 3px;">
        <h5 class="card-title fw-bold">Status SSL</h5>
    </div>
    <h5 id="ssl-check" class="fw-bold mt-1">{{ $sslExpiry['message'] }}</h5>
    <!-- Informasi lain yang mungkin ada di sini -->
</div>
<!-- Bagian lain dari view admin -->

    

    <script src="{{ asset('js/daftarMatkul/admin.js') }}"></script>
@endsection
