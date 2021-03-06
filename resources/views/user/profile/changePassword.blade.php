@extends('layouts.user.app')

@section('content')
<div class="section-header">
      <h1>Reset Password</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/user') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ url('/user/profile') }}">Profile</a></div>
        <div class="breadcrumb-item">Reset Password</div>
      </div>
    </div>

    <section class="section-body">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">

            <div class="card card-primary">

              <div class="card-body">
                <form method="POST" action="{{ route('user.changePassword') }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="">Current Password</label>
                    <input type="password" id="form-password" class="form-control {{ $errors->has('current_password') ? 'is-invalid' : '' }}" tabindex="1" name="current_password" value="{{ $email or old('email') }}" required autofocus>
                  </div>

                  <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" id="new-password" class="form-control pwstrength {{ $errors->has('new_password') ? 'is-invalid' : '' }}" name="new_password" tabindex="2" required>
                  </div>

                  <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" id="confirm-password" class="form-control" name="new_password_confirmation" tabindex="2" required>
                    <input type="checkbox" id="checkbox" class="form-checkbox mt-2"> Show password
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Reset Password
                    </button>
                  </div>

                </form>
              </div>

            </div>

          </div>
        </div>
      </div>
    </section>
  @endsection

  @section('footer')
  <script type="text/javascript">
    $(document).ready(function(){		
      $('#checkbox').click(function(){
        if($(this).is(':checked')){
          $('#form-password').attr('type','text');
          $('#new-password').attr('type','text');
          $('#confirm-password').attr('type','text');
        }else{
          $('#form-password').attr('type','password');
          $('#new-password').attr('type','password');
          $('#confirm-password').attr('type','password');
        }
      });
    });
  </script>
@endsection
