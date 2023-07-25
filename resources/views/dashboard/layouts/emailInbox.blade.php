<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemberitahuan Login - Pengguna Baru</title>
</head>

<body>
    <form action="{{ route('postLogin') }}" method="POST">
        @csrf
        <p>Terdapat pengguna baru yang melakukan proses login ke dalam sistem PANDAY dengan :<p>
        <p>Username:  {{ session('username') }}</p>
        <p>Login Time: {{ now() }}</p>
        <p>Mohon segera diproses jika data tersebut telah sesuai dengan data yang masuk ke dalam sistem PANDAY.</p>
        <p>Terima Kasih</p>
    </form>
</body>

</html>
