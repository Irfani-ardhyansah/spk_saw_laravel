@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Mahasiswa</h1>
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
                            <th>No HP</th>
                            <th>Semester</th>
                            <th>Prodi</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>183307009</td>
                            <td>Irwansyah Saputra</td>
                            <td>0812371248</td>
                            <td>5</td>
                            <td>Teknologi Informasi</td>
                            <td>
                                <a href="/admin/mahasiswa/detail" class="btn btn-info btn-sm">Info</a>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">

            </div>
          </div>
    </div>
</section>
@endsection