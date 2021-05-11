@extends('layouts.user.app')

@section('content')
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/user') }}">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="{{ url('/user/profile') }}">Profile</a></div>
        </div>
    </div>

    <div class="section-body">

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-3">
            </div>

            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        @if(empty($mahasiswa->photo))
                            <img alt="image" src="{{ url('/profile_images/default.png')}}" class="rounded-circle profile-widget-picture">
                        @else
                            <img alt="image" src="{{ url('/profile_images/' . $mahasiswa->user->npm . '/' . $mahasiswa->photo)}}" class="rounded-circle profile-widget-picture" style="height:150px; width:150px;">
                        @endif
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name">{{$mahasiswa->name}}</div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>
                                                <td>NPM</td>
                                                <td>:</td>
                                                <td>{{$mahasiswa->user->npm}}</td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td>:</td>
                                                <td>{{$mahasiswa->gender}}</td>
                                            </tr>
                                            <tr>
                                                <td>Prodi</td>
                                                <td>:</td>
                                                <td>{{($mahasiswa->prodi->name)}}</td>
                                            </tr>
                                            <tr>
                                                <td>Semester</td>
                                                <td>:</td>
                                                <td>{{$mahasiswa->semester}}</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td>{{$mahasiswa->address}}</td>
                                            </tr>
                                            <tr>
                                                <td>No HP</td>
                                                <td>:</td>
                                                <td>{{$mahasiswa->phone}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="{{ route('user.profile.edit', Crypt::encrypt($mahasiswa->id)) }}" class="btn btn-info pull-right">Edit</a>
                        </div>
                    </div>
                </div>
                <a href="{{ route('user.changePassword.form') }}" class="btn btn-warning">Change Password</a>
            </div>

            <div class="col-12 col-md-12 col-lg-3">
            </div>

        </div>
    </div>
@endsection
