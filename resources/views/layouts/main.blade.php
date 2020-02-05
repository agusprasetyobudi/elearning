<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  @foreach ($company_name as $item)
  <title>{{$item->app_name}} | {{Str::upper(Request::segment(1))}}</title>
@endforeach

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/dist/css/custom.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12" style="height: 10%">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel" data-interval="2500">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                          <img src="{{asset('admin/images/1.jpeg')}}" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="{{asset('admin/images/2.jpeg')}}" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="{{asset('admin/images/3.jpeg')}}" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="{{asset('admin/images/4.jpeg')}}" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="{{asset('admin/images/5.jpeg')}}" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="{{asset('admin/images/6.jpeg')}}" class="d-block w-100">
                      </div>
                      <div class="carousel-item">
                        <img src="{{asset('admin/images/7.jpeg')}}" class="d-block w-100">
                      </div>
                    </div>
                  </div>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    @include('sweetalert::alert')

    <!-- /.content-header -->
    @yield('sidebar')
    <!-- Main content -->
    @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2019
        @if ($company_name )
        @foreach ($company_name  as $item)
        <a href="{{URL::to('/')}}">{{$item->app_name}}</a>
        @endforeach
        @else
        <a href="#">Company Name</a>
        @endif
        .</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.1
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('admin/dist/js/custom.js')}}"></script>

<!-- Bootstrap -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{asset('admin/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{asset('admin/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
<script src="{{asset('admin/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{asset('admin/dist/js/pages/dashboard2.js')}}"></script>
</body>
</html>
