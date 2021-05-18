@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Halaman Dashboard User</h1>
        <div class="ml-auto">
            @if($dashboard->isEmpty())
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahData">
                Tambah
            </button>
            @endif
        </div>    
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Konten</th>
                            <th>Action</th>
                        </tr>
                        @foreach($dashboard as $row)
                        <tr>
                            <td>{{$loop -> iteration}}</td>
                            <td>{{$row  -> title}}</td>
                            <td style="text-align:justify;">{!! $row  -> content !!}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEditData-{{ $row->id }}">Edit</button>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
          </div>
    </div>
</section>

{{-- Modal Tambah Kriteria --}}
<div class="modal fade" id="modalTambahData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Keterangan Dashboard</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.dashboard.user.save') }}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-12 {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="">Title</label>
                            <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ old('title') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="form-group col-12 {{ $errors->has('content') ? 'has-error' : '' }}">
                            <label class="col-form-label text-md-right">Content</label>
                            <textarea class="summernote-simple" name="content"></textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('content') }}
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>

                </form>
            </div>

        </div>
    </div>
</div>

{{-- Modal Tambah Kriteria --}}
@foreach($dashboard as $row)
<div class="modal fade" id="modalEditData-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Keterangan Dashboard</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.dashboard.user.update', ['id' => $row->id]) }}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-12 {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="">Title</label>
                            <input type="hidden" class="form-control" name="id" value="{{ $row->id }}">
                            <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" name="title" value="{{ $row->title }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('title') }}
                            </div>
                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="form-group col-12 {{ $errors->has('content') ? 'has-error' : '' }}">
                            <label class="col-form-label text-md-right">Content</label>
                            <textarea class="summernote-simple" name="content">{!! $row->content !!}</textarea>
                            <div class="invalid-feedback">
                                {{ $errors->first('content') }}
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>

                </form>
            </div>

        </div>
    </div>
</div>
@endforeach
@endsection
