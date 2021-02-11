@extends('layouts.user.app')

@section('content')

<div class="section-header">
  <h1>Kriteria</h1>
  <div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Kriteria</a></div>
  </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4">
                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                        @foreach($criterias as $row)
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab4" data-toggle="tab" href="#{{$row->code}}" role="tab" aria-controls="home" aria-selected="true">{{$row->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-8">
                    <div class="tab-content no-padding" id="myTab2Content">
                        @foreach($criterias as $row)
                        <div class="tab-pane fade show" id="{{$row->code}}" role="tabpanel" aria-labelledby="">
                        {{$row->information}}
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
