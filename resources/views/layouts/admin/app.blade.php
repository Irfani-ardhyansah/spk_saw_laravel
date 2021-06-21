<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Sistem Pengambilan Keputusan</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ secure_asset('assets/css/bootstrap.min.css')}}">

    {{-- Toaster --}}
    <link rel="stylesheet" href="{{ secure_asset('assets/css/toaster.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ secure_asset('/node_modules/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('/node_modules/jqvmap/dist/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('/node_modules/summernote/dist/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('/node_modules/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('/node_modules/owl.carousel/dist/assets/owl.theme.default.min.css')}}">
    {{-- <link rel="stylesheet" href="{{ secure_asset('node_modules/ionicons201/css/ionicons.css')}}"> --}}
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ secure_asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('/assets/css/jquery-datatables.min.css')}}">
    <link rel="stylesheet" href="{{ secure_asset('assets/css/components.css')}}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
          <div class="navbar-bg"></div>
          @include('layouts.admin.header')

          @include('layouts.admin.sidebar')
          <!-- Main Content -->
          <div class="main-content">
            @yield('content')
          </div>

          @include('layouts.admin.footer')
        </div>
    </div>

  <!-- General JS Scripts -->
  <script src="{{ secure_asset('/assets/js/jquery.min.js')}}"></script>
  <script src="{{ secure_asset('/assets/js/jquery-datatables.min.js')}}"></script>
  <script src="{{ secure_asset('/assets/js/popper.min.js')}}"></script>
  <script src="{{ secure_asset('/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{ secure_asset('/assets/js/nicescroll.min.js')}}"></script>
  <script src="{{ secure_asset('/assets/js/moment.min.js')}}"></script>
  <script src="{{ secure_asset('/assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  <script src="{{ secure_asset('/node_modules/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
  <script src="{{ secure_asset('/node_modules/chart.js/dist/Chart.min.js')}}"></script>
  <script src="{{ secure_asset('/node_modules/owl.carousel/dist/owl.carousel.min.js')}}"></script>
  <script src="{{ secure_asset('/node_modules/summernote/dist/summernote-bs4.js')}}"></script>
  <script src="{{ secure_asset('/node_modules/chocolat/dist/js/jquery.chocolat.min.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{ secure_asset('/assets/js/scripts.js')}}"></script>
  <script src="{{ secure_asset('/assets/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ secure_asset('/assets/js/page/index.js')}}"></script>

  {{-- SweetAlert --}}
  <script src="{{ secure_asset('/assets/js/sweetalert.min.js')}}"></script>

  {{-- Toaster --}}
  <script src="{{ secure_asset('/assets/js/toastr.min.js')}}"></script>
  <script>
    @if(Session::has('success'))    
      toastr.options.positionClass = "toast-top-center";
      toastr.options.progressBar = true;
      toastr.success("{{ Session::get('success') }}");
    @elseif(Session::has('error'))
      toastr.options.progressBar = true;
      toastr.error("{{ Session::get('error') }}");
    @endif
  </script>
  @yield('footer')
</body>
</html>
