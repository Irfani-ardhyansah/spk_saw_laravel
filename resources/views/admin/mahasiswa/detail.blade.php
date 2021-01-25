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
                        <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png')}}" class="rounded-circle profile-widget-picture">
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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection