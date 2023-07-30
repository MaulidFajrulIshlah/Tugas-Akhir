function getSemester() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_course_get_categories&moodlewsrestformat=json',
        cache: true,
        success: function (data, status, xhr) {
            const semester = [];
            const excludedIds = [438, 205];

            for (let i = 0; i < data.length; i++) {
                const item = data[i];
                if ((item.parent === 28 || item.parent === 438) && !excludedIds.includes(item.id)) {
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

        if (item.id === 159) {
            a.text("2020/2021 Ganjil - Magister Manajemen");
        } else if (item.id === 205) {
            a.text("2019/2020 Genap - Magister Manajemen");
        } else if (item.id === 204) {
            a.text("2020/2021 Genap - Magister Manajemen");
        } else if (item.id === 268) {
            a.text("2021/2022 Ganjil - Magister Manajemen");
        } else if (item.id === 394) {
            a.text("2021/2022 Genap - Magister Manajemen");
        } else if (item.id === 434) {
            a.text("2022/2023 Ganjil - Magister Manajemen");
        } else if (item.id === 532) {
            a.text("2022/2023 Genap - Magister Manajemen");
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