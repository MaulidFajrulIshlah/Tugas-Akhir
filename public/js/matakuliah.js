function updateData() {
    const matkul = [];
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_course_get_courses&moodlewsrestformat=json',

        success: function (data, status, xhr) {
            const matkulBaru = [];
            for (let i = 0; i < data.length; i++) {
                if (data[i]['categoryid'] == 16) {
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

                document.getElementById('jumlah-matkul').textContent = matkul.length;
            });

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