@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Periode Beasiswa</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Periode</th>
                            <th>Pendaftar</th>
                            <th>Pengumuman</th>
                            <th>Action</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>
                                <table>
                                    <tr>
                                        <td> Dimulai </td>
                                        <td> : </td>
                                        <td> 31 Desember 2020 </td>
                                    </tr>
                                    <tr>
                                        <td> Berakhir </td>
                                        <td> : </td>
                                        <td> 1 Januari 2021 </td>
                                    </tr>
                                </table>
                            </td>
                            <td> 5 Orang </td>
                            <td><a href="#" class="btn btn-light btn-sm">File</a></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                <a href="/admin/periode/peserta" class="btn btn-sm btn-primary">Peserta</a>
                                <a href="/admin/periode/analisis" class="btn btn-outline-info btn-sm">Analisis</a>
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