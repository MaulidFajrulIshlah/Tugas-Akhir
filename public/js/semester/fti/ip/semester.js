function getSemester() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=463cfb78c5acc92fbed0656c2aec27b4&wsfunction=core_course_get_categories&moodlewsrestformat=json',
        cache: true,
        success: function (data, status, xhr) {
            const semester = [];
            const excludedIds = [237, 251, 477, 478, 479, 480];
            const excludedKeywords = ["Teknik Informatika"];

            $.each(data, function (index, item) {
                const hasExcludedKeyword = excludedKeywords.some(keyword => item.name.toLowerCase().includes(keyword.toLowerCase()));

                if (item.parent === 6 && !excludedIds.includes(item.id) && !hasExcludedKeyword) {
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

        if (item.id === 17) {
            a.text("2019/2020 Ganjil - Ilmu Perpustakaan");
        } else if (item.id === 40) {
            a.text("2019/2020 Genap - Ilmu Perpustakaan");
        } else if (item.id === 156) {
            a.text("2020/2021 Ganjil - Ilmu Perpustakaan");
        } else if (item.id === 207) {
            a.text("2020/2021 Genap - Ilmu Perpustakaan");
        } else if (item.id === 239) {
            a.text("2021/2022 Ganjil - Ilmu Perpustakaan");
        } else if (item.id === 359) {
            a.text("2021/2022 Genap - Ilmu Perpustakaan");
        } else if (item.id === 439) {
            a.text("2022/2023 Ganjil - Ilmu Perpustakaan");
        } else if (item.id === 488) {
            a.text("2022/2023 Genap - Ilmu Perpustakaan");
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