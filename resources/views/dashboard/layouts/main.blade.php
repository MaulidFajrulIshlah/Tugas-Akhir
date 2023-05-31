<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PANDAY | Beranda')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="/css/dashboard/main.css" />
    @yield('stylesheets')
</head>

<body>
    <!-- Page Content -->
    @include('dashboard.layouts.header')

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        @include('dashboard.layouts.sidebar')

        <!-- /#sidebar-wrapper -->  
        <div class="container-fluid px-5" style="margin-top: 35px;">
            @yield('content')
        </div>
    </div> <!-- /d-flex -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/js/main.js"></script>

</body>
</html>