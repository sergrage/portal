<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Технологический сайт ПАО 'ТГК-1' филиала 'Карельский'">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Шматовский Сергей">
    <title>ТГК-1 - технологический сайт</title>

    <!-- Favicon -->
    <link rel="icon" href="/favicon.png" type="image/jpeg">
    <!-- app css -->
    <link rel="stylesheet" href="/app/css/app.css">
    <!-- adminlte -->
    <link rel="stylesheet" href="/app/css/adminlte.css">
    <!-- IonIcons -->
{{--    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}

    <!-- Google Font: Source Sans Pro -->
{{--    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">--}}
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    @include('app.partials.header')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 sidebar-light-primary">
        <!-- Brand Logo -->

    <!-- Sidebar -->
    <div class="sidebar">
    @include('app.partials.logo')
       <!-- Sidebar user panel (optional) -->
       @guest
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       @include('app.partials.login')
       </div>
       @endguest
       <!-- Sidebar Menu -->
       @yield('sidebar')

       <!-- /.sidebar-menu -->
        </div>
    <!-- /.sidebar -->
    </aside>

    @yield('content')

<!-- Main Footer -->
    <footer class="main-footer">
        <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> - Технологический сайт ПАО 'ТГК-1' филиала 'Карельский'</p>
        <a href="#">Создатель сайта: С.А. Шматовский</a>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 0.1.0
        </div>
    </footer>
</div>
<!-- ./wrapper -->
<!-- REQUIRED SCRIPTS -->
<script src="/app/js/app.js"></script>
<!-- OPTIONAL SCRIPTS -->
{{--<script src="plugins/chart.js/Chart.min.js"></script>--}}
{{--<script src="dist/js/demo.js"></script>--}}
{{--<script src="dist/js/pages/dashboard3.js"></script>--}}
</body>
</html>

