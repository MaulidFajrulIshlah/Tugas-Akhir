@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Mata Kuliah')
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
                        @if($prodis->id == 7)
                        <li class="link">
                            <a href="{{ route('mataKuliah', ['unitID' => $prodis->id, 'categoryID' => '46']) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                        </li>
                        @continue
                    @endif
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

      