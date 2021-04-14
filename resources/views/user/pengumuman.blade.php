@extends('layouts.user.app')

@section('content')

<div class="section-header">
  <h1>Pengumuman</h1>
  <div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Pengumuman</a></div>
  </div>
</div>

<div class="section-body">

    <div class="row">
      <div class="col-12 col-md-4 col-lg-4">
      </div>

      @foreach($anouncements as $row)
      <div class="col-12 col-md-4 col-lg-4">
        <div class="pricing pricing-highlight">
          <div class="pricing-title">
            Periode Beasiswa
          </div>
          <div class="pricing-padding">
            <div class="pricing-price">
              <h5>{{date('d', strtotime($row->period->start))}}-{{date('F', strtotime($row->period->start))}}-{{date('Y', strtotime($row->period->start))}}</h5>
              <div class="mt-5"></div>
              <h5>{{date('d', strtotime($row->period->end))}}-{{date('F', strtotime($row->period->end))}}-{{date('Y', strtotime($row->period->end))}}</h5>
            </div>
            <div class="pricing-cta">
              <a href="/periode/{{$row->period->start .'_'.$row->period->end }}/pengumuman_beasiswa/{{ $row->file }}">Download</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach

      <div class="col-12 col-md-4 col-lg-4">
      </div>
    </div>
  </div>
@endsection
