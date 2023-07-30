function getSemester() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_course_get_categories&moodlewsrestformat=json',
        cache: true,
        success: function (data, status, xhr) {
            const semester = [];
            const includedIds = [2, 3, 31, 65];
            const excludedIds = [3, 31, 65];
            const excludedKeywords = ["Manajemen", "Managemen"];

            for (let i = 0; i < data.length; i++) {
                const item = data[i];
                const hasExcludedKeyword = excludedKeywords.some(keyword => item.name.toLowerCase().includes(keyword.toLowerCase()));

                if (includedIds.includes(item.parent) && !excludedIds.includes(item.id) && !hasExcludedKeyword) {
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

        if (item.id === 7) {
            a.text("2019/2020 Ganjil - Akuntansi");
        } else if (item.id === 33) {
            a.text("2019/2020 Genap - Akuntansi");
        } else if (item.id === 67) {
            a.text("2019/2020 Antara - Akuntansi");
        } else if (item.id === 420) {
            a.text("2021/2022 Antara - Akuntansi");
        } else if (item.id === 562) {
            a.text("2022/2023 Antara - Akuntansi");
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