@extends('dashboard.beranda')
@section('card')

    @can('prodi-magister-kenotariatan')
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

        <script src="{{ asset('js/daftarMatkul/prodi/prodi_magister_kenotariatan.js') }}"></script>
    @endcan

    @can('prodi-magister-manajemen')
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

        <script src="{{ asset('js/daftarMatkul/prodi/prodi_magister_manajemen.js') }}"></script>
    @endcan

    @can('prodi-magister-sainsBiomedis')
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

    <script src="{{ asset('js/daftarMatkul/prodi/prodi_magister_sainsBiomedis.js') }}"></script>
    @endcan

    @can('prodi-magister-adminRS')
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

    <script src="{{ asset('js/daftarMatkul/prodi/prodi_magister_adminRS.js') }}"></script>
    @endcan

    @can('prodi-doktor-sainsBiomedis')
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

    <script src="{{ asset('js/daftarMatkul/prodi/prodi_doktor_sainsBiomedis.js') }}"></script>
    @endcan

    @can('prodi-fti-ti')
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

    <script src="{{ asset('js/daftarMatkul/prodi/prodi_fti_ti.js') }}"></script>
    @endcan

    @can('prodi-fti-ip')
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

    <script src="{{ asset('js/daftarMatkul/prodi/prodi_fti_ip.js') }}"></script>
    @endcan

    @can('prodi-feb-akuntansi')
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

    <script src="{{ asset('js/daftarMatkul/prodi/prodi_feb_akuntansi.js') }}"></script>
    @endcan

    @can('prodi-feb-manajemen')
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

    <script src="{{ asset('js/daftarMatkul/prodi/prodi_feb_manajemen.js') }}"></script>
    @endcan

    @can('prodi-fkg-sarjana')
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

    <script src="{{ asset('js/daftarMatkul/prodi/prodi_fkg_sarjana.js') }}"></script>
    @endcan

    @can('prodi-fkg-profesi')
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

    <script src="{{ asset('js/daftarMatkul/prodi/prodi_fkg_profesi.js') }}"></script>
    @endcan

    @can('prodi-fk-sarjana')
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

    <script src="{{ asset('js/daftarMatkul/prodi/prodi_fk_sarjana.js') }}"></script>
    @endcan

    @can('prodi-fk-profesi')
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

    <script src="{{ asset('js/daftarMatkul/prodi/prodi_fk_profesi.js') }}"></script>
    @endcan

@endsection