function getSemester() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_course_get_categories&moodlewsrestformat=json',
        cache: true,
        success: function (data, status, xhr) {
            const semester = [];

            for (let i = 0; i < data.length; i++) {
                const item = data[i];
                if (item.parent === 47) {
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

        if (item.id === 41) {
            a.text("2019/2020 Genap - Kedokteran");
        } else if (item.id === 48) {
            a.text("2020/2021 Ganjil - Kedokteran");
        } else if (item.id === 70) {
            a.text("2019/2020 Antara - Kedokteran");
        } else if (item.id === 203) {
            a.text("2020/2021 Genap - Kedokteran");
        } else if (item.id === 247) {
            a.text("2020/2021 Antara - Kedokteran");
        } else if (item.id === 253) {
            a.text("2021/2022 Ganjil - Kedokteran");
        } else if (item.id === 343) {
            a.text("2021/2022 Genap - Kedokteran");
        } else if (item.id === 401) {
            a.text("2021/2022 Antara - Kedokteran");
        } else if (item.id === 425) {
            a.text("2022/2023 Ganjil - Kedokteran");
        } else if (item.id === 486) {
            a.text("2022/2023 Genap - Kedokteran");
        } else if (item.id === 561) {
            a.text("2022/2023 Antara - Kedokteran");
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