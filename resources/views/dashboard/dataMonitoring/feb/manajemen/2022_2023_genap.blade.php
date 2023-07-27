@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Mata Kuliah')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Data Monitoring Akademik</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('akademik') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Monitoring Akademik</li>
        <li class="breadcrumb-item active">Fakultas Ekonomi dan Bisnis</li>
        <li class="breadcrumb-item active">Manajemen</li>
        <li class="breadcrumb-item active">2022_2023 Genap</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <div class="row g-0 my-3">
                <div class="row mb-4">
                    <h5 class="mb-2 fw-bold text">Data Monitoring Akademik</h5>
                    <span class="fs-6 mb-3 text">Semester 2022/2023 Genap - Manajemen</span>
<<<<<<< Updated upstream
                    {{-- Table --}}
                    <div class="container mt-3">
                    @include('dashboard.layouts.table_dataMonitoring')
                    </div>
=======
<<<<<<< Updated upstream
                   {{-- Table --}}
                   <div class="container mt-3">
                    <table id="data-matkul" class="table table-bordered table-hover cell-border">
                        <thead class="table-success">
                            <tr>
                                <th rowspan="2" scope="col" class="text" style="text-align: center;">No</th>
                                <th rowspan="2" scope="col" class="text" style="text-align: center;">Nama Mata Kuliah</th>
                                <th colspan="2" scope="col" class="text" style="text-align: center;">Pengumpulan</th>
                                <th colspan="16" scope="col" class="text merged-cell" style="text-align: center;">Kegiatan Belajar</th>
                            </tr>
                            <tr>
                                <th style="text-align: center;">Tugas</th>
                                <th style="text-align: center;">Kuis</th>
                                <th style="text-align: center;">P1</th>
                                <th style="text-align: center;">P2</th>
                                <th style="text-align: center;">P3</th>
                                <th style="text-align: center;">P4</th>
                                <th style="text-align: center;">P5</th>
                                <th style="text-align: center;">P6</th>
                                <th style="text-align: center;">P7</th>
                                <th style="text-align: center;">P7</th>
                                <th style="text-align: center;">P9</th>
                                <th style="text-align: center;">P10</th>
                                <th style="text-align: center;">P11</th>
                                <th style="text-align: center;">P12</th>
                                <th style="text-align: center;">P13</th>
                                <th style="text-align: center;">P14</th>
                                <th style="text-align: center;">P15</th>
                                <th style="text-align: center;">P16</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
=======
                    {{-- Table --}}
                    <div class="container mt-3">
                        <table id="data-matkul" class="table table-bordered table-hover cell-border">
                             <thead class="table-success">
                                 <tr>
                                     <th rowspan="2" scope="col" class="text" style="text-align: center;">No</th>
                                     <th rowspan="2" scope="col" class="text" style="text-align: center;">Nama Mata Kuliah</th>
                                     <th colspan="2" scope="col" class="text" style="text-align: center;">Pengumpulan</th>
                                     <th colspan="14" scope="col" class="text merged-cell" style="text-align: center;">Kegiatan Belajar</th>
                                 </tr>
                                 <tr>
                                    <th style="text-align: center;">Tugas</th>
                                    <th style="text-align: center;">Kuis</th>
                                    <th style="text-align: center;">P1</th>
                                    <th style="text-align: center;">P2</th>
                                    <th style="text-align: center;">P3</th>
                                    <th style="text-align: center;">P4</th>
                                    <th style="text-align: center;">P5</th>
                                    <th style="text-align: center;">P6</th>
                                    <th style="text-align: center;">P7</th>
                                    <th style="text-align: center;">P7</th>
                                    <th style="text-align: center;">P9</th>
                                    <th style="text-align: center;">P10</th>
                                    <th style="text-align: center;">P11</th>
                                    <th style="text-align: center;">P12</th>
                                    <th style="text-align: center;">P13</th>
                                    <th style="text-align: center;">P14</th>
                                </tr>
                            </thead>
                            <tbody> </tbody>
                        </table>
                    </div>
>>>>>>> Stashed changes
>>>>>>> Stashed changes
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/dataMonitoring/feb/manajemen/2022_2023_genap.js') }}"></script>

<<<<<<< Updated upstream
=======
                success: function (data, status, xhr) {
                    for (let i = 0; i < data.length; i++) {
                        if (data[i]['categoryid'] == 494 || data[i]['categoryid'] == 495 || data[i]['categoryid'] == 496 || data[i]['categoryid'] == 497) {
                            const namaMatkul = data[i]['fullname'];
                            matkul.push({
                                nomor: nomor++,
                                matakuliah: namaMatkul
                            });
                        }
                    }

                    const table = $('#data-matkul').DataTable({
                        destroy: true,
                        processing: true,
                        data: matkul,
                        columns: [
                            { title: 'No', data: 'nomor' },
                            { title: 'Nama Mata Kuliah', data: 'matakuliah' },
                            { title: 'Tugas', data: null},
                            { title: 'Kuis', data: null},
                            { title: 'P1', data: null},
                            { title: 'P2', data: null},
                            { title: 'P3', data: null},
                            { title: 'P4', data: null},
                            { title: 'P5', data: null},
                            { title: 'P6', data: null},
                            { title: 'P7', data: null},
                            { title: 'P8', data: null},
                            { title: 'P9', data: null},
                            { title: 'P10', data: null},
                            { title: 'P11', data: null},
                            { title: 'P12', data: null},
                            { title: 'P13', data: null},
                            { title: 'P14', data: null,
                                render: function (data, type, row) {
                                    return '';
                                }
                            },
                        ],
                    });

                }
            });
        }
        $(document).ready(function() {
            const table = $('#data-matkul').DataTable();
            updateData();
        });
        </script>
>>>>>>> Stashed changes
@endsection
