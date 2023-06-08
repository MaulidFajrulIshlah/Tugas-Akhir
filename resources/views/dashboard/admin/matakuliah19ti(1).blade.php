@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Mahasiswa')
@section('content')
    <!-- Route -->

    <div class="container-fluid px-4">
        <h6 class="fw-bold">Mata Kuliah</h6>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
                <!-- <li class="breadcrumb-item"><a href="matakuliah.html">Mata Kuliah</a></li>
                <li class="breadcrumb-item"><a href="matakuliahfti.html">Fakultas Teknologi Informasi</a></li>
                <li class="breadcrumb-item"><a href="matakuliahti.html">Teknik Informatika</a></li> -->
                <!-- belum ada routenya -->
            </ol>

    
            <div class="col px-2 bg-white">
        <div class="row g-0 my-0">

    <div class="row my-4">
        <h4 class="fs-4 mb-1">Mata Kuliah</h4>
        <h5 class="fs-6 mb-3 text-muted">Semester 2019/2020 Ganjil - Teknik Informatika</h5>

     <!-- Akun Card -->
     <div class="card text-black bg-light px-1">
        <div class="card-body">
            <h6 class="card-title fs-6">Jumlah Daftar Mata Kuliah</h6>
            <p class="card-text">800 Mata Kuliah</p>
        </div>
        <div class="card-footer">
            <small class="text-danger">Pembaruan terakhir 3 menit lalu</small>
        </div> 
    </div><!-- End Akun Card -->

    <div class="container mt-4">
        <table class="table table-bordered table-hover">
            <thead class="table-success">
              <tr>
                <th>No</th>
                <th>Daftar Mata Kuliah</th>
                <th>Halaman Mata Kuliah</th>
                <th>Halaman Mata Kuliah Lengkap</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                  <td><?=matkul[i] ?></td>
                  <td>Dasar Dasar Pemrograman</td>
                  <td>100 Halaman</td>
                  <td>95 Halaman</td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>Basis Data</td>
                    <td>60 Halaman</td>
                    <td>77 Halaman</td>
                  </tr>
                <tr>
                    <td>3.</td>
                    <td>Agama 1</td>
                    <td>124 Halaman</td>
                    <td>89 Halaman</td>
                  </tr>
                <tr>
                    <td>4.</td>
                    <td>Pemrograman Berbasis Platform</td>
                    <td>78 Halaman</td>
                    <td>90 Halaman</td>
                  </tr>
                  <tr>
                    <td>5.</td>
                    <td>Data Mining</td>
                    <td>80 Halaman</td>
                    <td>66 Halaman</td>
                  </tr>
                  <tr>
                    <td>6.</td>
                    <td>Bahasa Indonesia</td>
                    <td>146 Halaman</td>
                    <td>78 Halaman</td>
                  </tr>
                  <tr>
                    <td>7.</td>
                    <td>Aljabar Linier</td>
                    <td>57 Halaman</td>
                    <td>81 Halaman</td>
                  </tr>
                  <tfoot>
                    <tr>
                      <th colspan="2">Total:</th>
                      <th>490 Halaman</th>
                      <th>340 Halaman</th>
                    </tr>
    </div> <!--row my-4-->
    </div> <!-- /row g-0 my-0 -->
    </div> <!-- /col bg-white -->
       @endsection