function updateSuspend() {

    const users = [];
    let i = 1;
    let boo = true;
    let nomor = 1;

    while (boo) {
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'https://layar.yarsi.ac.id/webservice/rest/server.php?wstoken=fc68a1de6a0eb7fcca7d8dafc5ce53a9&wsfunction=core_user_get_users_by_field&moodlewsrestformat=json&field=id&values[0]=' + i,
            async: false,
            cache: true,

            success: function (data, status, xhr) {
                for (let i = 0; i < data.length; i++) {
                    // const suspended = data[i]['suspended'].toString();
                    if (data[i]['suspended'] == true) {
                        const user = {
                            nomor: nomor++,
                            username: data[i]['username'],
                            fullname: data[i]['fullname'],
                            //    suspended: data[i]['suspended'].toString(),
                        }
                        users.push(user);
                    }
                }
                // setTimeout(function() {
                console.log(users);
                console.log(i);
                //  }, 100);
            },
            error: function (xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
        i++;
        if (i == 100) {
            boo = false;
        }
    }//while

    $('#data-suspend').empty();

    const table = $('#data-suspend').DataTable({
        destroy: true,
        processing: true,
        data: users,
        columns: [
            { title: 'No', data: 'nomor' },
            { title: 'Nama Pengguna', data: 'username' },
            { title: 'Nama Lengkap', data: 'fullname' },
        ],
    });
}

$(document).ready(function () {
    const table = $('#data-suspend').DataTable();

    // updateSuspend();
});