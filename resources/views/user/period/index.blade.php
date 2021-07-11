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
        <div class="hero text-white mb-3" style="background-color: #36485E">
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
                            <a href="{{ url('/') }}/periode/{{$row->start .'_'.$row->end }}/pengumuman/{{ $row->file }}" target="_blank" class="btn btn-outline-secondary btn-lg btn-icon icon-left"><i class="ion ion-document"></i> File Pengumuman</a>
                        </div>
                    </div>

                    <div class="col-3"></div>

                    <div class="col-3">
                        <div class="mt-4">
                            @php($checker = $row->user_periods->where('user_id',auth()->user()->id))
                            @if($checker->contains('period_id', $row->id))
                                <a href="#" class="btn btn-outline-secondary btn-lg btn-icon icon-left">Sudah Terdaftar!</a>
                            @else
                                <a href="{{route('user.period.register', ['id' => Crypt::encrypt($row->id)])}}" class="btn btn-outline-secondary btn-lg btn-icon icon-left"><i class="ion ion-person-add"></i> Daftar Beasiswa</a>
                            @endif
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
                        <h3 class="lead">Tidak Ada Beasiswa Buka Pendaftaran</h3>
                    </div>
                </div>

            </div>
        </div>
        @endforelse
    </div>
</div>

@endsection
