@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Mahasiswa')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Mata Kuliah</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Mata Kuliah</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <h5 class="m-3 mt-4 mb-0 fw-bold text">Fakultas dan Prodi Universitas YARSI</h5>
            <hr>
            <div class="row g-0 mb-2">
                <div class="row">
                    <ul class="semester mb-2">
                        @foreach ($prodi as $prodis)
                            <li class="link">
                                <a href="{{ route('mataKuliah', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div> <!-- /col bg-white -->
    </div>
@endsection
        {{-- <script>
           // Menangkap event saat halaman di-refresh
            window.onload = function() {
                if (window.location.search.includes('unitID=')) {
                    window.history.replaceState({}, document.title, "{{ route('mahasiswa') }}");
                }
            }
        </script> --}}

{{-- @extends('dashboard.layouts.main')
@section('title', 'PANDAY | Mahasiswa')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; color: #303030; font-weight: 400;">Mata Kuliah</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Mata Kuliah</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <div class="row g-0 my-2">
                <div class="row">
                    <ul class="semester my-2">
                        <li class="link">
                            <a href="{{ route('mataKuliah', ['categoryID' => '16']) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2019/2020 Ganjil</a>
                        </li>
                        <li class="link">
                            <a href="{{ route('mataKuliah', ['categoryID' => '39']) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2019/2020 Genap</a>
                        </li>
                        <li class="link">
                            <a href="" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2020/2021 Ganjil</a>
                        </li>
                        <li class="link">
                            <a href="" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2020/2021 Genap</a>
                        </li>
                        <li class="link">
                            <a href="" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2021/2022 Ganjil</a>
                        </li>
                        <li class="link">
                            <a href="" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2021/2022 Genap</a>
                        </li>
                        <li class="link">
                            <a href="" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2021/2022 Ganjil</a>
                        </li>
                        <li class="link">
                            <a href="" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2021/2022 Genap</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.nav-link').on('click', function(e) {
            e.preventDefault();
            
            // Mengaktifkan form-select dan elemen-elemen yang dinonaktifkan
            $('.form-select').removeAttr('disabled');
            
            // Navigasi ke halaman selanjutnya atau lakukan tindakan lainnya
            window.location.href = $(this).attr('href');
        });
    });
    </script>
@endsection --}}