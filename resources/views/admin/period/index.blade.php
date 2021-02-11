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

    @if (session('error'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('error') !!}
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('success') !!}
    </div>
    @endif

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
                        @foreach($periods as $row)
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
                            <td> 5 Orang </td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modalShowPDF-{{ $row->id }}" class="btn btn-light btn-sm">File</button>
                                {{-- <iframe src="/pengumuman_periode/{{$row->file }}" width="50%" height="250">
                                </iframe> --}}
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.period.delete', ['id' => $row->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalEditPeriode-{{ $row->id }}">Edit</button>
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Menghapus Data {{ $row->information }} ?');" >Delete</button>
                                    <a href="/admin/periode/peserta" class="btn btn-sm btn-primary">Peserta</a>
                                    <a href="/admin/periode/analisis" class="btn btn-outline-info btn-sm">Analisis</a>
                                </form>
                            </td>
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

{{-- Modal Tambah Kriteria --}}
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
                        </div>
                        <div class="form-group col-1"></div>
                        <div class="form-group col-5 {{ $errors->has('end') ? 'has-error' : '' }}">
                            <label for="">Akhir</label>
                            <input type="date" class="form-control {{ $errors->has('end') ? 'is-invalid' : '' }}" name="end" value="{{ old('end') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6 {{ $errors->has('file') ? 'has-error' : '' }}">
                            <label for="">File</label>
                            <input type="file" class="form-control-file" name="file">
                        </div>
                        <div class="invalid-feedback">
                            File harus PDF!
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
            <h5 class="modal-title" id="exampleModalLabel">Pengumuman Periode</h5>
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

{{-- Modal Edit Kriteria --}}
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
                                Tanggal Mulai Harus Beda Dengan Tanggal Berakhir!
                            </div>
                        </div>
                        <div class="form-group col-1"></div>
                        <div class="form-group col-5 {{ $errors->has('end') ? 'has-error' : '' }}">
                            <label for="">Akhir</label>
                            <input type="date" class="form-control {{ $errors->has('end') ? 'is-invalid' : '' }}" name="end" value="{{ $row->end }}">
                            <div class="invalid-feedback">
                                Tanggal Berakhir Harus Beda Dengan Tanggal Mulai!
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6 {{ $errors->has('file') ? 'has-error' : '' }}">
                            <label for="">File</label>
                            <input type="file" class="form-control-file" name="file">
                            <div class="invalid-feedback">
                                File harus PDF!
                            </div>
                        </div>
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