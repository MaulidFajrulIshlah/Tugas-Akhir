@extends('dashboard.beranda')
@section('card')

    @can('dekanat-tendik-pascasarjana')
        <!-- Daftar Matkul Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
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
        </div><!-- End Mahasiswa Card -->

        <script src="{{ asset('js/daftarMatkul/dekanat_tendik_prodi/dekanat_tendik_pascasarjana.js') }}"></script>
    @endcan

    @can('dekanat-tendik-fti')
        <!-- Daftar Matkul Card -->
        <div class="col-xl-4 col-md-6 col-11 col-lg-5">
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
        </div><!-- End Mahasiswa Card -->

        <script src="{{ asset('js/daftarMatkul/dekanat_tendik_prodi/dekanat_tendik_fti.js') }}"></script>
    @endcan

    @can('dekanat-tendik-feb')
    <!-- Daftar Matkul Card -->
    <div class="col-xl-4 col-md-6 col-11 col-lg-5">
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
    </div><!-- End Mahasiswa Card -->

    <script src="{{ asset('js/daftarMatkul/dekanat_tendik_prodi/dekanat_tendik_feb.js') }}"></script>
    @endcan

    @can('dekanat-tendik-prodi-fh')
    <!-- Daftar Matkul Card -->
    <div class="col-xl-4 col-md-6 col-11 col-lg-5">
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
    </div><!-- End Mahasiswa Card -->

    <script src="{{ asset('js/daftarMatkul/dekanat_tendik_prodi/dekanat_tendik_prodi_fh.js') }}"></script>
    @endcan

    @can('dekanat-tendik-prodi-fpsi')
    <!-- Daftar Matkul Card -->
    <div class="col-xl-4 col-md-6 col-11 col-lg-5">
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
    </div><!-- End Mahasiswa Card -->

    <script src="{{ asset('js/daftarMatkul/dekanat_tendik_prodi/dekanat_tendik_prodi_fpsi.js') }}"></script>
    @endcan

@endsection