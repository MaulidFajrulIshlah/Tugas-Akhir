<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'PANDAY | Beranda')</title>
    <meta name="description" content="Sebuah Dashboard Monitoring Bernama PANDAY" />
    <meta name="keywords" content="dashboard" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/dataTables/dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/masterData.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard/matkul.css') }}">

    

</head>

<body>
    <!-- Page Content -->
    @include('dashboard.layouts.header')

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        @include('dashboard.layouts.sidebar')

        <!-- /#sidebar-wrapper -->  
        <div class="container-fluid px-5" style="margin-top: 35px;">

            <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
            
            @yield('content')

        </div>
    </div> <!-- /d-flex -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>

</body>
</html>