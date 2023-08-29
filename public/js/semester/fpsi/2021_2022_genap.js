function updateData() {
    const matkul = [];
    let nomor = 1;
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=fc68a1de6a0eb7fcca7d8dafc5ce53a9&wsfunction=core_course_get_courses&moodlewsrestformat=json',

        success: function (data, status, xhr) {
            for (let i = 0; i < data.length; i++) {
                if (data[i]['categoryid'] == 357) {
                    const namaMatkul = data[i]['fullname'];
                    matkul.push({
                        nomor: nomor++,
                        matakuliah: namaMatkul
                    });
                }
            }

            $('#data-matkul').empty();

            const table = $('#data-matkul').DataTable({
                destroy: true,
                processing: true,
                data: matkul,
                columns: [
                    { title: 'No', data: 'nomor' },
                    { title: 'Nama Mata Kuliah', data: 'matakuliah' },
                    {
                        title: 'Halaman Mata Kuliah Lengkap', data: null,
                        render: function (data, type, row) {
                            return '';
                        }
                    },
                ],
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
    const table = $('#data-matkul').DataTable();

    updateData();

    // Jadwalkan pembaruan data sesuai dengan waktu pembaruan berikutnya setiap 1 jam
    const intervalID = setInterval(updateData, 60 * 60 * 1000);
});