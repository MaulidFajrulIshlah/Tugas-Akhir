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
                        {{-- Field Username --}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="username" class="form-label fw-bolder">Username</label> 
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control read_only" id="username"
                                        name="username" autocomplete="off" readonly value="{{  $userData->username }}"> 
                                    </div>
                            </div>
                        </div>

                        {{-- Field Email --}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email" class="form-label fw-bolder">Email</label> 
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control read_only" id="email"
                                        name="email" autocomplete="off" readonly value="{{ $userData->email }}"> 
                                    </div>
                            </div>
                        </div>
                        
                        {{-- Field Role --}}
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="id_role" class="form-label fw-bolder">Peranan</label> 
                                    <div class="form-control-wrap">
                                        <select class="form-select box-shadow" name="id_role" id="id_role">
                                            @if ($userData->id_role != null)
                                                <option value="{{ $userData->id_role }}">{{ $userData->role->nama }}</option>
                                                @else
                                                    <option value="" >-- Pilih Peranan --</option>
                                            @endif

                                            @foreach ($role as $roles)
                                                @if ($userData->id_role === null)
                                                    <option value="{{ $roles->id }}">{{ $roles->nama }}</option>
                                                    @elseif ($userData->role->nama !== $roles->nama)
                                                        <option value="{{ $roles->id }}">{{ $roles->nama }}</option>  
                                                @endif
                                            @endforeach
                                        </select> 
                                    </div>
                            </div>
                        </div>
                            
                        {{-- Field Fakultas --}}
                        <div class="col-lg-6" id="fakultasField">
                            <div class="form-group">
                                <label for="id_fakultas" class="form-label fw-bolder">Fakultas</label> 
                                    <div class="form-control-wrap">
                                        <select class="form-select box-shadow" name="id_fakultas" id="id_fakultas">
                                            @if ($userData->id_fakultas != null)
                                                <option value="{{ $userData->id_fakultas }}">{{ $userData->fakultas->nama }}</option>
                                                @else
                                                    <option value="" >-- Pilih Fakultas --</option>
                                            @endif

                                            @foreach ($fakultas as $fakultass)
                                                @if ($userData->id_fakultas === null)
                                                    <option value="{{ $fakultass->id }}">{{ $fakultass->nama }}</option>
                                                    @elseif ($userData->fakultas->nama !== $fakultass->nama)
                                                        <option value="{{ $fakultass->id }}">{{ $fakultass->nama }}</option>  
                                                @endif
                                            @endforeach
                                        </select> 
                                    </div>
                            </div>
                        </div>

                        {{-- Field Prodi --}}
                        <div class="col-lg-6" id="prodiField">
                            <div class="form-group">
                                <label for="id_prodi" class="form-label fw-bolder">Program Studi</label> 
                                    <div class="form-control-wrap">
                                        <select class="form-select box-shadow" name="id_prodi" id="id_prodi">
                                            @if ($userData->id_prodi != null)
                                                <option value="{{ $userData->id_prodi }}">{{ $userData->prodi->nama }}</option>
                                                @else
                                                    <option value="" >-- Pilih Program Studi --</option>
                                            @endif

                                            @foreach ($prodi as $prodis)
                                                @if ($userData->id_prodi === null)
                                                    <option value="{{ $prodis->id }}">{{ $prodis->nama }}</option>
                                                    @elseif ($userData->prodi->nama !== $prodis->nama)
                                                        <option value="{{ $prodis->id }}">{{ $prodis->nama }}</option>  
                                                @endif
                                            @endforeach
                                        </select> 
                                    </div>
                            </div>
                        </div>

                        {{-- Buttons --}}
                        <div class="my-4 button-group">
                            <button type="button" onclick="backurl()" class="btn btn-secondary mt-3">Kembali</button>
                            <button type="submit" onclick="return confirmSave()" class="btn btn-primary btn-success mt-3 mr-2">Simpan</button>
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

        function confirmSave() {
            return confirm("Apakah Anda yakin?");
        }

        document.addEventListener('DOMContentLoaded', function () {
            const selectPeran = document.getElementById('id_role');
            const divFakultasField = document.getElementById('fakultasField');
            const divProdiField = document.getElementById('prodiField');

            // saat halaman pertama kali dimuat, cek nilai terpilih
            const selectedPeran = selectPeran.value;
            console.log(selectedPeran);

            if (selectedPeran === '1') {
                divFakultasField.style.display = 'none';
                divProdiField.style.display = 'none';
            } else {
                divFakultasField.style.display = 'block';
                divProdiField.style.display = 'block';
            }

            // tambahkan event listener ketika user memilih peran
            selectPeran.addEventListener('change', function () {
                // ambil nilai terpilih
                const selectedPeran = selectPeran.value;
                console.log(selectedPeran);

                if (selectedPeran === '1') {
                    divFakultasField.style.display = 'none';
                    divProdiField.style.display = 'none';
                } else {
                    divFakultasField.style.display = 'block';
                    divProdiField.style.display = 'block';
                }
            });

            
        });
    </script>
@endsection