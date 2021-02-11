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
            <form action="{{ route('user.period.save') }}" method="POST">
              {{csrf_field()}}
              @php $i = 0; @endphp
              @foreach($criterias as $row)
                <div class="form-group">
                  <div class="row">
                    <div class="col-2"> 
                      <p> {{$row->name}} </p>
                    </div>
                    <div class="col-4">
                      <select class="form-control selectric" name="criteria_id[{{$row->id}}]">
                        <option selected>-</option>
                        @foreach($row->weights as $weight)
                        <option value="{{ $weight->id }}">{{$weight->information}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-4">
                      <input type="file">
                    </div>
                  </div>
                </div>
              @endforeach

              {{$weight->criteria}}
                {{-- <div class="form-group">
                  <div class="row">
                    <div class="col-2"> 
                      <p>Gaji Orang Tua </p>
                    </div>
                    <div class="col-4">
                      <select class="form-control selectric">
                        <option selected>-</option>
                        <option> < 1.500.000 </option>
                        <option> 1.500.000 s/d 2.500.000 </option>
                        <option> 2.500.000 s/d 3.500.000 </option>
                        <option> 3.500.000 s/d 5.000.000 </option>
                        <option> > 5.0000.0000 </option>
                      </select>
                    </div>
                    <div class="col-4">
                      <input type="file">
                    </div>
                  </div>
                </div>
      
                <div class="form-group">
                  <div class="row">
                    <div class="col-2"> 
                      <p>Tanggungan Orang Tua </p>
                    </div>
                    <div class="col-4">
                      <select class="form-control selectric">
                        <option selected>-</option>
                        <option>4 Anak</option>
                        <option>3 Anak</option>
                        <option>2 Anak</option>
                        <option>1 Anak</option>
                      </select>
                    </div>
                    <div class="col-4">
                      <input type="file">
                    </div>
                  </div>
                </div> --}}
                
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
