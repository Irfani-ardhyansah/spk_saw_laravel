@extends('layouts.user.app')

@section('content')

<div class="section-header">
  <h1>Periode Beasiswa</h1>
  <div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="{{ url('/user') }}">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="{{ url('/user/beasiswa') }}">Beasiswa</a></div>
  </div>
</div>

<div class="section-body">
    <div class="col-12 mb-4">
        @forelse($periods as $row)
        <div class="hero bg-primary text-white mb-3">
            <div class="hero-inner">

                <div class="row">
                    <div class="col-6">
                        <h3 class="lead">Dimulai : </h3>
                        <p>{{ date('d', strtotime($row->start)) }} {{ date('F', strtotime($row->start)) }} {{ date('Y', strtotime($row->start)) }}</p>
                    </div>
                    <div class="col-6">
                        <h3 class="lead">Berakhir : </h3>
                        <p>{{ date('d', strtotime($row->end)) }} {{ date('F', strtotime($row->end)) }} {{ date('Y', strtotime($row->end)) }}</p>
                    </div>
                </div>


                <div class="row">
                    <div class="col-3"></div>

                    <div class="col-3">
                        <div class="mt-4">
                            <a href="/pengumuman_periode/{{$row->file }}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-file"></i> File Pengumuman</a>
                        </div>
                    </div>

                    <div class="col-3"></div>

                    <div class="col-3">
                        <div class="mt-4">
                            {{-- @foreach($user_periods as $item) --}}
                            {{-- {{dd($item->user_id == Auth()->user()->id)}} --}}
                                @if($row->id == $period_id)
                                <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left">Sudah Terdaftar!</a>
                                @else
                                <a href="{{route('user.period.create', ['id' => $row->id])}}" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="far fa-user"></i> Daftar Beasiswa</a>
                                @endif
                            {{-- @endforeach --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="hero bg-primary text-white">
            <div class="hero-inner">

                <div class="row">
                    <div class="col-12">
                        <h3 class="lead">Tidak Ada Data Beasiswa</h3>
                    </div>
                </div>

            </div>
        </div>
        @endforelse
    </div>
</div>

@endsection
