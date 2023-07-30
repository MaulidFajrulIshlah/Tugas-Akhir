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
      if (courses[i]['categoryid'] == 58) {
        const namaMatkul = courses[i]['fullname'];
        const idMatkul = courses[i]['id'];
  
        let jumlahKuis = 0;
        let jumlahPengumpulan = 0;
        const kegiatanPerPertemuan = Array(16).fill(0); // Inisialisasi array untuk kegiatan belajar per pertemuan
  
        // Menghitung jumlah kuis
        const quizzes = await $.ajax({
          type: 'GET',
          dataType: 'json',
          url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wsfunction=mod_quiz_get_quizzes_by_courses&wstoken=463cfb78c5acc92fbed0656c2aec27b4&moodlewsrestformat=json&courseids[0]=' + idMatkul,
        });
  
        jumlahKuis = quizzes.quizzes.length;
  
        const assignments = await $.ajax({
          type: 'GET',
          dataType: 'json',
          url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=mod_assign_get_assignments&moodlewsrestformat=json&courseids[0]=' + idMatkul,
        });
  
        // Menghitung jumlah tugas
        if (assignments.courses && assignments.courses.length > 0) {
          jumlahPengumpulan = assignments.courses[0].assignments.length;
        }
  
        // Mengambil kegiatan belajar per pertemuan
        const resources = await $.ajax({
          type: 'GET',
          dataType: 'json',
          url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=mod_resource_get_resources_by_courses&moodlewsrestformat=json&courseids[0]=' + idMatkul,
        });
  
        // Menghitung jumlah kegiatan belajar per pertemuan
        resources.resources.forEach((resource) => {
          const section = parseInt(resource.section); // Mengambil nomor section dari atribut 'section'
          if (!isNaN(section) && section >= 1 && section <= 16) {
            kegiatanPerPertemuan[section - 1]++;
          } else if (assignments.warnings && assignments.warnings.length > 0) {
            const warning = assignments.warnings[0];
            if (warning.message === "User is not enrolled or does not have requested capability") {
                jumlahPengumpulan = "User is not enrolled";
            }
        }
        });
  
        matkul.push({
          nomor: nomor++,
          matakuliah: namaMatkul,
          pengumpulan: jumlahPengumpulan,
          kuis: jumlahKuis,
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
        { title: 'Tugas', data: 'pengumpulan' },
        { title: 'Kuis', data: 'kuis' },
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
      ],
    });
  }
  
      $(document).ready(function () {
          const table = $('#data-matkul').DataTable();
          updateData();
      });