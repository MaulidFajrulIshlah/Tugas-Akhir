@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Mata Kuliah')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Mata Kuliah</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Mata Kuliah</li>
        <li class="breadcrumb-item active">Fakultas Teknologi Informasi</li>
        <li class="breadcrumb-item active">Teknik Informatika</li>
        <li class="breadcrumb-item active">2019_2020 Genap</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">

            <div class="row g-0 my-3">
                <div class="row mb-4">
                    <h5 class="mb-2 fw-bold text">Mata Kuliah</h5>
                    <span class="fs-6 mb-3 text">Semester 2019/2020 Genap - Teknik Informatika</span>


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
                        <table table class="table table-bordered table-hover">
                            <thead class="table-success">
                                <tr>
                                    <th scope="col" class="text">No</th>
                                    <th scope="col" class="text">Daftar Mata Kuliah</th>
                                    <th scope="col" class="text">Halaman Mata Kuliah Lengkap</th>
                                </tr>
                            </thead>

                            <tbody id="data-matkul"></tbody>
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
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_course_get_courses&moodlewsrestformat=json',
                cache: true,
                
                success: function (data, status, xhr) {
                    for (let i = 0; i < data.length; i++) {
                        if (data[i]['categoryid'] == 39) {
                            const namaMatkul = data[i]['fullname'];
                            matkul.push(namaMatkul);

                        }
                    }
                    const tbody = document.getElementById('data-matkul');

                    // menghapus data
                    tbody.innerHTML = '';

                    // update data
                    matkul.forEach((matakuliah, index) => {
                        const row = document.createElement('tr');
                        const nomorCell = document.createElement('td');
                        const matakuliahCell = document.createElement('td');

                        row.classList.add('text', 'text-justify');
                        nomorCell.classList.add('text', 'text-justify');
                        matakuliahCell.classList.add('text', 'text-justify');

                        // membuat nomor
                        nomorCell.textContent = index + 1;

                        // memasukkan nama-nama mata kuliah
                        matakuliahCell.textContent = matakuliah;

                        // tambahkan nilai ke dalam row
                        row.appendChild(nomorCell);
                        row.appendChild(matakuliahCell);

                        // tambahkan nilai ke dalam tbody
                        tbody.appendChild(row);
                    });
                    document.getElementById('jumlah-matkul').textContent = matkul.length;

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
        // Inisialisasi pembaruan data saat halaman dimuat
        updateData();

        // Jadwalkan pembaruan data sesuai dengan waktu pembaruan berikutnya setiap 1 jam
        const intervalID = setInterval(updateData, 60 * 60 * 1000); 
    </script>
@endsection
