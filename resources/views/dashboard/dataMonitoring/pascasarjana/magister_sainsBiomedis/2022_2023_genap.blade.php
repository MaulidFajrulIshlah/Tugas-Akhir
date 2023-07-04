@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Mata Kuliah')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Data Monitoring Akademik</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Data Monitoring Akademik</li>
        <li class="breadcrumb-item active">Fakultas Pascasarjana</li>
        <li class="breadcrumb-item active">Magister Sains Biomedis</li>
        <li class="breadcrumb-item active">2022_2023 Genap</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <div class="row g-0 my-3">
                <div class="row mb-4">
                    <h5 class="mb-2 fw-bold text">Data Monitoring Akademik</h5>
                    <span class="fs-6 mb-3 text">Semester 2022/2023 Genap - Magister Sains Biomedis</span>
                    {{-- Table --}}
                    <div class="container mt-3">
                        <table id="data-matkul" class="table table-bordered table-hover cell-border">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col" class="text">No</th>
                                    <th scope="col" class="text">Nama Mata Kuliah</th>
                                    <th scope="col" class="text">Pengumpulan</th>
                                    <th scope="col" class="text">Kegiatan Belajar</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script>
          function updateData() {
            const matkul = [];
            let nomor = 1;
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_course_get_courses&moodlewsrestformat=json',
                cache: true,

                success: function (data, status, xhr) {
                    for (let i = 0; i < data.length; i++) {
                        if (data[i]['categoryid'] == 537) {
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
                            { title: 'Kegiatan Belajar', data: null},
                            { title: 'Pengumpulan', data: null,
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
@endsection
