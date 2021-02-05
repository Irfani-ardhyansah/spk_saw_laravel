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

            @if (session('error'))
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {!! session('error') !!}
            </div>
            @endif

            @if (session('success'))
            <div class="alert alert-primary alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {!! session('success') !!}
            </div>
            @endif

            <div class="card card-primary">

              <div class="card-body">
                <form method="POST" action="{{ route('user.changePassword') }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <label for="">Current Password</label>
                    <input type="password" class="form-control {{ $errors->has('current_password') ? 'is-invalid' : '' }}" tabindex="1" name="current_password" value="{{ $email or old('email') }}" required autofocus>
                  </div>

                  <div class="form-group">
                    <label for="">New Password</label>
                    <input type="password" class="form-control pwstrength {{ $errors->has('new_password') ? 'is-invalid' : '' }}" name="new_password" tabindex="2" required>
                  </div>

                  <div class="form-group">
                    <label for="">Confirm Password</label>
                    <input type="password" class="form-control" name="new_password_confirmation" tabindex="2" required>
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
