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
                            {{-- <a href="{{ route('user.profile.edit', Crypt::encrypt($mahasiswa->id)) }}" class="btn btn-info pull-right">Edit</a> --}}
                            <a href="{{ route('user.changePassword.form', Crypt::encrypt(Auth::user()->id)) }}" class="btn btn-warning">Change Password</a>
                        </div>
                    </div>
                </div>
                {{-- <a href="{{ route('user.change') }}" class="btn btn-warning">Change Password</a> --}}
            </div>

            <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form method="post" action="{{ route('user.profile.update', ['id' => Crypt::encrypt($mahasiswa->id)]) }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <input type="hidden" value="PUT" name="_method" class="form-control">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-7 col-12">
                                <label>Nama</label>
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required name="name" value="{{ $mahasiswa->name }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                            </div>
                            <div class="form-group col-md-5 col-12">
                                <label>NPM</label>
                                <input type="text" class="form-control {{ $errors->has('npm') ? 'is-invalid' : '' }}" required name="npm" value="{{ $mahasiswa->user->npm }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('npm') }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-5 col-12">
                                <label>Agama</label>
                                <select class="form-control selectric" name="religion">
                                    <option selected>-</option>
                                    <option {{ $mahasiswa->religion == "Islam" ? 'selected' : '' }}>Islam</option>
                                    <option {{ $mahasiswa->religion == "Protestan" ? 'selected' : '' }}>Protestan</option>
                                    <option {{ $mahasiswa->religion == "Katolik" ? 'selected' : '' }}>Katolik</option>
                                    <option {{ $mahasiswa->religion == "Hindu" ? 'selected' : '' }}>Hindu</option>
                                    <option {{ $mahasiswa->religion == "Buddha" ? 'selected' : '' }}>Buddha</option>
                                    <option {{ $mahasiswa->religion == "Khonghucu" ? 'selected' : '' }}>Khonghucu</option>
                                </select>
                            </div>
                            <div class="form-group col-md-7 col-12">
                                <label>Email</label>
                                <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" required name="email" value="{{ $mahasiswa->user->email }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4 col-12">
                                <label>Gender</label>
                                    <select class="form-control select2" required name="gender">
                                        <option selected>-</option>
                                        <option {{ $mahasiswa->gender == "Laki - laki" ? 'selected' : '' }}>Laki - laki</option>
                                        <option {{ $mahasiswa->gender == "Perempuan" ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            <div class="form-group col-md-8 col-12">
                                <label>No HP</label>
                                <input type="number" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" required name="phone" value="{{ $mahasiswa->phone }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="form-group col-md-6 col-12">
                                <label>Prodi</label>
                                    <select class="form-control select2" required name="prodi_id">
                                        <option selected>-</option>
                                        @foreach($prodis as $row)
                                        <option {{ $mahasiswa->prodi_id == $row->id ? 'selected' : '' }} value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="form-group col-md-6 col-12">
                                <label>Semester</label>
                                    <select class="form-control select2" required name="semester" value="{{ $mahasiswa->semester }}">
                                        <option selected>-</option>
                                        <option {{ $mahasiswa->semester == "2" ? 'selected' : '' }}>2</option>
                                        <option {{ $mahasiswa->semester == "4" ? 'selected' : '' }}>4</option>
                                        <option {{ $mahasiswa->semester == "6" ? 'selected' : '' }}>6</option>
                                    </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label>Alamat</label>
                                <input type="text" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" required name="address" value="{{ $mahasiswa->address }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-3">
                                <label>Profile Picture</label>
                                {{-- <div class="gallery gallery-md">
                                    <div class="gallery-item" id="preview" data-image="{{ url('/profile_images/' . $mahasiswa->user->npm . '/' . $mahasiswa->photo)}}" data-title="Image 1"></div>
                                </div> --}}
                                @if(empty($mahasiswa->photo))
                                    <img id="preview" alt="image" src="{{ url('/profile_images/default.png')}}" class="rounded-circle profile-widget-picture" style="height:150px; width:150px;">
                                @else
                                    <img id="preview" alt="image" src="{{ url('/profile_images/' . $mahasiswa->user->npm . '/' . $mahasiswa->photo)}}" class="rounded-circle profile-widget-picture" style="height:150px; width:150px;">
                                @endif
                                {{-- <img id="preview" src="{{ url('/profile_images/' . $mahasiswa->user->npm . '/' . $mahasiswa->photo)}}" class="profile-user-img img-responsive" style="height: 150px; width: 150px; display: block;"> --}}
                            </div>
                            <div class="form-group col-6 mt-4">
                            <input type="file" class="form-control {{ $errors->has('photo') ? 'is-invalid' : '' }}" name="photo" id="photo">
                            <div class="invalid-feedback">
                                {{ $errors->first('photo') }}
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('footer')
<script src="{{ asset('assets/js/toastr.min.js')}}"></script>
@endsection
