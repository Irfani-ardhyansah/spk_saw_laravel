@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Nilai Seleksi  </h1>
    </div>
    <h2 class="section-title"><b>{{$mahasiswa->name}}</b> - {{$mahasiswa->prodi->name}} {{$mahasiswa->semester}}</h2>
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
                            <td> 
                                <a href="{{ url('/') }}/periode/{{$row->period->start.'_'.$row->period->end}}/{{ $mahasiswa->user->npm }}/{{$row->file}}" target="_blank"><button>File</button></a> 
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
          </div>
    </div>
</section>
@endsection