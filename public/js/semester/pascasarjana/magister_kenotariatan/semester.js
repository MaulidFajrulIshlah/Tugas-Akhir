function getSemester() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_course_get_categories&moodlewsrestformat=json',
        cache: true,
        success: function (data, status, xhr) {
            const semester = [];
            const excludedIds = [345];

            $.each(data, function (index, item) {
                if ((item.parent === 29 || item.parent === 345) && !excludedIds.includes(item.id)) {
                    semester.push({ id: item.id, name: item.name });
                }
            });

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

    $.each(data, function (index, item) {
        const li = $('<li>').addClass('link');
        const a = $("<a>").attr("href", `/dashboard/matakuliah?categoryid=${item.id}`).addClass("text fs-5 text-center").text(item.name);
        const icon = $("<i>").addClass("fas fa-caret-right m-3");

        if (item.id === 210) {
            a.text("2020/2021 Ganjil - Magister Kenotariatan");
        } else if (item.id === 209) {
            a.text("2020/2021 Genap - Magister Kenotariatan");
        } else if (item.id === 269) {
            a.text("2021/2022 Ganjil - Magister Kenotariatan");
        } else if (item.id === 346) {
            a.text("2021/2022 Genap - Magister Kenotariatan");
        } else if (item.id === 433) {
            a.text("2022/2023 Ganjil - Magister Kenotariatan");
        } else if (item.id === 533) {
            a.text("2022/2023 Genap - Magister Kenotariatan");
        }

        // memasukkan elemen baru ke dalam element yang dipilih di bagian awal
        a.prepend(icon);
        li.append(a);
        semesterList.append(li);
    });
}

$(document).ready(function () {
    getSemester();
});