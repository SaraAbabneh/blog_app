<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>@yield('title')</title>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/fontawesome-free/css/all.min.css') }}">
<!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <<link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="{{ asset('assets/admin/fonts/SansPro/SansPro.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/admin/css/mycustomstyle.css') }}">
@yield('css')

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
     @include('front.includes.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
     @include('front.includes.sidebar')
  <!-- Main Sidebar Container -->

  <!-- Content Wrapper. Contains page content -->
  @include('front.includes.content')

  <!-- /.content-wrapper -->



  <!-- Main Footer -->
   @include('front.includes.footer')
  <!-- Main Footer -->

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Bootstrap  -->
<script src="{{ asset('assets/admin/')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/admin/dist/js/adminlte.min.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('assets/admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{ asset('assets/admin/plugins/jquery-mapael/maps/world_countries.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/admin/plugins/chart.js/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{ asset('assets/admin/dist/js/pages/dashboard2.js')}}"></script>

@yield('script')




</body>
</html>












