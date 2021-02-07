@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Kriteria</h1>
        <div class="ml-auto">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKriteria">
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
                            <th>Inisial</th>
                            <th>Nama</th>
                            <th>Bobot</th>
                            <th>Sifat</th>
                            <th>Action</th>
                            <th>Nilai 
                                <button type="button" class="btn btn-sm btn-light float-right" data-toggle="modal" data-target="#modalTambahWeight">Tambah</button>
                            </th>
                        </tr>
                        @foreach($criterias as $row)
                        <tr>
                            <td>{{$loop -> iteration}}</td>
                            <td>{{$row  -> code}}</td>
                            <td>{{$row  -> name}}</td>
                            <td>{{($row  -> weight) * 100}}%</td>
                            <td>{{$row  -> character}}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.criteria.delete', ['id' => $row->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEditKriteria-{{ $row->id }}">Edit</button>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Menghapus Data {{ $row->name }} ?');" >Delete</button>
                                </form>
                            </td>
                            <td>
                                <table>
                                    @foreach($weights as $row)
                                    <tr>
                                        <td> {{$row->information}} ( {{ $row->value }} ) </td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.criteria.weight.delete', ['id' => $row->id]) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalEditWeight-{{ $row->id }}">Edit</button>
                                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Menghapus Data {{ $row->information }} ?');" >Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
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
<div class="modal fade" id="modalTambahKriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.criteria.save') }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-5 {{ $errors->has('code') ? 'has-error' : '' }}">
                            <label for="">Inisial</label>
                            <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" value="{{ old('code') }}">
                        </div>

                        <div class="form-group col-7 {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="">Nama</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6 {{ $errors->has('weight') ? 'has-error' : '' }}">
                            <label for="">Bobot</label>
                            <input type="number" step="0.01" class="form-control {{ $errors->has('weight')  ? 'is-invalid' : ''}}" name="weight" value="{{ old('weight') }}">
                        </div>
                        <div class="invalid-feedback">
                            Bobot harus dalam desimal!
                        </div>
                        <div class="form-group col-6">
                            <label>Sifat</label>
                            <select class="form-control selectric" name="character">
                                <option selected>-</option>
                                <option value="Benefit">Benefit</option>
                                <option value="Cost">Cost</option>
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

{{-- Modal Edit Kriteria --}}
@foreach($criterias as $row)
<div class="modal fade" id="modalEditKriteria-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.criteria.update', ['id' => $row->id] ) }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-5 {{ $errors->has('code') ? 'has-error' : '' }}">
                            <label for="">Inisial</label>
                            <input type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" name="code" value="{{ $row->code }}">
                        </div>

                        <div class="form-group col-7 {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="">Nama</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ $row->name }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6 {{ $errors->has('weight') ? 'has-error' : '' }}">
                            <label for="">Bobot</label>
                            <input type="number" step="0.01" class="form-control {{ $errors->has('weight')  ? 'is-invalid' : ''}}" name="weight" value="{{ $row->weight }}">
                        </div>
                        <div class="invalid-feedback">
                            Bobot harus dalam desimal!
                        </div>
                        <div class="form-group col-6">
                            <label>Sifat</label>
                            <select class="form-control selectric" name="character">
                                <option selected>-</option>
                                <option value="Benefit" {{ $row->character  == "Benefit"? 'selected' : '' }}>Benefit</option>
                                <option value="Cost"    {{ $row->character  == "Cost"   ? 'selected' : '' }}>Cost</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Changes</button>

                </form>
            </div>
            
            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>
@endforeach

{{-- Modal Tambah Kriteria --}}
<div class="modal fade" id="modalTambahWeight" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria Weight</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.criteria.weight.save') }}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-5">
                            <label for="">ID Criteria</label>
                            <input type="text" class="form-control" name="criteria_id" value="{{ $criteria_id }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6 {{ $errors->has('information') ? 'has-error' : '' }}">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control {{ $errors->has('information')  ? 'is-invalid' : ''}}" name="information" value="{{ old('information') }}">
                        </div>
                        <div class="form-group col-6 {{ $errors->has('value') ? 'has-error' : '' }}">
                            <label for="">Nilai</label>
                            <input type="number" step="0.01" class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" name="value" value="{{ old('value') }}">
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

{{-- Modal Edit Kriteria --}}
@foreach($weights as $row)
<div class="modal fade" id="modalEditWeight-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria Weight</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.criteria.weight.update', ['id' => $row->id]) }}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-5">
                            <label for="">ID Criteria</label>
                            <input type="text" class="form-control" name="criteria_id" value="{{ $criteria_id }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6 {{ $errors->has('information') ? 'has-error' : '' }}">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control {{ $errors->has('information')  ? 'is-invalid' : ''}}" name="information" value="{{ $row->information }}">
                        </div>
                        <div class="form-group col-6 {{ $errors->has('value') ? 'has-error' : '' }}">
                            <label for="">Nilai</label>
                            <input type="number" step="0.01" class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" name="value" value="{{ $row->value }}">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update changes</button>

                </form>
            </div>
            
            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>
@endforeach
@endsection