@extends('layouts.user.app')

@section('content')
<div class="section-header">
  @if($beasiswa != null) 
    <h1>{{$beasiswa->title}}</h1>
  @else
    <h1>Tidak Ada Data Dashboard</h1>
  @endif
  <div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Home</a></div>
  </div>
</div>

<div class="section-body">
    <div class="card">
      <div class="card-body">
        <p>
          @if($beasiswa != null) 
            {!! $beasiswa->content !!}
          @else
            Tidak Ada Data
          @endif
        </p>
      </div>
    </div>
</div>
@endsection
