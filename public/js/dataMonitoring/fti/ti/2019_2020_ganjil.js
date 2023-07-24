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
        if (courses[i]['categoryid'] == 16) {
            const namaMatkul = courses[i]['fullname'];
            const idMatkul = courses[i]['id'];

            let jumlahKuis = 0;
            let jumlahPengumpulan = 0;

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
            } else if (assignments.warnings && assignments.warnings.length > 0) {
                const warning = assignments.warnings[0];
                if (warning.message === "User is not enrolled or does not have requested capability") {
                    jumlahPengumpulan = "User is not enrolled";
                }
            }

            matkul.push({
                nomor: nomor++,
                matakuliah: namaMatkul,
                kuis: jumlahKuis,
                pengumpulan: jumlahPengumpulan,
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
            {
                title: 'P1',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                title: 'P2',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                title: 'P3',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                title: 'P4',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                title: 'P5',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                title: 'P6',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                title: 'P7',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                title: 'P8',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                title: 'P9',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                title: 'P10',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                title: 'P11',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                title: 'P12',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                title: 'P13',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                title: 'P14',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                title: 'P15',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
            {
                title: 'P16',
                data: null,
                render: function (data, type, row) {
                    return '';
                }
            },
        ],
    });
}

$(document).ready(function () {
    const table = $('#data-matkul').DataTable();
    updateData();
});