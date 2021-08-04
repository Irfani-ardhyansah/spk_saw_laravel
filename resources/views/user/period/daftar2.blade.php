@extends('layouts.user.app')

@section('content')

<div class="section-header">
  <h1>Beasiswa {{ date('d', strtotime($period->start)) }} {{ date('F', strtotime($period->start)) }} {{ date('Y', strtotime($period->start)) }} s/d {{ date('d', strtotime($period->end)) }} {{ date('F', strtotime($period->end)) }} {{ date('Y', strtotime($period->end)) }}</h1>
  <div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{ url('/user') }}">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="{{ url('/user/beasiswa') }}">Beasiswa</a></div>
  <div class="breadcrumb-item">Daftar</div>
  </div>
</div>
@if (count($errors) > 0)
<div class="alert alert-danger">
  {{ $errors->first() }}
</div>
@endif 
<h2 class="section-title">Data Utama</h2>
<div class="section-body">
    <div class="card">
        <div class="card-body width">
            @foreach($criterias as $row)
                <form action="{{ route('user.period.save', ['id' => $id]) }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="criteria_id[]" value="{{ $row->id }}">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-2"> 
                                <p> {{$row->name}} </p>
                            </div>
                            @if($row->name == 'IPK')
                            <div class="form-group col-4">
                                <label for="">Semester Lalu</label>
                                <select class="form-control selectric" name="value[0][]">
                                    <option selected>-</option>
                                    @foreach($row->weights->where('value', '!=', '0') as $weight)
                                    <option value="{{ $weight->value }}">{{$weight->information}}</option>
                                    @endforeach
                                </select>
                                <label for="">Semester Sekarang</label>
                                <select class="form-control selectric" name="value[0][]">
                                    <option selected>-</option>
                                    @foreach($row->weights->where('value', '!=', '0') as $weight)
                                    <option value="{{ $weight->value }}">{{$weight->information}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-4 mt-4">
                                <input type="file" name="file[]" class="{{ $errors->has('file.*') ? 'has-error' : '' }}" required multiple>
                                <div class="invalid-feedback">
                                    {{ $errors->first() }}
                                </div>
                            </div>
                            @else
                            <div class="form-group col-4">
                                <select class="form-control selectric" name="value[]">
                                <option selected>-</option>
                                @foreach($row->weights->where('value', '!=', '0') as $weight)
                                <option value="{{ $weight->value }}">{{$weight->information}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <input type="file" name="file[]" class="{{ $errors->has('file.*') ? 'has-error' : '' }}" required multiple>
                                <div class="invalid-feedback">
                                    {{ $errors->first() }}
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
            @endforeach
    </div>
</div>

<h2 class="section-title">Data Pendukung</h2>
<div class="card">
    <div class="card-body width">
            @foreach ($files as $row)
                <input type="hidden" name="criteria_id[]" value="{{ $row->id }}">
                    <div class="row mt-2">
                        <div class="col-2"> 
                            <p> {{$row->name}} </p>
                        </div>
                        <input type="hidden" name="value[]" value="-">
                        <div class="form-group col-4">
                            <input type="file" name="file[]" class="{{ $errors->has('file.*') ? 'has-error' : '' }}" required multiple>
                            <div class="invalid-feedback">
                                {{ $errors->first() }}
                            </div>
                        </div>
                    </div>
            @endforeach
                
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4"></div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary ml-auto mr-5">Daftar</button>
                    </div>
                </div>
                </form>
        </div>
    </div>
</div>

@endsection

@section('footer')
<script src="{{ asset('assets/js/toastr.min.js')}}"></script>
@endsection