@extends('layouts.user.app')

@section('content')
<div class="section-header">
  <h1>{{$beasiswa->title}}</h1>
  <div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Home</a></div>
  </div>
</div>

<div class="section-body">
    <div class="card">
      <div class="card-body">
        <p>
          {!! $beasiswa->content !!}
        </p>
      </div>
    </div>
</div>
@endsection
