<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('node_modules/selectric/public/selectric.css')}}">

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
              <div class="card-header"><h4>Form Register Sistem</h4></div>

              <div class="card-body">

                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                  {{csrf_field()}}

                  <div class="row">

                    <div class="form-group col-5 {{ $errors->has('npm') ? 'has-error' : '' }}">
                      <label for="">NPM</label>
                      <input type="text" class="form-control {{ $errors->has('npm') ? 'is-invalid' : '' }}" name="npm" value="{{ old('npm') }}">
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
                      <input type="text" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" name="phone" value="{{ old('phone') }}">
                      <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label>Agama</label>
                      <select class="form-control selectric" name="religion">
                        <option selected>-</option>
                        <option value="Islam">Islam</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Khonghucu">Khonghucu</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Gender</label>
                      <select class="form-control selectric" name="gender">
                        <option selected>-</option>
                        <option value="Laki - laki">Laki - laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
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
                      <select class="form-control selectric" name="prodi">
                        <option selected>-</option>
                        <option value="TI">Teknologi Informasi</option>
                        <option value="Meto">Mesin Otomotif</option>
                        <option value="TKK">Teknik Komputer Kontrol</option>
                        <option value="Teklis">Teknik Listrik</option>
                        <option value="Kereta">Teknik Perkeretaapian</option>
                        <option value="Kompak">Komputer Akuntansi</option>
                        <option value="Akuntansi">Akuntansi</option>
                        <option value="Adbis">Administrasi Bisnis</option>
                        <option value="Bing">Bahasa Inggris</option>
                      </select>
                    </div>
                    <div class="form-group col-4">
                      <label>Semester</label>
                      <select class="form-control selectric" name="semester">
                        <option selected>-</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6 {{ $errors->has('password') ? 'has-error' : '' }}">
                      <label for="">Password</label>
                      <input type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" required>
                      <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="">Password Confirmation</label>
                      <input type="password" class="form-control" name="password_confirmation" required>
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-12">
                      <label>Profile Picture</label>
                      <input type="file" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" name="photo">
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
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ asset('assets/js/stisla.js')}}"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('node_modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
  <script src="{{ asset('node_modules/selectric/public/jquery.selectric.min.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
  <script src="{{ asset('assets/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('assets/js/page/auth-register.js')}}"></script>
</body>
</html>
