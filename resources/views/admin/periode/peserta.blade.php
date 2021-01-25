@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Peserta</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>No HP</th>
                            <th>Semester</th>
                            <th>Prodi</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>183307009</td>
                            <td>Irwansyah Saputra</td>
                            <td><span class="badge badge-success">Diterima</span></td>
                            <td>0812371248</td>
                            <td>5</td>
                            <td>Teknologi Informasi</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Ganti Status</a>
                                <a href="#" class="btn btn-outline-info btn-sm">Nilai</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>183307010</td>
                            <td>Nicholas Saputra</td>
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            <td>081235121</td>
                            <td>5</td>
                            <td>Mesin Otomotif</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Ganti Status</a>
                                <a href="#" class="btn btn-outline-i