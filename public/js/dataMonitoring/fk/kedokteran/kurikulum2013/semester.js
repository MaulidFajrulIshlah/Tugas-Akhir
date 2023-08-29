function getSemester() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=fc68a1de6a0eb7fcca7d8dafc5ce53a9&wsfunction=core_course_get_categories&moodlewsrestformat=json',
        cache: true,
        success: function (data, status, xhr) {
            const semester = [];
            const excludedIds = [71];

            for (let i = 0; i < data.length; i++) {
                const item = data[i];
                if (item.parent === 49 && !excludedIds.includes(item.id)) {
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

        if (item.id === 51) {
            a.text("2019/2020 Genap - Kedokteran");
        } else if (item.id === 50) {
            a.text("2020/2021 Ganjil - Kedokteran");
        } else if (item.id === 202) {
            a.text("2020/2021 Genap - Kedokteran");
        } else if (item.id === 250) {
            a.text("2020/2021 Antara - Kedokteran");
        } else if (item.id === 263) {
            a.text("2021/2022 Ganjil - Kedokteran");
        } else if (item.id === 348) {
            a.text("2021/2022 Genap - Kedokteran");
        } else if (item.id === 402) {
            a.text("2021/2022 Antara - Kedokteran");
        } else if (item.id === 481) {
            a.text("2022/2023 Ganjil - Kedokteran");
        };

        // memasukkan elemen baru ke dalam element yang dipilih di bagian awal
        a.prepend(icon);
        li.append(a);
        semesterList.append(li);
    };
}

$(document).ready(function () {
    getSemester();
});