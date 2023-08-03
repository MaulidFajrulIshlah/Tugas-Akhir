@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Beranda')
@section('content')
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Beranda</h5>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Beranda</li>
        </ol>

    <div class="row g-3 my-3">
        
        @yield('card')
        {{-- @yield('card.dekanat_tendik_fkg') --}}

        @can('admin')
        {{-- Table Status Suspend --}}
            <div class="row my-5" id="loading">
            <h5 class="mb-3 fw-bold title">Daftar Pengguna Dengan Status Suspend</h5>
                <div class="content mx-2 col bg-white p-3 rounded card">
                    <table id="data-suspend" class="table table-bordered table-hover cell-border">
                        <thead class="table-success">
                            <tr class="text">
                                <th scope="col" class="text" width="50">No</th>
                                <th scope="col" class="text">Nama Pengguna</th>
                                <th scope="col" class="text">Nama Lengkap</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div> <!--col-->
            </div> <!--row my-5-->

            <script src="{{ asset('js/suspend.js') }}"></script>

        @endcan

    </div> <!-- /row g-3 my-3 -->
    
@endsection