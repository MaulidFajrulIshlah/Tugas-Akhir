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
                <h5 class="mb-2 fw-bold text">Tambah Data Pengguna</h5>
                <span class="fs-6 mb-3 text">Silahkan Tambah Data Pengguna</span>
                <hr />
                {{-- Form --}}
                <form method="POST" action="{{ route('prosesCreate') }}" class="my-2">
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
                                    <div class="form-control-wrap box-shadow">
                                        <input type="text" class="form-control read_only" id="id" 
                                        name="id" autocomplete="off" readonly>
                                        
                                    </div>
                            </div>
                        </div>
                        {{-- Field Nama --}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama" class="form-label fw-bolder">Nama</label> 
                                    <div class="form-control-wrap box-shadow">
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        name="nama" autocomplete="off" value="{{  old('nama') }}"> 
                                        @error('nama')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                            </div>
                        </div>
                        {{-- Field Username --}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="username" class="form-label fw-bolder">Username</label> 
                                    <div class="form-control-wrap box-shadow">
                                        <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username"
                                        name="username" autocomplete="off" value="{{  old('username') }}">
                                        @error('username')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror 
                                    </div>
                            </div>
                        </div>
                        {{-- Field Password --}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="password" class="form-label fw-bolder">Password</label> 
                                    <div class="form-control-wrap box-shadow">
                                        <input type="text" class="form-control  @error('password') is-invalid @enderror" id="password"
                                        name="password" autocomplete="off" value="{{  old('password') }}">
                                        @error('password')
                                            <div class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror 
                                    </div>
                            </div>
                        </div>
                        {{-- Field Role --}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="id_jabatan" class="form-label">Role</label> 
                                    <div class="form-control-wrap">
                                        <select class="form-select box-shadow" name="id_jabatan" id="id_jabatan">
                                            <option value="0">--- Pilih Role ---</option>
                                                @foreach ($jabatan as $jabatans)
                                                    <option value="{{ $jabatans->id }}">{{ $jabatans->nama_jabatan }}</option>
                                                @endforeach
                                        </select> 
                                    </div>
                            </div>
                        </div>
                        {{-- Buttons --}}
                        <div class="my-4 button-group">
                            <button type="button" onclick="backurl()" class="btn btn-secondary mt-3">Kembali</button>
                            <button type="submit" class="btn btn-primary btn-success mt-3 mr-2">Simpan</button>
                            {{-- <a href="#" class="btn btn-success">Simpan</a> --}}
                            {{-- <a href="{{ route('masterUser') }}" class="btn btn-secondary">Batal</a> --}}
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