function getSemester() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=fc68a1de6a0eb7fcca7d8dafc5ce53a9&wsfunction=core_course_get_categories&moodlewsrestformat=json',
        cache: true,
        success: function (data, status, xhr) {
            const semester = [];
            const includedIds = [72, 73];
            const excludedIds = [133, 73, 178, 241, 415];

            for (let i = 0; i < data.length; i++) {
                const item = data[i];
                if (includedIds.includes(item.parent) && !excludedIds.includes(item.id)) {
                    semester.push({ id: item.id, name: item.name });
                }
            };

            // Urutkan array semester berdasarkan id secara ascending
            semester.sort(function (a, b) {
                return a.id - b.id;
            });

            // Memproses data semester yang difilter
            processSemesterData(semester);
        },
        error: function (xhr, status, error) {
            console.log('Error:', error);
        }

    });
}

function processSemesterData(data) {
    const semesterList = $('#semester');

    for (let i = 0; i < data.length; i++) {
        const item = data[i];
        const li = $('<li>').addClass('link');
        const a = $("<a>").attr("href", `/dashboard/akademik?categoryid=${item.id}`).addClass("text fs-5 text-center").text(item.name);
        const icon = $("<i>").addClass("fas fa-caret-right m-3");

        if (item.id === 178) {
            a.text("2019/2020 Antara - Kedokteran Gigi");
        } else if (item.id === 241) {
            a.text("2021/2022 Antara - Kedokteran Gigi");
        } else if (item.id === 415) {
            a.text("2022/2023 Antara - Kedokteran Gigi");
        } else if (item.id === 569) {
            a.text("2023/2024 Antara - Kedokteran Gigi");
        }

        // memasukkan elemen baru ke dalam element yang dipilih di bagian awal
        a.prepend(icon);
        li.append(a);
        semesterList.append(li);
    };
}

$(document).ready(function () {
    getSemester();
});