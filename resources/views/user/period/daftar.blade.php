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
<h2 class="section-title">Form Daftar </h2>
<div class="section-body">
    <div class="card">
        <div class="card-body width">
          @foreach($criterias as $row)
            <form action="{{ route('user.period.save', ['id' => $period_id]) }}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="criteria_id[]" value="{{ $row->id }}">
                <div class="form-group">
                  <div class="row">
                    <div class="col-2"> 
                      <p> {{$row->name}} </p>
                    </div>
                    {{-- @if($row->name == 'IPK')
                      <div class="col-4">
                          <select class="form-control select2" multiple="" name="value[][]">
                            <option>Option 1</option>
                            <option>Option 2</option>
                            <option>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option>
                            <option>Option 6</option>
                          </select>
                      </div>
                      <div class="col-4">
                        <input type="file" name="file[]"  multiple>
                      </div>
                    @else --}}
                      <div class="col-4">
                        <select class="form-control selectric" name="value[]">
                          <option selected>-</option>
                          @foreach($row->weights as $weight)
                          <option value="{{ $weight->value }}">{{$weight->information}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-4">
                        <input type="file" name="file[]"  multiple>
                      </div>
                    {{-- @endif --}}
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
