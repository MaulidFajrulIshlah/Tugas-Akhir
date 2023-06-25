@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Mata Kuliah')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Mata Kuliah</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Mata Kuliah</li>
        <li class="breadcrumb-item active">Fakultas Kedokteran</li>
        <li class="breadcrumb-item active">Kedokteran Program Sarjana</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <h5 class="m-3 mt-4 mb-0 fw-bold text">Daftar Kurikulum</h5>
            <hr>
            
        <div class="row g-0">
            <div class="row">
                <ul class="semester">
                    @foreach ($prodi as $prodis)
                        @if($prodis->id == 6)
                            <li class="link">
                                <a href="{{ route('mataKuliah', ['unitID' => $prodis->id, 'categoryID' => '41']) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>Kurikulum 2013</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
        </div> <!-- /col bg-white -->
    </div>
@endsection