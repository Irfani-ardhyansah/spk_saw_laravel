@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Nilai Seleksi <b>{{$mahasiswa->name}}</b> Prodi <b>Teknologi Informasi</b> </h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Kriteria</th>
                            <th>Nilai</th>
                            <th>File</th>
                        </tr>
                        @foreach($values as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$row->criteria->name}}</td>
                            <td>{{$row->value}}</td>
                            <td> <a href="#"><button>File</button></a> </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">

            </div>
          </div>
    </div>
</section>
@endsection