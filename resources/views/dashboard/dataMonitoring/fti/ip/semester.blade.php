@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Mata Kuliah')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Akademik</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Akademik</li>
        <li class="breadcrumb-item active">Fakultas Teknologi Informasi</li>
        <li class="breadcrumb-item active">Ilmu Perpustakaan</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <h5 class="m-3 mt-4 mb-0 fw-bold text">Daftar Semester</h5>
            <hr>
            
        <div class="row g-0">
            <div class="row">
                <ul class="semester">
                    @foreach ($prodi as $prodis)
                        @if($prodis->id == 11)
                            <li class="link">
                                <a href="{{ route('akademik', ['unitID' => $prodis->id, 'categoryID' => '17']) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2019/2020 Ganjil</a>
                            </li>
                            <li class="link">
                                <a href="{{ route('akademik', ['unitID' => $prodis->id, 'categoryID' => '40']) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2019/2020 Genap</a>
                            </li>
                            <li class="link">
                                <a href="{{ route('akademik', ['unitID' => $prodis->id, 'categoryID' => '156']) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2020/2021 Ganjil</a>
                            </li>
                            <li class="link">
                                <a href="{{ route('akademik', ['unitID' => $prodis->id, 'categoryID' => '207']) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2020/2021 Genap</a>
                            </li>
                            <li class="link">
                                <a href="{{ route('akademik', ['unitID' => $prodis->id, 'categoryID' => '239']) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2021/2022 Ganjil</a>
                            </li>
                            <li class="link">
                                <a href="{{ route('akademik', ['unitID' => $prodis->id, 'categoryID' => '359']) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2021/2022 Genap</a>
                            </li>
                            <li class="link">
                                <a href="{{ route('akademik', ['unitID' => $prodis->id, 'categoryID' => '439']) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2022/2023 Ganjil</a>
                            </li>
                            <li class="link">
                                <a href="{{ route('akademik', ['unitID' => $prodis->id, 'categoryID' => '488']) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2022/2023 Genap</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        </div> <!-- /col bg-white -->
    </div>
@endsection