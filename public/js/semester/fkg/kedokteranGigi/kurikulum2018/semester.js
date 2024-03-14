function getSemester() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken='+tokenApi+'&wsfunction=core_course_get_categories&moodlewsrestformat=json',
        cache: true,
        success: function (data, status, xhr) {
            const semester = [];
            // const includedIds = [442, 258, 201, 200, 178];
            const includedIds = [415, 241, 178, 73, 200, 201, 258, 442];
            const excludedIds = [415, 241, 178, 418, 242, 244, 75, 82];

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
        const a = $("<a>").attr("href", `/dashboard/matakuliah?categoryid=${item.id}`).addClass("text fs-5 text-center").text(item.name);
        const icon = $("<i>").addClass("fas fa-caret-right m-3");

        if (item.id === 61) {
            a.text("2019/2020 Genap - Kedokteran Gigi");
        } else if (item.id === 60) {
            a.text("2020/2021 Ganjil - Kedokteran Gigi");
        } else if (item.id === 78) {
            a.text("2019/2020 Antara - Kedokteran Gigi");
        } else if (item.id === 180) {
            a.text("2020/2021 Genap - Kedokteran Gigi");
        } else if (item.id === 243) {
            a.text("2021/2022 Antara - Kedokteran Gigi");
        } else if (item.id === 260) {
            a.text("2021/2022 Ganjil - Kedokteran Gigi");
        } else if (item.id === 347) {
            a.text("2021/2022 Genap - Kedokteran Gigi");
        } else if (item.id === 416) {
            a.text("2022/2023 Antara - Kedokteran Gigi");
        } else if (item.id === 505) {
            a.text("2022/2023 Ganjil - Kedokteran Gigi");
        } else if (item.id === 507) {
            a.text("2022/2023 Genap - Kedokteran Gigi");
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