@extends('layouts.user.app')

@section('content')
    <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="#">Profile</a></div>
        </div>
    </div>

    <div class="section-body">

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-3">
            </div>

            <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle profile-widget-picture">
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name">Mochamad Irfani Ardhyansah</div>
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm">
                                        <tbody>
                                            <tr>
                                                <td>NPM</td>
                                                <td>:</td>
                                                <td>183307009</td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td>:</td>
                                                <td>Laki - laki</td>
                                            </tr>
                                            <tr>
                                                <td>Prodi</td>
                                                <td>:</td>
                                                <td>Teknologi Informasi</td>
                                            </tr>
                                            <tr>
                                                <td>Semester</td>
                                                <td>:</td>
                                                <td>5</td>
                                            </tr>
                                            <tr>
                                                <td>Alamat</td>
                                                <td>:</td>
                                                <td>Ds. Bukur Rt 1 Rw 1 Kec Jiwan Kab Madiun</td>
                                            </tr>
                                            <tr>
                                                <td>No HP</td>
                                                <td>:</td>
                                                <td>081332695709</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <a href="{{ url('/user/profile/edit') }}" class="btn btn-info pull-right">Edit</a>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/user/profile/changepassword') }}" class="btn btn-warning">Change Password</a>
            </div>

            <div class="col-12 col-md-12 col-lg-3">
            </div>

            {{-- <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                    <form method="post" class="needs-validation" novalidate="">
                    <div class="card-header">
                        <h4>Edit Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-7 col-12">
                                <label>Nama</label>
                                <input type="text" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Please fill in the field
                                </div>
                            </div>
                            <div class="form-group col-md-5 col-12">
                                <label>NPM</label>
                                <input type="text" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Please fill in the field
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Gender</label>
                                    <select class="form-control select2" required>
                                        <option selected>-</option>
                                        <option>Laki - laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Phone</label>
                                <input type="number" class="form-control" required="">
                                <div class="invalid-feedback">
                                    Please fill in the field
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>Prodi</label>
                                    <select class="form-control select2" required>
                                        <option selected>-</option>
                                        <option>Teknologi Informasi</option>
                                        <option>Mesin Otomotif</option>
                                        <option>Teknik Komputer Kontrol</option>
                                        <option>Teknik Listrik</option>
                                        <option>Teknik Kereta</option>
                                        <option>Komputer Akuntansi</option>
                                        <option>Akuntansi</option>
                                        <option>Administrasi Bisnis</option>
                                        <option>Bahasa Inggris</option>
                                    </select>
                                </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Semester</label>
                                    <select class="form-control select2" required>
                                        <option selected>-</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12 col-12">
                                <label>Alamat</label>
                                <input type="text" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please fill in the field
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 col-12">
                                <label>No HP</label>
                                <input type="text" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please fill in the field
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                    </div>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
