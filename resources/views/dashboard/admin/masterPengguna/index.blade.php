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
                    <h5 class="mb-2 fw-bold text">Data Pengguna</h5>
                    <span class="fs-6 mb-3 text">Berikut adalah data pengguna dashboard PANDAY</span>
                    <hr /> 
                    {{-- Pesan Sukses --}}
                    @if(session()->has('success'))
                        <div class="alert alert-success mx-2" style="width:50%" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    {{-- Button Create --}}
                    <div class="container my-2">
                        <button class="btn btn-success" id="buttonCreate" onclick="createurl()"><i class="fa fa-plus pe-1"></i>Tambah Pengguna</button>
                        {{-- <a href="{{ route ('createUser') }}" class="btn btn-success"><i class="fa fa-plus pe-1"></i>Tambah
                            Pengguna</a> --}}
                    </div>
                    {{-- Table --}}
                    <div class="container mt-3">
                        <table class="table table-master table-bordered table-hover">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col" class="text">No</th>
                                    <th scope="col" class="text">Nama</th>
                                    <th scope="col" class="text">Username</th>
                                    <th scope="col" class="text">Role</th>
                                    <th scope="col" class="text">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userData as $users)
                                    <tr>
                                        <td class="text">{{ $loop->iteration }}</td>
                                        <td class="text">{{ $users->nama}}</td>
                                        <td class="text">{{ $users->username }}</td>
                                        <td class="text">{{ $users->jabatan->nama_jabatan }}</td>
                                        <td class="text">
                                            {{-- Buttons --}}
                                            <div class="form-inline btn-action-group">
                                                <a href="{{ route('updateUser', $users->id) }}" class="btn btn-primary btn-edit me-1">
                                                    <i class="fas fa-edit pe-1"></i>
                                                    Edit
                                                </a>
                                                <a href=""{{ route('deleteUser', $users->id) }}" class="btn btn-danger btn-delete">
                                                    <i class="fas fa-times pe-1"></i>
                                                    Hapus
                                                </a>  
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function createurl() {
                window.location.href = '/masterdata/pengguna/create';
            }
        </script>
@endsection