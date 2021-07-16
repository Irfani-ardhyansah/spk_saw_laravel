<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register</title>
  
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('node_modules/selectric/public/selectric.css')}}">
  <link rel="stylesheet" href="{{ asset('node_modules/ionicons201/css/ionicons.min.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css')}}">
</head>

<body style="background-color: #404950;">
  <div id="app">
    <section class="section">
      <div class="container mt-5" style="opacity: 0.8;">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">

            <div class="card card-primary">
              <div class="card-header"><h4>Form Register Sistem Beasiswa PPA</h4>
                <div class="ml-auto">
                  <a href="{{ url('/') }}"><i class="ion ion-close"></i></a>
                </div>
              </div>

              <div class="card-body">

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                  {{csrf_field()}}

                  <div class="row">

                    <div class="form-group col-5 {{ $errors->has('npm') ? 'has-error' : '' }}">
                      <label for="">NPM</label>
                      <input type="number" class="form-control {{ $errors->has('npm') ? 'is-invalid' : '' }}" name="npm" value="{{ old('npm') }}">
                      <div class="invalid-feedback">
                        {{ $errors->first('npm') }}
                      </div>
                    </div>

                    <div class="form-group col-7 {{ $errors->has('email') ? 'has-error' : '' }}">
                      <label for="">Email</label>
                      <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                      <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="form-group col-8 {{ $errors->has('name') ? 'has-error' : '' }}">
                      <label for="">Nama</label>
                      <input type="text" class="form-control {{ $errors->has('name')  ? 'is-invalid' : ''}}" name="name" value="{{ old('name') }}">
                      <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                      </div>
                    </div>
                    <div class="form-group col-4">
                      <label for="">No HP</label>
                      <input type="number" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" value="{{ old('phone') }}">
                      <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Agama</label>
                      <select class="form-control selectric {{ $errors->has('religion') ? 'is-invalid' : '' }}" name="religion">
                        <option selected>-</option>
                        <option value="Islam" {{ old('religion') == "Islam" ? "selected" :""}}>Islam</option>
                        <option value="Protestan" {{ old('religion') == "Protestan" ? "selected" :""}}>Protestan</option>
                        <option value="Katolik" {{ old('religion') == "Katolik" ? "selected" :""}}>Katolik</option>
                        <option value="Hindu" {{ old('religion') == "Hindu" ? "selected" :""}}>Hindu</option>
                        <option value="Buddha" {{ old('religion') == "Buddha" ? "selected" :""}}>Buddha</option>
                        <option value="Khonghucu"{{ old('religion') == "Khonghucu" ? "selected" :""}}>Khonghucu</option>
                      </select>
                      <div class="invalid-feedback d-block">
                        {{ $errors->first('religion') }}
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label>Gender</label>
                      <select class="form-control selectric {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender">
                        <option selected>-</option>
                        <option value="Laki - laki" {{ old('gender') == "Laki - laki" ? "selected" :""}}>Laki - laki</option>
                        <option value="Perempuan" {{ old('gender') == "Perempuan" ? "selected" :""}}>Perempuan</option>
                      </select>
                      <div class="invalid-feedback d-block">
                        {{ $errors->first('gender') }}
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label for="">Alamat</label>
                      <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" value="{{ old('address') }}">
                      <div class="invalid-feedback">
                        {{ $errors->first('address') }}
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-8">
                      <label>Prodi</label>
                      <select class="form-control selectric {{ $errors->has('prodi_id') ? 'is-invalid' : '' }}" name="prodi_id">
                        <option selected>-</option>
                        @foreach($prodis as $row)
                        <option value="{{ $row->id }}" {{ old('prodi_id') == $row->id ? "selected" :""}}>{{$row->name}}</option>
                        @endforeach
                      </select>
                      <div class="invalid-feedback d-block">
                        {{ $errors->first('prodi_id') }}
                      </div>
                    </div>

                    <div class="form-group col-4">
                      <label>Semester</label>
                      <select class="form-control selectric {{ $errors->has('semester') ? 'is-invalid' : '' }}" name="semester">
                        <option selected>-</option>
                        <option value="3" {{ old('semester') == "2" ? "selected" :""}}>2</option>
                        <option value="5" {{ old('semester') == "4" ? "selected" :""}}>4</option>
                        <option value="5" {{ old('semester') == "6" ? "selected" :""}}>6</option>
                      </select>
                      <div class="invalid-feedback d-block">
                        {{ $errors->first('semester') }}
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="">Password</label>
                      <input type="password" id="form-password" class="form-control pwstrength  {{ $errors->has('password') ? 'has-error' : '' }}" data-indicator="pwindicator" name="password" required>
                      <div class="invalid-feedback d-block">
                        {{ $errors->first('password') }}
                      </div>
                    <input type="checkbox" id="checkbox" class="form-checkbox mt-2"> Show password
                    </div>
                    <div class="form-group col-6">
                      <label for="">Password Confirmation</label>
                      <input type="password" id="form-password-confirm" class="form-control {{ $errors->has('password_confirmation') ? 'has-error' : '' }}" name="password_confirmation" required>
                      <div class="invalid-feedback d-block">
                        {{ $errors->first('password_confirmation') }}
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-3">
                      <label>Profile Picture</label>
                      <img id="preview" src="{{ url('/profile_images/default.png')}}" class="rounded-circle profile-widget-picture" style="height:150px; width:150px;">
                    </div>
                    <div class="form-group col-6 mt-4">
                      <input type="file" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" name="photo" id="photo">
                      <div class="invalid-feedback">
                        {{ $errors->first('photo') }}
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <div class="col-9">
                      <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Register
                      </button>
                    </div>
                    <div class="col-3">
                      <a href="{{ url('/login') }}" class="btn btn-link btn-lg btn-block" tabindex="4">
                        Login
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
  <script src="{{ asset('/assets/js/jquery.min.js')}}"></script>
  <script src="{{ asset('/assets/js/popper.min.js')}}"></script>
  <script src="{{ asset('/assets/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('/assets/js/nicescroll.min.js')}}"></script>
  <script src="{{ asset('/assets/js/moment.min.js')}}"></script>
  <script src="{{ asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('node_modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
  <script src="{{ asset('node_modules/selectric/public/jquery.selectric.min.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/auth-register.js')}}"></script>
  <script type="text/javascript">
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
          var reader = new FileReader();
      
          reader.onload = function (e) {
              $('#preview').attr('src', e.target.result);
          }
      
          reader.readAsDataURL(input.files[0]);
        }
    }
  
    $("#photo").change(function(){
        bacaGambar(this);
    });
  
    $(document).ready(function(){		
      $('#checkbox').click(function(){
        if($(this).is(':checked')){
          $('#form-password').attr('type','text');
          $('#form-password-confirm').attr('type','text');
        }else{
          $('#form-password').attr('type','password');
          $('#form-password-confirm').attr('type','password');
        }
      });
    });
  </script>
  
</body>
</html>
