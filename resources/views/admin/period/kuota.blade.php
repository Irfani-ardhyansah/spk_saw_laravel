@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Kuota Beasiswa</h1>
    </div>

    <div class="section-body">
        <div class="card card-hero">
            {{-- <div class="card-header">
              <div class="card-icon">
                <i class="far fa-question-circle"></i>
              </div>
              <h4>14</h4>
              <div class="card-description">Customers need help</div>
            </div> --}}
            <div class="card-body p-0">
              <div class="tickets-list">
                <span href="#" class="ticket-item">
                    <div class="ticket-title">
                        <h4>
                          Kuota Beasiswa
                          <div class="bullet"></div>
                          {{$kuota = $period->quota}}
                        </h4>
                    </div>
                    <div class="ticket-info">

                    </div>
                </span>
              </div>
              <div class="tickets-list">
                @foreach($prodis as $row)
                    <span href="#" class="ticket-item">
                        <div class="ticket-title">
                            <h4>
                                {{$row->name}}
                            </h4>
                        </div>
                        <div class="ticket-info">
                          <div>Total Mahasiswa</div>
                          <div class="bullet"></div>
                          <div class="text-primary"> {{$total_mahasiswa = $row->total}}</div>
                        </div>
                        <div class="ticket-info">
                          <div>Jumlah Pendaftar</div>
                          <div class="bullet"></div>
                          <div class="text-primary">{{$pendaftar = $mahasiswas->where('prodi_id', $row->id)->count()}}</div>
                        </div>
                        <div class="ticket-info">
                          <div>Kuota</div>
                          <div class="bullet"></div>
                          @php($kuota_prodi = $pendaftar / $total_mahasiswa * $kuota)
                          <div class="text-primary">{{round($kuota_prodi)}}</div>
                      </div>
                    </span>
                @endforeach
              </div>
            </div>
          </div>
    </div>

</section>



@endsection


