@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Detail Mahasiswa</h1>
    </div>

    <div class="section-body">
        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-3">
            </div>

            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        @if(file_exists($mahasiswa->photo))
                            <img alt="image" src="{{ url('/profile_images/default.png')}}" class="rounded-circle profile-widget-picture">
                        @else
                            <img alt="image" src="{{ url('/profile_images/' . $mahasiswa->photo)}}" class="rounded-circle profile-widget-picture">
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
                                                <td>Email</td>
                                                <td>:</td>
                                                <td>{{$mahasiswa->user->email}}</td>
                                            </tr>
                                            <tr>
                                                <td>Jenis Kelamin</td>
                                                <td>:</td>
                                                <td>{{$mahasiswa->gender}}</td>
                                            </tr>
                                            <tr>
                                                <td>Agama</td>
                                                <td>:</td>
                                                <td>{{$mahasiswa->religion}}</td>
                                            </tr>
                                            <tr>
                                                <td>Prodi</td>
                                                <td>:</td>
                                                <td>{{$mahasiswa->prodi}}</td>
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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection