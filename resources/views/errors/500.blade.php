<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>500</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->    
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="page-error">
          <div class="page-inner">
            <h1>500</h1>
            <div class="page-description">
              Whoopps, something went wrong.
            </div>
            <div class="page-search">
              <form>
                <div class="form-group floating-addon floating-addon-not-append">
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <i class="fas fa-search"></i>
                      </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-append">
                      <button class="btn btn-primary btn-lg">
                        Search
                      </button>
                    </div>
                  </div>
                </div>
              </form>
              <div class="mt-3">
                <a href="index.html">Back to Home</a>
              </div>
            </div>
          </div>
        </div>
        <div class="simple-footer mt-5">
          Copyright &copy; Stisla 2018
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('/assets/js/jquery.min.js')}}"></script>
  <script src="{{ asset('/assets/js/popper.min.js')}}"></script>
  <script src="{{ asset('/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('/assets/js/nicescroll.min.js')}}"></script>
  <script src="{{ asset('/assets/js/moment.min.js')}}"></script>
  <script src="{{ asset('/assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ asset('/assets/js/scripts.js')}}"></script>
  <script src="{{ asset('/assets/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
</body>
</html>
