@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Mata Kuliah')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Mata Kuliah</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Mata Kuliah</li>
        <li class="breadcrumb-item active">Fakultas Pascasarjana</li>
        <li class="breadcrumb-item active">Magister Manajemen</li>
        <li class="breadcrumb-item active">2020_2021 Genap</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">

            <div class="row g-0">
                <div class="row mb-3">
                    <h5 class="mb-2 mt-3 fw-bold text">Mata Kuliah</h5>
                    <span class="fs-6 mb-3 text">Semester 2020/2021 Genap - Magister Manajemen</span>


                    <div class="col-xl-4 col-md-6 col-11 col-lg-5 my-3">
                        <div class="card info-card akun-card">
                            <div class="card-body">
                                <div class="ps-1">
                                    <div class="header">
                                        <h5 class="card-title fw-bold">Jumlah Daftar Mata Kuliah</h5>
                                    </div>
                                    <h5 class="fw-bold mt-3" id="jumlah-matkul"></h5>
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
                        if (data[i]['categoryid'] == 204) {
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
                            { title: 'Daftar Mata Kuliah', data: 'matakuliah' },
                            { title: 'Halaman Mata Kuliah Lengkap', data: null,
                                render: function (data, type, row) {
                                    return '';
                                }
                            },
                        ],
                    });

                    $('#jumlah-matkul').text(matkul.length);

                    // waktu saat ini
                    const currentTime = new Date();
                    // Menambahkan 1 jam
                    const updateDateTime = new Date(currentTime.getTime() + (1000 * 60 * 60));
                    // Selisih waktu dalam milidetik
                    let elapsedTime = updateDateTime - currentTime;

                    // menghitung jam dan menit yang berlalu
                    const hours = Math.floor(elapsedTime / (1000 * 60 * 60));
                    const minutes = Math.floor((currentTime % (1000 * 60 * 60)) / (1000 * 60));

                    console.log(currentTime, updateDateTime, elapsedTime, hours, minutes);

                    let elapsedTimeString = '';

                    if (hours === 1 && minutes === 0) {
                        elapsedTimeString = hours + ' jam yang lalu';
                    } else {
                        elapsedTimeString = minutes + ' menit yang lalu';
                    }

                    // memperbarui teks dengan keterangan pembaruan data
                    document.getElementById('last-updated').textContent = "Pembaruan data terjadi " + elapsedTimeString;

                },
                error: function (xhr, status, error) {
                    // penanganan kesalahan saat permintaan AJAX gagal
                    console.log('Error:', error);
                }
            });
        }

        $(document).ready(function() {
            const table = $('#data-matkul').DataTable();
    
            updateData();
            
            // Jadwalkan pembaruan data sesuai dengan waktu pembaruan berikutnya setiap 1 jam
            const intervalID = setInterval(updateData, 60 * 60 * 1000);
        });
    </script>
@endsection
