@extends('dashboard.layouts.main')
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
            @include('dashboard.layouts.navFakultas')
            <div class="row g-0 my-2">
                <div class="row">
                    <ul class="semester my-2">
                        <li class="link">
                            <a href="" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2019/2020 Ganjil</a>
                        </li>
                        <li class="link">
                            <a href="" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>2019/2020 Genap</a>
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
@endsection