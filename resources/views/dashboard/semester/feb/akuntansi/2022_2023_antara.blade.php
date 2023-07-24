@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Mata Kuliah')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Mata Kuliah</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Mata Kuliah</li>
        <li class="breadcrumb-item active">Fakultas Ekonomi dan Bisnis</li>
        <li class="breadcrumb-item active">Akuntansi</li>
        <li class="breadcrumb-item active">2022_2023 Antara</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">

            <div class="row g-0 my-3">
                <div class="row mb-4">
                    <h5 class="mb-2 fw-bold text">Mata Kuliah</h5>
                    <span class="fs-6 mb-3 text">Semester 2022/2023 Antara - Akuntansi</span>

                    <div class="col-xl-4 col-md-6 col-11 col-lg-5 my-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="ps-1">
                                    <div class="header">
                                        <h5 class="card-title fw-bold">Jumlah Daftar Mata Kuliah</h5>
                                    </div>
                                    <h5 class="fw-bold mt-3" id="jumlah-matkul"></h5>
                                    <h6 class="small pt-1">Yang terdapat di LAYAR</h6>
                                    <div class="card-footer bg-transparent mt-3 ps-0">
                                        <small class="text-danger"><span id="last-updated"></span></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container mt-4">
                        <table  id="data-matkul" table class="table table-bordered table-hover cell-border">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col" class="text">No</th>
                                    <th scope="col" class="text">Daftar Mata Kuliah</th>
                                    <th scope="col" class="text">Halaman Mata Kuliah Lengkap</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <<script src="{{ asset('js/semester/feb/akuntansi/2022_2023_antara.js') }}"></script>
    <script>
        function updateData() {
            const matkul = [];
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_course_get_courses&moodlewsrestformat=json',

                success: function (data, status, xhr) {
                    const includedIds = [563, 564, 565, 566];
                    $.each(data, function(index, item) {
                        if (includedIds.includes(item.categoryid)) {
                        matkul.push(item.fullname);
                        }
                    });
                    $('#data-matkul').empty();

                    // update data
                    $.each(matkul, function(index, matakuliah) {
                        const row = $('<tr>').addClass('text text-justify');
                        const nomorCell = $('<td>').addClass('text text-justify');
                        const matakuliahCell = $('<td>').addClass('text text-justify');

                        nomorCell.text(index + 1);
                        matakuliahCell.text(matakuliah);

                        row.append(nomorCell, matakuliahCell);
                        $('#data-matkul').append(row);
                    });
                    
                    $('#jumlah-matkul').text(matkul.length);

                    updateTime();

                },
                error: function (xhr, status, error) {
                    // penanganan kesalahan saat permintaan AJAX gagal
                    console.log('Error:', error);
                }
            });
        }

        function updateTime(){
            // waktu saat ini
            const currentTime = new Date();
            // Menambahkan 1 jam
            const updateDateTime = new Date(currentTime.getTime() + (1000 * 60 * 60));
            // Selisih waktu dalam milidetik
            let elapsedTime = updateDateTime - currentTime;

            // menghitung jam dan menit yang berlalu
            const hours = Math.floor(elapsedTime / (1000 * 60 * 60));
            const minutes = Math.floor((currentTime % (1000 * 60 * 60)) / (1000 * 60));

            let elapsedTimeString = '';

            if (hours === 1 && minutes === 0) {
                elapsedTimeString = hours + ' jam yang lalu';
            } else {
                elapsedTimeString = minutes + ' menit yang lalu';
            }

            // memperbarui teks dengan keterangan pembaruan data
            $('#last-updated').text("Pembaruan data terjadi " + elapsedTimeString);
        }

        $(document).ready(function () {
            updateData();
            // Jadwalkan pembaruan data sesuai dengan waktu pembaruan berikutnya setiap 1 jam
            const intervalID = setInterval(updateData, 60 * 60 * 1000); 
        });
    </script>
@endsection
