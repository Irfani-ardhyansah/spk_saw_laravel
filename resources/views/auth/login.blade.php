<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ secure_asset('assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ secure_asset('node_modules/ionicons201/css/ionicons.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ secure_asset('node_modules/bootstrap-social/bootstrap-social.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ secure_asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ secure_asset('assets/css/components.css')}}">
</head>

<body style="background-color: #404950;">
  <div id="app">
    <section class="section">
      <div class="container mt-5" style="opacity: 0.8;">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

            <div class="card card-primary">
              <div class="card-header">
                <h4>Login Mahasiswa</h4>
                <div class="ml-auto">
                  <a href="{{ url('/') }}"><i class="ion ion-close"></i></a>
                </div>
              </div>

              <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                  {{ csrf_field() }}
                  
                  <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                      <label for="">Npm</label>
                    <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" tabindex="1" required autofocus >
                    <div class="invalid-feedback">
                      NPM / Password yang di input salah!
                    </div>
                  </div>

                  <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                    <div class="d-block">
                      <label for="" class="control-label">Password</label>
                    </div>
                    <input type="password" id="form-password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Password yang di input salah!
                    </div>
                  <input type="checkbox" id="checkbox" class="form-checkbox mt-2"> Show password
                  </div>
                  <div class="row form-group">
                    <div class="col-6"> 
                      <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                        Login
                      </button>
                    </div>
                    <div class="col-6">
                      <a href="{{ url('/register') }}" class="btn btn-link btn-lg btn-block" tabindex="4">
                        Register
                      </a>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; 2021 <br> Develop By <a href="https://gitlab.com/Irfani-ardhyansah/">Mochamad Irfani Ardhyansah</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ secure_asset('/assets/js/jquery.min.js')}}"></script>
  <script src="{{ secure_asset('/assets/js/popper.min.js')}}"></script>
  <script src="{{ secure_asset('/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{ secure_asset('/assets/js/nicescroll.min.js')}}"></script>
  <script src="{{ secure_asset('/assets/js/moment.min.js')}}"></script>
  <script src="{{ secure_asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ secure_asset('assets/js/scripts.js')}}"></script>
  <script src="{{ secure_asset('assets/js/custom.js')}}"></script>

  <script type="text/javascript">
    $(document).ready(function(){		
      $('#checkbox').click(function(){
        if($(this).is(':checked')){
          $('#form-password').attr('type','text');
        }else{
          $('#form-password').attr('type','password');
        }
      });
    });
  </script>

  <!-- Page Specific JS File -->
</body>
</html>
