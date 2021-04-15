@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Kriteria & Bobot</h1>
        <div class="ml-auto">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKriteria">
                Tambah
            </button>
        </div>    
    </div>

    <div class="body">
        <p>
            <a class="btn btn-light" data-toggle="collapse" href="#criteria1" role="button" aria-expanded="false" aria-controls="criteria">
                Kriteria Penghitungan
            </a>
            <a class="btn btn-light" data-toggle="collapse" href="#criteria2" role="button" aria-expanded="false" aria-controls="criteria">
                Kriteria Beasiswa
            </a>
          </p>
    </div>

    <div class="section-body collapse" id="criteria1">
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
                            <th>Nilai</th>
                        </tr>
                        @foreach($criterias->where('status', 1) as $row)
                        <tr>
                            <td>{{$loop -> iteration}}</td>
                            <td>{{$row  -> code}}</td>
                            <td>{{$row  -> name}}</td>
                            <td>{{($row -> weight) * 100}}%</td>
                            <td>{{$row  -> character}}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEditKriteria-{{ $row->id }}">Edit</button>
                                <a href="#" class="btn btn-danger btn-sm criteria-delete" criteria_id="{{ $row->id }}" criteria_name="{{ $row->name }}" >Delete</a>
                                @if($row->status == 1)
                                <button type="button" class="btn btn-sm btn-light float-right" data-toggle="modal" data-target="#modalTambahWeight-{{ $row->id }}">Tambah Nilai</button>
                                @else

                                @endif
                            </td>
                            <td>
                                <table>
                                    @forelse($row->weights as $weight)
                                    <tr>
                                        <td> {{$weight->information}} ( {{ $weight->value }} ) </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modalEditWeight-{{ $weight->id }}">Edit</button>
                                            <a href="#" class="btn btn-outline-danger btn-sm weight-delete" weight_id="{{ $weight->id }}">Delete</a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="text-center">Tidak ada data Bobot!</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
          </div>
    </div>

    <div class="section-body collapse" id="criteria2">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Inisial</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                        @foreach($criterias->where('status', 0) as $row)
                        <tr>
                            <td>{{$loop -> iteration}}</td>
                            <td>{{$row  -> code}}</td>
                            <td>{{$row  -> name}}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEditKriteria-{{ $row->id }}">Edit</button>
                                <a href="#" class="btn btn-danger btn-sm criteria-delete" criteria_id="{{ $row->id }}" criteria_name="{{ $row->name }}" >Delete</a>
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
                            <div class="invalid-feedback">
                                {{ $errors->first('code') }}
                            </div>
                        </div>

                        <div class="form-group col-7 {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="">Nama</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6 {{ $errors->has('weight') ? 'has-error' : '' }}">
                            <label for="">Bobot</label>
                            <input type="number" step="0.01" class="form-control {{ $errors->has('weight')  ? 'is-invalid' : ''}}" name="weight" value="{{ old('weight') }}"value=''>
                            <div class="invalid-feedback">
                                {{ $errors->first('weight') }}
                            </div>
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
                    
                    <div class="row">
                        <div class="form-group col-12 {{ $errors->has('information') ? 'has-error' : '' }}">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control {{ $errors->has('information') ? 'is-invalid' : '' }}" name="information" value="{{ old('information') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('information') }}
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>

                </form>
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
                            <div class="invalid-feedback">
                                {{ $errors->first('code') }}
                            </div>
                        </div>

                        <div class="form-group col-7 {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="">Nama</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ $row->name }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                    </div>

                    @if($row->status == 1)
                    <div class="row">
                        <div class="form-group col-6 {{ $errors->has('weight') ? 'has-error' : '' }}">
                            <label for="">Bobot</label>
                            <input type="number" step="0.01" class="form-control {{ $errors->has('weight')  ? 'is-invalid' : ''}}" name="weight" value="{{ $row->weight }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('weight') }}
                            </div>
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
                    @else

                    @endif
                    <div class="row">
                        <div class="form-group col-12 {{ $errors->has('information') ? 'has-error' : '' }}">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control {{ $errors->has('information') ? 'is-invalid' : '' }}" name="information" value="{{ $row->information }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('information') }}
                            </div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Update Changes</button>

                </form>
            </div>

        </div>
    </div>
</div>
@endforeach

{{-- Modal Tambah Bobot --}}
@foreach($criterias as $row)
<div class="modal fade" id="modalTambahWeight-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Pilihan Nilai Kriteria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.criteria.weight.save') }}">
                    {{csrf_field()}}
                    <input type="hidden" class="form-control" name="criteria_id" value="{{ $row->id }}" readonly>
                    <div class="row">
                        <div class="form-group col-5">
                            <label for="">Nama Kriteria</label>
                            <input type="text" class="form-control" value="{{ $row->name }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6 {{ $errors->has('information') ? 'has-error' : '' }}">
                            <label for="">Keterangan</label>
                            <input type="text" class="form-control {{ $errors->has('information')  ? 'is-invalid' : ''}}" name="information" value="{{ old('information') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('information') }}
                            </div>
                        </div>
                        <div class="form-group col-6 {{ $errors->has('value') ? 'has-error' : '' }}">
                            <label for="">Nilai</label>
                            <input type="number" step="0.01" class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" name="value" value="{{ old('value') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('value') }}
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

{{-- Modal Edit Bobot --}}
@foreach($criterias as $row)
    @foreach($row->weights as $weight)
    <div class="modal fade" id="modalEditWeight-{{ $weight->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Kriteria Weight</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
        
                <div class="modal-body">
                    <form method="POST" action="{{ route('admin.criteria.weight.update', ['id' => $weight->id]) }}">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="form-group col-5">
                                <label for="">Kriteria</label>
                                <input type="hidden" class="form-control" name="criteria_id" value="{{ $weight->criteria_id }}">
                                <input type="text" class="form-control" value="{{ $weight->criteria->name }}" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6 {{ $errors->has('information') ? 'has-error' : '' }}">
                                <label for="">Keterangan</label>
                                <input type="text" class="form-control {{ $errors->has('information')  ? 'is-invalid' : ''}}" name="information" value="{{ $weight->information }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('information') }}
                                </div>
                            </div>
                            <div class="form-group col-6 {{ $errors->has('value') ? 'has-error' : '' }}">
                                <label for="">Nilai</label>
                                <input type="number" step="0.01" class="form-control {{ $errors->has('value') ? 'is-invalid' : '' }}" name="value" value="{{ $weight->value }}">
                                <div class="invalid-feedback">
                                    {{ $errors->first('value') }}
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Update changes</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
    @endforeach
@endforeach

@endsection

@section('footer')
    <script>
        $('.weight-delete').click(function(){
            var weight_id = $(this).attr('weight_id');
            swal({
                backdrop:false,
                title: "Yakin ?",
                text: "Menghapus Data Dengan ID " + weight_id + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/kriteria/weight/delete/" + weight_id;
                }
                });
                event.preventDefault();
        });

        $('.criteria-delete').click(function(){
            var criteria_id = $(this).attr('criteria_id');
            var criteria_name = $(this).attr('criteria_name');
            swal({
                backdrop:false,
                title: "Yakin ?",
                text: "Menghapus Kriteria " + criteria_name + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/admin/kriteria/delete/" + criteria_id;
                    }
                });
                event.preventDefault();
        });
    </script>
@endsection