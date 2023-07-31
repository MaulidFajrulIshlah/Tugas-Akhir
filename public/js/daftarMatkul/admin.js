// function updateData() {

//   const matkul = [];
//   $.ajax({
//     type: 'GET',
//     dataType: 'json',
//     url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_course_get_courses&moodlewsrestformat=json',
//     cache: true,

//     success: function (data, status, xhr) {
//       for (let i = 0; i < data.length; i++) {
//         if (data[i]['categoryid'] !== null) {
//           const namaMatkul = data[i]['fullname'];
//           matkul.push(namaMatkul);
//         }
//       }
//       $('#jumlah-matkul').text(matkul.length);

//       updateTime();

//     },

//     error: function (xhr, status, error) {
//       // penanganan kesalahan saat permintaan AJAX gagal
//       console.log('Error:', error);
//     }
//   });
// }

// function updateTime() {
//   // waktu saat ini
//   const currentTime = new Date();

//   // Menambahkan 1 jam
//   const updateDateTime = new Date(currentTime.getTime() + (1000 * 60 * 60));

//   // Selisih waktu dalam milidetik
//   let elapsedTime = updateDateTime - currentTime;

//   // menghitung jam dan menit yang berlalu
//   const hours = Math.floor(elapsedTime / (1000 * 60 * 60));
//   const minutes = Math.floor((currentTime % (1000 * 60 * 60)) / (1000 * 60));

//   let elapsedTimeString = '';

//   if (hours === 1 && minutes === 0) {
//     elapsedTimeString = hours + ' jam yang lalu';
//   } else {
//     elapsedTimeString = minutes + ' menit yang lalu';
//   }

//   // memperbarui teks dengan keterangan pembaruan data
//   $('#last-updated').text("Pembaruan data terjadi " + elapsedTimeString);
// }


// $(document).ready(function () {
//   updateData();

//   // Jadwalkan pembaruan data sesuai dengan waktu pembaruan berikutnya setiap 1 jam
//   const intervalID = setInterval(updateData, 60 * 60 * 1000);
// });

function updateAkun() {
  const users = [];
  let i = 1;
  let boo = true;
  let nomor = 1;
  
  while (boo) {
    $.ajax({
      type: 'GET',
      dataType: 'json',
      url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_user_get_users_by_field&moodlewsrestformat=json&field=id&values[0]=' + i,
      async: false,
      cache: true,
  
      success: function (data, status, xhr) {
        for (let i = 0; i < data.length; i++) {
          if (data[i]['username'] !== null ) {
            const user = {
              nomor: nomor++,
              username: data[i]['username'],
             // fullname: data[i]['fullname'],
            };
            users.push(user);
          }
        }
      },
      error: function (xhr, status, error) {
        console.log(xhr.responseText);
      }
    });
  
    i++;
    if (i == 100) {
      boo = false;
    }
  }
  
  // Jumlah akun adalah panjang (length) dari array users
  const jumlahAkun = users.length;
  console.log("Jumlah akun:", jumlahAkun);
  
  // Menampilkan jumlah akun pada elemen dengan id "jumlah-akun" (misalnya pada elemen <span>)
  $('#jumlah-akun').text(jumlahAkun);

}

function updateData() {
  $.ajax({
    type: 'GET',
    dataType: 'json',
    url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_course_get_categories&moodlewsrestformat=json',
    cache: true,

    success: function (data, status, xhr) {
      let courseCount = 0;
      const excludedIds = [237, 251, 256];
      // const febIds = [2, 3, 6, 31, 65, 131, 193, 185, 277, 278, 360, 371, 404, 443, 448,
      //   493, 508, 550, 562, 29, 28, 345, 438, 30, 534, 476, 4, 151, 176, 344, 349, 428, 498,
      //   5, 13, 36];
      const febIds = [2, 3, 31, 65, 131, 193, 185, 277, 278, 360, 371, 404, 443, 448,
        493, 508, 550, 562];
      const ftiIds = [6];
      const pascaIds = [29, 28, 345, 438, 30, 534, 476];
      const fhIds = [4, 151, 176, 344, 349, 428, 498];
      const fpsiIds = [5, 13, 36];
      const fkIds = [9, 45, 47, 49];
      const fkg = [10, 178, 241, 415, 72, 56, 57, 73, 72, 442, 257, 258, 197, 201, 200, 198];

      for (let i = 0; i < data.length; i++) {
        const item = data[i];
        if (pascaIds.includes(item.parent)) {
          courseCount += data[i]['coursecount'];
        } else if (ftiIds.includes(item.parent) && !excludedIds.includes(item.id)) {
          courseCount += data[i]['coursecount'];
        } else if (febIds.includes(item.parent)) {
          courseCount += data[i]['coursecount'];
        } else if (fhIds.includes(item.parent) && !excludedIds.includes(item.id)) {
          courseCount += data[i]['coursecount'];
        } else if (fpsiIds.includes(item.parent)) {
          courseCount += data[i]['coursecount'];
        }else if (fkIds.includes(item.parent)) {
          courseCount += data[i]['coursecount'];
        }else if (fkg.includes(item.parent)) {
          courseCount += data[i]['coursecount'];
        }
      }
      $('#jumlah-matkul').text(courseCount);

      updateTime();

    },
    error: function (xhr, status, error) {
      // penanganan kesalahan saat permintaan AJAX gagal
      console.log('Error:', error);
    }
  });
}

function updateTime() {
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
  updateAkun();

  // Jadwalkan pembaruan data sesuai dengan waktu pembaruan berikutnya setiap 1 jam
  const intervalID = setInterval(updateData, 60 * 60 * 1000);
});