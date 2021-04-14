<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Sistem Pengambilan Keputusan PPA</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('node_modules/summernote/dist/summernote-bs4.css')}}">
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('node_modules/prismjs/themes/prism.css')}}">
  {{-- Toaster --}}
  <link rel="stylesheet" href="{{ asset('assets/css/toaster.min.css')}}">
  <link rel="stylesheet" href="{{ asset('node_modules/ionicons201/css/ionicons.min.css')}}">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
</head>

<body class="layout-3">
  <div id="app">
    <div class="main-wrapper container">
      @include('layouts.user.header')

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
      </div>

      @include('layouts.user.footer')
    </div>
  </div>

  {{-- Tempat Menaruh Modal Bootstrap --}}
  
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Daftar Beasiswa PPA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
       
      </div>
      
      <div class="modal-footer">
      </div>
    
    </div>
  </div>
</div>

  <!-- General JS Scripts -->
  <script src="{{ asset('/assets/js/jquery.min.js')}}"></script>
  <script src="{{ asset('/assets/js/popper.min.js')}}"></script>
  <script src="{{ asset('/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('/assets/js/nicescroll.min.js')}}"></script>
  <script src="{{ asset('/assets/js/moment.min.js')}}"></script>
  <script src="{{ asset('node_modules/prismjs/prism.js')}}"></script>
  <script src="{{ asset('node_modules/summernote/dist/summernote-bs4.js')}}"></script>
  <script src="{{ asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Page Specific JS File -->

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>
  <script src="{{ asset('assets/js/page/bootstrap-modal.js')}}"></script>
    {{-- Toaster --}}
    <script src="{{ asset('/assets/js/toastr.min.js')}}"></script>
    <script>
      @if(Session::has('success'))    
        toastr.options.positionClass = "toast-top-center";
        toastr.options.progressBar = true;
        toastr.success("{{ Session::get('success') }}");
      @elseif(Session::has('error'))
        toastr.options.positionClass = "toast-top-center";
        toastr.options.progressBar = true;
        toastr.error("{{ Session::get('error') }}");
      @endif
    </script>
</body>
</html>
