@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Periode Beasiswa</h1>
        <div class="ml-auto">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPeriode">
                Tambah
            </button>
        </div>  
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
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @forelse($periods as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <table>
                                    <tr>
                                        <td> Dimulai </td>
                                        <td> : </td>
                                        <td> {{ date('d', strtotime($row->start)) }} {{ date('F', strtotime($row->start)) }} {{ date('Y', strtotime($row->start)) }} </td>
                                    </tr>
                                    <tr>
                                        <td> Berakhir </td>
                                        <td> : </td>
                                        <td> {{ date('d', strtotime($row->end)) }} {{ date('F', strtotime($row->end)) }} {{ date('Y', strtotime($row->end)) }} </td>
                                    </tr>
                                </table>
                            </td>
                            <td> {{$row->user_periods->count()}} </td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalShowPDF-{{ $row->id }}" class="btn btn-light btn-sm">File</button>
                                {{-- <iframe src="/pengumuman_periode/{{$row->file }}" width="50%" height="250">
                                </iframe> --}}
                            </td>
                            <td>
                                @if($row->status == 1)
                                <span class="badge badge-info">Buka</span>
                                @else
                                <span class="badge badge-warning">Tutup</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalEditPeriode-{{ $row->id }}">Edit</button>
                                <a href="#" class="btn btn-sm btn-danger period-delete" period_id="{{$row->id}}" period_start="{{ $row->start }}" period_end="{{ $row->end }}" >Delete</a>
                                <a href="{{route('admin.beasiswa.peserta', ['id' => $row->id])}}" class="btn btn-sm btn-primary">Peserta</a>
                                
                                <br>
                                
                                <a href="/admin/periode/{{$row->id}}/analisis" class="btn btn-outline-info btn-sm mt-2">Analisis</a>
                                <button type="button" class="btn btn-outline-warning btn-sm mt-2" data-toggle="modal" data-target="#modalGantiStatus-{{ $row->id }}">Ganti Status</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" center>Tidak Ada Data</td>
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

{{-- Modal Tambah Periode --}}
<div class="modal fade" id="modalTambahPeriode" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Periode</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.period.save') }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-5 {{ $errors->has('start') ? 'has-error' : '' }}">
                            <label for="">Dimulai</label>
                            <input type="date" class="form-control {{ $errors->has('start') ? 'is-invalid' : '' }}" name="start" value="{{ old('start') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('start') }}
                            </div>
                        </div>
                        <div class="form-group col-1"></div>
                        <div class="form-group col-5 {{ $errors->has('end') ? 'has-error' : '' }}">
                            <label for="">Akhir</label>
                            <input type="date" class="form-control {{ $errors->has('end') ? 'is-invalid' : '' }}" name="end" value="{{ old('end') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('end') }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6 {{ $errors->has('file') ? 'has-error' : '' }}">
                            <label for="">File</label>
                            <input type="file" class="form-control-file" name="file">
                            <div class="invalid-feedback">
                                {{ $errors->first('file') }}
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label>Status</label>
                            <select class="form-control selectric" name="status">
                                <option selected>-</option>
                                <option value="1">Dibuka</option>
                                <option value="0">Ditutup</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>

                </form>
            </div>
            
            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>

{{-- Modal Pop Up PDF --}}
@foreach($periods as $row)
<div class="modal fade" id="modalShowPDF-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pengumuman Beasiswa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <iframe src="/pengumuman_periode/{{$row->file }}" width="90%" height="500">
                </iframe>
            </div>
            
            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>
@endforeach

{{-- Modal Edit Periode --}}
@foreach($periods as $row)
<div class="modal fade" id="modalEditPeriode-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Periode</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.period.update', ['id' => $row->id]) }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-5 {{ $errors->has('start') ? 'has-error' : '' }}">
                            <label for="">Dimulai</label>
                            <input type="date" class="form-control {{ $errors->has('start') ? 'is-invalid' : '' }}" name="start" value="{{ $row->start }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('start') }}
                            </div>
                        </div>
                        <div class="form-group col-1"></div>
                        <div class="form-group col-5 {{ $errors->has('end') ? 'has-error' : '' }}">
                            <label for="">Akhir</label>
                            <input type="date" class="form-control {{ $errors->has('end') ? 'is-invalid' : '' }}" name="end" value="{{ $row->end }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('end') }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6 {{ $errors->has('file') ? 'has-error' : '' }}">
                            <label for="">File</label>
                            <input type="file" class="form-control-file" name="file">
                            <div class="invalid-feedback">
                                {{ $errors->first('file') }}
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>

                </form>
            </div>
            
            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>
@endforeach

{{-- Modal Ganti Status --}}
@foreach($periods as $row)
<div class="modal fade" id="modalGantiStatus-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ganti Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.period.status', ['id' => $row->id]) }}">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Status</label>
                            <select class="form-control selectric" name="status">
                                <option selected>-</option>
                                <option value="1" {{ $row->status  == "1" ? 'selected' : '' }}>Dibuka</option>
                                <option value="0" {{ $row->status  == "0" ? 'selected' : '' }}>Ditutup</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>

                </form>
            </div>
            
            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>
@endforeach

@endsection

@section('footer')
    <script>
        $('.period-delete').click(function(){
            var period_id = $(this).attr('period_id');
            var period_start = $(this).attr('period_start');
            var period_end = $(this).attr('period_end');
            swal({
                backdrop:false,
                title: "Yakin ?",
                text: "Menghapus Periode " + period_start + " _ " + period_end + " ?" ,
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/periode/delete/" + period_id;
                }
                });
                event.preventDefault();
        });
    </script>
@endsection
