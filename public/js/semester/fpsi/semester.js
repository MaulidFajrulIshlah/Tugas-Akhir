function getSemester() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_course_get_categories&moodlewsrestformat=json',
        cache: true,
        success: function (data, status, xhr) {
            // Memproses data yang sesuai kondisi dan menyimpannya di penyimpanan lokal
            const semester = [];
            const excludedIds = [14, 37];

            for (let i = 0; i < data.length; i++) {
                const item = data[i];
                if (item.parent === 5 && !excludedIds.includes(item.id)) {
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

        if (item.id === 13) {
            a.text("2019/2020 Ganjil - Psikologi");
        } else if (item.id === 36) {
            a.text("2019/2020 Genap - Psikologi");
        } else if (item.id === 68) {
            a.text("2020/2021 Ganjil - Psikologi");
        } else if (item.id === 184) {
            a.text("2020/2021 Genap - Psikologi");
        } else if (item.id === 265) {
            a.text("2021/2022 Ganjil - Psikologi");
        } else if (item.id === 357) {
            a.text("2021/2022 Genap - Psikologi");
        } else if (item.id === 427) {
            a.text("2022/2023 Ganjil - Psikologi");
        } else if (item.id === 489) {
            a.text("2022/2023 Genap - Psikologi");
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