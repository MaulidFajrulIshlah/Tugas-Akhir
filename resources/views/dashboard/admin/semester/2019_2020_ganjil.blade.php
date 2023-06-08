@extends('dashboard.layouts.main')
@section ('title', 'PANDAY | Mahasiswa')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Mata Kuliah</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('beranda') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Mata Kuliah</li>
        <li class="breadcrumb-item active">FTI</li>
        <li class="breadcrumb-item active">TI</li>
        <li class="breadcrumb-item active">2019_2020 Ganjil</li>
    </ol>
    
    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card" id="wrapper-content">

            <div class="row g-0 my-3">
                <div class="row mb-4 content">
                    <h5 class="mb-2 fw-bold text">Mata Kuliah</h5>
                    <span class="fs-6 mb-3 text">Semester 2019/2020 Ganjil - Teknik Informatika</span>


                    <div class="col-xl-4 col-md-6 col-11 col-lg-5 my-3">
                        <div class="card info-card akun-card">
                            <div class="card-body">
                                <div class="ps-1">
                                    <div class="header">
                                        <h5 class="card-title fw-bold">Jumlah Daftar Mata Kuliah</h5>
                                    </div>
                                    <h5 class="fw-bold mt-3">800</h5>
                                    <div class="card-footer bg-transparent mt-3 ps-0">
                                        <small class="text-danger">Pembaruan terakhir 3 menit lalu</small>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container my-4">
                        <table table class="table table-bordered table-hover" >
                            <thead class="table-success">
                                <tr>
                                    <th scope="col" class="text">No</th>
                                    <th scope="col" class="text">Daftar Mata Kuliah</th>
                                    <th scope="col" class="text">Halaman Mata Kuliah</th>
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

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <script>
        const matkul = [];
        $.ajax({
            type: 'GET',
            dataType:"json",
            url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_course_get_courses&moodlewsrestformat=json',
            
            success: function (data, status, xhr) {
                for(let i = 0; i < data.length; i++){
                    if(data[i]['categoryid'] == 16 ){
                        matkul.push(data[i]['fullname']);
                        
                    }
                }

                const tbody = document.getElementById('data-matkul');

                // Membuat baris baru untuk setiap matkul
                matkul.forEach((matakuliah, index) => {
                    // Membuat elemen-elemen kolom
                    const row = document.createElement('tr');
                    const nomorCell = document.createElement('td');
                    const matakuliahCell = document.createElement('td');

                    row.classList.add('text', 'text-justify');
                    nomorCell.classList.add('text', 'text-justify');
                    matakuliahCell.classList.add('text', 'text-justify');

                    // Mengisi nilai pada kolom
                    nomorCell.textContent = index + 1;
                    matakuliahCell.textContent = matakuliah;

                    // Menambahkan kolom ke dalam baris
                    row.appendChild(nomorCell);
                    row.appendChild(matakuliahCell);

                    // Menambahkan baris ke dalam tbody
                    tbody.appendChild(row);
                });

            console.log(matkul);
            }// success: function
        });
    </script>
@endsection