@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Kuota Beasiswa</h1>
        <div class="ml-auto">
          <a href="{{route('admin.beasiswa.analisisFull', ['id' => $id])}}" class="btn btn-outline-info">
              Analisis
          </a>
      </div>  
    </div>

    <div class="section-body">
        <div class="card card-hero">
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
                <div class="row">
                @foreach($prodis as $row)
                  <div class="col-4">
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
                        <hr>
                        <div class="ticket-info">
                          <div>Kuota Prodi</div>
                          <div class="bullet"></div>
                          @php($kuota_prodi = $pendaftar / $total_mahasiswa * $kuota)
                          <div class="text-primary">{{round($kuota_prodi)}}</div>

                          <div class="ml-auto">
                            {{ session()->put('kuota_'.$row->name, round($kuota_prodi))}}
                            <a href="{{route('admin.beasiswa.analisisProdi', ['id' => $period->id, 'prodi_id' => $row->id])}}" class="btn-outline-info btn-sm">Analisis</a>
                          </div>
                          
                        </div>
                    </span>
                  </div>
                @endforeach
                </div>
              </div>
            </div>
          </div>
    </div>

</section>



@endsection


