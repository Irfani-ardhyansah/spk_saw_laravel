@extends('layouts.user.app')

@section('content')

<div class="section-header">
  <h1>Form Daftar Beasiswa</h1>
  <div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{ url('/user') }}">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="{{ url('/user/beasiswa') }}">Beasiswa</a></div>
  </div>
</div>

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
                  </div>
                </div>
              @endforeach
                
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-4"></div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary ml-auto mr-5">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
