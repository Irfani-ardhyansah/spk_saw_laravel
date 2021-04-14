@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Peserta Periode {{ $beasiswa->start }} s/d {{ $beasiswa->end }}</h1>
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
                        @forelse($pendaftar as $row) 
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->user->npm}}</td>
                            <td>{{$row->user->mahasiswa->name}}</td>
                            <td>{{$row->user->mahasiswa->phone}}</td>
                            <td>{{$row->user->mahasiswa->semester}}</td>
                            <td>{{$row->user->mahasiswa->prodi}}</td>
                            <td>
                                <a href="/admin/periode/{{$period_id}}/peserta/{{$row->user->mahasiswa->id}}/nilai" class="btn btn-outline-info btn-sm">Nilai</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" style="text-align:center;">Tidak Ada Data</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">

            </div>
          </div>
    </div>
</section>

@endsection