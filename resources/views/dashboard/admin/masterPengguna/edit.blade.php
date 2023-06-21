@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Master Data')
@section('content')
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Master Data</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('masterUser') }}">Master Data</a></li>
        <li class="breadcrumb-item active">Pengguna</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white p-3 rounded card" id="wrapper-content">
            <div class="row mb-4 content">
                <h5 class="mb-2 fw-bold text">Edit Data Pengguna</h5>
                <span class="fs-6 mb-3 text">Silahkan Ubah Data Pengguna</span>
                <hr />
                {{-- Form --}}
                <form method="POST" action="{{ route('prosesUpdate', $userData->id) }}" class="my-4">
                    @csrf
                    {{-- Pesan Failed --}}
                    @if(session()->has('failed'))
                        <div class="alert alert-danger" style="width:50%" role="alert">
                            {{ session('failed') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- Pesan Sukses --}}
                    @if(session()->has('success'))
                        <div class="alert alert-success" style="width:50%" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="row g-4 col-12">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="id" class="form-label fw-bolder">ID</label> 
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control read_only" id="id"
                                        name="id" autocomplete="off" readonly  value="{{  $userData->id }}"> 
                                    </div>
                            </div>
                        </div>
                        {{-- Field Nama --}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="name" class="form-label fw-bolder">Nama</label> 
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control read_only" id="name"
                                        name="name" autocomplete="off" readonly value="{{  $userData->nama }}"> 
                                    </div>
                            </div>
                        </div>
                        {{-- Field Username --}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="username" class="form-label fw-bolder">Username</label> 
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control box-shadow" id="username"
                                        name="username" autocomplete="off" value="{{  $userData->username }}"> 
                                    </div>
                            </div>
                        </div>
                        {{-- Field Role --}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="id_jabatan" class="form-label fw-bolder">Jabatan</label> 
                                    <div class="form-control-wrap">
                                        <select class="form-select box-shadow" name="id_jabatan" id="id_jabatan">
                                            <option value="{{ $userData->id_jabatan }}">{{ $userData->jabatan->nama_jabatan }}</option>
                                                @foreach ($jabatan as $jabatans)
                                                    @if ($userData->jabatan->nama_jabatan !== $jabatans->nama_jabatan)
                                                        <option value="{{ $jabatans->id }}">{{ $jabatans->nama_jabatan }}</option>
                                                    @endif
                                                @endforeach
                                        </select> 
                                    </div>
                            </div>
                        </div>
                        {{-- Buttons --}}
                        <div class="my-4 button-group">
                            <button type="button" onclick="backurl()" class="btn btn-secondary mt-3">Kembali</button>
                            <button type="submit" class="btn btn-primary btn-success mt-3 mr-2">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function backurl() {
            window.location.href = '/masterdata/pengguna';
        }
    </script>
@endsection