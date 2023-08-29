function getSemester() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=fc68a1de6a0eb7fcca7d8dafc5ce53a9&wsfunction=core_course_get_categories&moodlewsrestformat=json',
        cache: true,
        success: function (data, status, xhr) {
            const semester = [];
            // const includedIds = [257, 197, 198];
            const includedIds = [415, 241, 178, 198, 197, 257];
            // const excludedIds = [78, 82, 243];
            const excludedIds = [416, 243, 244, 78, 82];

            for (let i = 0; i < data.length; i++) {
                const item = data[i];
                if (includedIds.includes(item.parent) && !excludedIds.includes(item.id)) {
                    semester.push({ id: item.id, name: item.name });
                }
            };

            console.log(semester);

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

        if (item.id === 418) {
            a.text("2022/2023 Antara - Kedokteran Gigi");
        } else if (item.id === 242) {
            a.text("2021/2022 Antara - Kedokteran Gigi");
        } else if (item.id === 75) {
            a.text("2019/2020 Antara - Kedokteran Gigi");
        } else if (item.id === 59) {
            a.text("2019/2020 Genap - Kedokteran Gigi");
        } else if (item.id === 58) {
            a.text("2020/2021 Ganjil - Kedokteran Gigi");
        } else if (item.id === 199) {
            a.text("2020/2021 Genap - Kedokteran Gigi");
        } else if (item.id === 259) {
            a.text("2021/2022 Ganjil - Kedokteran Gigi");
        } else if (item.id === 353) {
            a.text("2021/2022 Genap - Kedokteran Gigi");
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