function getSemester() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken='+tokenApi+'&wsfunction=core_course_get_categories&moodlewsrestformat=json',
        cache: true,
        success: function (data, status, xhr) {
            const semester = [];
            const includedIds = [4, 151];
            const excludedIds = [151, 256];

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

        if (item.id === 11) {
            a.text("2019/2020 Ganjil - Hukum");
        } else if (item.id === 34) {
            a.text("2019/2020 Genap - Hukum");
        } else if (item.id === 154) {
            a.text("2020/2021 Ganjil - Hukum");
        } else if (item.id === 176) {
            a.text("2020/2021 Genap - Hukum");
        } else if (item.id === 246) {
            a.text("2020/2021 Antara - Hukum");
        } else if (item.id === 344) {
            a.text("2021/2022 Ganjil - Hukum");
        } else if (item.id === 349) {
            a.text("2021/2022 Genap - Hukum");
        } else if (item.id === 419) {
            a.text("2021/2022 Antara - Hukum");
        } else if (item.id === 428) {
            a.text("2022/2023 Ganjil - Hukum");
        } else if (item.id === 498) {
            a.text("2022/2023 Genap - Hukum");
        } else if (item.id === 567) {
            a.text("2022/2023 Antara - Hukum");
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