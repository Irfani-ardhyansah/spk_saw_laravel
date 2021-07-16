@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Periode Beasiswa {{ date('d', strtotime($beasiswa->start)) }} {{ date('F', strtotime($beasiswa->start)) }} {{ date('Y', strtotime($beasiswa->start)) }} s/d {{ date('d', strtotime($beasiswa->end)) }} {{ date('F', strtotime($beasiswa->end)) }} {{ date('Y', strtotime($beasiswa->end)) }}</h1>
    </div>

    <form action="{{ route('admin.beasiswa.peserta.search', ['id' => $period_id ]) }}" class="form-inline" method="GET">
        
    <h2 class="section-title"> <a href="{{ route('admin.beasiswa.peserta', ['id' => $period_id]) }}">Data Peserta</a> </h2>

    <div class="row ml-auto">
        <div class="col-2 mt-1">
            <div class="form-group">
                <button class="btn-sm btn-outline-primary" type="submit">Cari</button>
            </div>
        </div>
        <div class="col-2">
            <div class="form-group">
                <input type="text" class="form-control" name="name" required placeholder="Masukkan Nama Peserta">
            </div>
        </div>
    </div>

    </form>

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
                            <td>{{$row->name}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->semester}}</td>
                            <td>{{$row->prodi->name}}</td>
                            <td>
                                <button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#modalNilai-{{$row->id}}">Nilai</button>
                                {{-- <a href="/admin/periode/{{$period_id}}/peserta/{{$row->id}}/nilai" class="btn btn-outline-info btn-sm">Nilai</a> --}}
                                <a href="#" class="btn btn-outline-danger btn-sm peserta-delete" period_id="{{ $period_id }}" peserta_id="{{ $row->id }}" peserta_name="{{ $row->name }}" >Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" style="text-align:center;">Tidak Ada Data</td>
                        </tr>
                        @endforelse
                    </table>
                {{$pendaftar->links()}}
                </div>
            </div>
          </div>
    </div>
</section>

{{-- Modal Tambah Kriteria --}}
@foreach($pendaftar as $row)
<div class="modal fade" id="modalNilai-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Nilai {{ $row->name }}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Kriteria</th>
                            <th>Nilai</th>
                            <th>File</th>
                        </tr>
                        @foreach($values->where('mahasiswa_id', $row->id) as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{$value->criteria->name}}</td>
                            <td>{{$value->value}}</td>
                            <td> 
                                <a href="{{ url('/') }}/periode/{{$value->period->start.'_'.$value->period->end}}/{{ $row->user->npm }}/{{$value->file}}" target="_blank"><button>File</button></a> 
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endforeach

@endsection

@section('footer')
    <script>
        $('.peserta-delete').click(function(){
            var period_id = $(this).attr('period_id');
            var peserta_id = $(this).attr('peserta_id');
            var peserta_name = $(this).attr('peserta_name');
            swal({
                backdrop:false,
                title: "Yakin ?",
                text: "Menghapus Data Dengan Nama " + peserta_name + " Dari Beasiswa ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/periode/" + period_id + "/peserta/" + peserta_id + "/delete";
                }
                });
                event.preventDefault();
        });
    </script>
@endsection