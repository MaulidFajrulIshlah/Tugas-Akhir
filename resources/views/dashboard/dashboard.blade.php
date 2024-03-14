<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .card {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .online {
            color: #fff;
        }

        .offline {
            color: #fff;
        }

        .card-header {
            font-size: 24px;
            margin-bottom: 10px;
            padding: 10px;
            /* tambahin padding buat nambahin ruang di sekitar tulisan di card-header */
        }

        .card-body {
            font-size: 16px;
        }

        /* Tambahin styling buat background warna */
        .online {
            background-color: #28a745;
            /* Hijau buat status online */
        }

        .offline {
            background-color: #dca235;
            /* Merah buat status offline */
        }
    </style>

</head>

<body>

    <h1>Dashboard</h1>

    @if ($lastServerStatus)
        <div class="card">
            <div class="card-header {{ $lastServerStatus->status === 'online' ? 'online' : 'offline' }}">
                {{ $lastServerStatus->status }}</div>
            <div class="card-body">
                <p>Location: {{ $lastServerStatus->location }}</p>
                <p>Last Checked: {{ $lastServerStatus->checked_at }}</p>
                <p>HTTP Status: {{ $lastServerStatus->http_status }}</p>
            </div>
        </div>
    @else
        <div class="card">
            <p>No server status data available.</p>
        </div>
    @endif

</body>

</html>
