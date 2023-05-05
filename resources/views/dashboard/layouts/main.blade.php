<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PANDAY | Beranda')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="css/dashboard/beranda.css" />
</head>

<body>
    <!-- Page Content -->
    @include('dashboard.layouts.header')

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        @include('dashboard.layouts.sidebar')

        <!-- /#sidebar-wrapper -->  
        @yield('content')
    </div> <!-- /d-flex -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/dashboard/beranda.js"></script>

</body>
</html>