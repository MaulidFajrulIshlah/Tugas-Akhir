@extends('dashboard.layouts.main')
@section('title', 'PANDAY | Mata Kuliah')
@section('content')
    <!-- Route -->
    <h5 class="fw-bold" style="margin-top: 40px; font-weight: 400;">Data Monitoring Akademik</h5>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('akademik') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Akademik</li>
        <li class="breadcrumb-item active">Fakultas Teknologi Informasi</li>
        <li class="breadcrumb-item active">Teknik Informatika</li>
        <li class="breadcrumb-item active">2020_2021 Genap</li>
    </ol>

    <div class="row g-3 my-3">
        <div class="col mx-2 bg-white rounded card content" id="wrapper-content">
            <div class="row g-0 my-3">
                <div class="row mb-4">
                    <h5 class="mb-2 fw-bold text">Data Monitoring Akademik</h5>
                    <span class="fs-6 mb-3 text">Semester 2020/2021 Genap - Teknik Informatika</span>
                    {{-- Table --}}
                    <div class="container mt-3">
<<<<<<< Updated upstream
                        @include('dashboard.layouts.table_dataMonitoring')
=======
                        <table id="data-matkul" class="table table-bordered table-hover cell-border">
                            <thead class="table-success">
                                <tr>
                                    <th rowspan="2" scope="col" class="text" style="text-align: center;">No</th>
                                    <th rowspan="2" scope="col" class="text" style="text-align: center;">Nama Mata Kuliah</th>
                                    <th colspan="2" scope="col" class="text" style="text-align: center;">Pengumpulan</th>
<<<<<<< Updated upstream
                                    <th colspan="16" scope="col" class="text merged-cell" style="text-align: center;">Kegiatan Belajar</th>
=======
                                    <th colspan="17" scope="col" class="text merged-cell" style="text-align: center;">Kegiatan Belajar</th>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
=======
                                    <th style="text-align: center;">P17</th>
>>>>>>> Stashed changes
                                </tr>
                            </thead>

                            <tbody></tbody>
                        </table>
>>>>>>> Stashed changes
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('js/dataMonitoring/fti/ti/2020_2021_genap.js') }}"></script>

<<<<<<< Updated upstream
=======
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script>
    async function getResourceData(idMatkul) {
  const resources = await $.ajax({
    type: 'GET',
    dataType: 'json',
    url: `https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=mod_resource_get_resources_by_courses&moodlewsrestformat=json&courseids[0]=${idMatkul}`,
  });

  return resources;
}

async function getQuizData(idMatkul) {
  const quizzes = await $.ajax({
    type: 'GET',
    dataType: 'json',
    url: `https://layar.yarsi.ac.id/webservice/rest/server.php?wsfunction=mod_quiz_get_quizzes_by_courses&wstoken=463cfb78c5acc92fbed0656c2aec27b4&moodlewsrestformat=json&courseids[0]=${idMatkul}`,
  });

  return quizzes;
}

async function getAssignmentData(idMatkul) {
  const assignments = await $.ajax({
    type: 'GET',
    dataType: 'json',
    url: `https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=mod_assign_get_assignments&moodlewsrestformat=json&courseids[0]=${idMatkul}`,
  });

  return assignments;
}

async function updateData() {
  const matkul = [];
  let nomor = 1;
  const courses = await $.ajax({
    type: 'GET',
    dataType: 'json',
    url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_course_get_courses&moodlewsrestformat=json',
    cache: true,
  });

  for (let i = 0; i < courses.length; i++) {
    if (courses[i]['categoryid'] == 206) {
      const namaMatkul = courses[i]['fullname'];
      const idMatkul = courses[i]['id'];

      let jumlahKuis = 0;
      let jumlahPengumpulan = 0;
      const kegiatanPerPertemuan = Array(17).fill(0); // Inisialisasi array untuk kegiatan belajar per pertemuan

      // Menghitung jumlah kuis
      const quizzes = await getQuizData(idMatkul);
      jumlahKuis = quizzes.quizzes.length;

      const assignments = await getAssignmentData(idMatkul);

      // Menghitung jumlah tugas
      if (assignments.courses && assignments.courses.length > 0) {
        jumlahPengumpulan = assignments.courses[0].assignments.length;
      }

      const resources = await getResourceData(idMatkul);

      // Menghitung jumlah kegiatan belajar per pertemuan berdasarkan section
      resources.resources.forEach((resource) => {
        const section = parseInt(resource.section); // Mengambil nomor section dari atribut 'section'
        if (!isNaN(section) && section >= 1 && section <= 17) {
          kegiatanPerPertemuan[section - 1]++;
        }
      });

      matkul.push({
        nomor: nomor++,
        matakuliah: namaMatkul,
        kuis: jumlahKuis,
        pengumpulan: jumlahPengumpulan,
        P1: kegiatanPerPertemuan[0],
        P2: kegiatanPerPertemuan[1],
        P3: kegiatanPerPertemuan[2],
        P4: kegiatanPerPertemuan[3],
        P5: kegiatanPerPertemuan[4],
        P6: kegiatanPerPertemuan[5],
        P7: kegiatanPerPertemuan[6],
        P8: kegiatanPerPertemuan[7],
        P9: kegiatanPerPertemuan[8],
        P10: kegiatanPerPertemuan[9],
        P11: kegiatanPerPertemuan[10],
        P12: kegiatanPerPertemuan[11],
        P13: kegiatanPerPertemuan[12],
        P14: kegiatanPerPertemuan[13],
        P15: kegiatanPerPertemuan[14],
        P16: kegiatanPerPertemuan[15],
        P17: kegiatanPerPertemuan[16],
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
      { title: 'Kuis', data: 'kuis' },
      { title: 'Tugas', data: 'pengumpulan' },
      { title: 'P1', data: 'P1' },
      { title: 'P2', data: 'P2' },
      { title: 'P3', data: 'P3' },
      { title: 'P4', data: 'P4' },
      { title: 'P5', data: 'P5' },
      { title: 'P6', data: 'P6' },
      { title: 'P7', data: 'P7' },
      { title: 'P8', data: 'P8' },
      { title: 'P9', data: 'P9' },
      { title: 'P10', data: 'P10' },
      { title: 'P11', data: 'P11' },
      { title: 'P12', data: 'P12' },
      { title: 'P13', data: 'P13' },
      { title: 'P14', data: 'P14' },
      { title: 'P15', data: 'P15' },
      { title: 'P16', data: 'P16' },
      { title: 'P17', data: 'P17' },
    ],
  });
}

$(document).ready(function () {
  const table = $('#data-matkul').DataTable();
  updateData();
});
</script>

>>>>>>> Stashed changes
@endsection
