@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Dosen')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Akademik</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Akademik</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <h5 class="m-3 mt-4 mb-0 fw-bold text">Fakultas dan Prodi Universitas YARSI</h5>
            <hr>
            <div class="row g-0 mb-2">
                <div class="row">
                    <ul class="semester mb-2">
                        @foreach ($prodi as $prodis)
                            @can('dekanat-tendik', $prodis->id_fakultas)
                                <li class="link">
                                    <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                </li>
                                    
                                @elsecan('admin')
                                    <li class="link">
                                        <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                    </li>

                                @elsecan('prodi-magister-kenotariatan')
                                    @if ($prodis->id == 1)
                                        <li class="link">
                                            <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                        </li>
                                    @endif

                                @elsecan('prodi-magister-manajemen')
                                    @if ($prodis->id == 2)
                                        <li class="link">
                                            <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                        </li>
                                    @endif

                                @elsecan('prodi-magister-sainsBiomedis')
                                    @if ($prodis->id == 3)
                                        <li class="link">
                                            <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                        </li>
                                    @endif

                                @elsecan('prodi-magister-adminRS')
                                    @if ($prodis->id == 4)
                                        <li class="link">
                                            <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                        </li>
                                    @endif

                                @elsecan('prodi-doktor-sainsBiomedis')
                                    @if ($prodis->id == 5)
                                        <li class="link">
                                            <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                        </li>
                                    @endif

                                @elsecan('prodi-kedokteran')
                                    @if ($prodis->id == 6)
                                        <li class="link">
                                            <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                        </li>
                                    @endif

                                @elsecan('prodi-profesi-dokter')
                                    @if ($prodis->id == 7)
                                        <li class="link">
                                            <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                        </li>
                                    @endif

                                @elsecan('prodi-kedokteranGigi')
                                    @if ($prodis->id == 8)
                                        <li class="link">
                                            <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                        </li>
                                    @endif

                                @elsecan('prodi-profesi-kedokteranGigi')
                                    @if ($prodis->id == 9)
                                        <li class="link">
                                            <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                        </li>
                                    @endif

                                @elsecan('prodi-ti')
                                    @if ($prodis->id == 10)
                                        <li class="link">
                                            <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                        </li>
                                    @endif

                                @elsecan('prodi-ip')
                                    @if ($prodis->id == 11)
                                        <li class="link">
                                            <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                        </li>
                                    @endif

                                @elsecan('prodi-manajemen')
                                    @if ($prodis->id == 12)
                                        <li class="link">
                                            <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                        </li>
                                    @endif

                                @elsecan('prodi-akuntansi')
                                    @if ($prodis->id == 13)
                                        <li class="link">
                                            <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                        </li>
                                    @endif

                                @elsecan('prodi-hukum')
                                    @if ($prodis->id == 14)
                                        <li class="link">
                                            <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                        </li>
                                    @endif

                                @elsecan('prodi-psikologi')
                                    @if ($prodis->id == 15)
                                        <li class="link">
                                            <a href="{{ route('akademik', ['unitID' => $prodis->id]) }}" class="text fs-5 text-center"><i class="fas fa-caret-right m-3"></i>{{ $prodis->fakultas->nama_fakultas }} / {{ $prodis->nama_prodi }}</a>
                                        </li>
                                    @endif 
                            @endcan
                        @endforeach
                    </ul>
                </div>
            </div>
        </div> <!-- /col bg-white -->
    </div>
@endsection