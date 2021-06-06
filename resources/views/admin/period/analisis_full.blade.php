@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Analisis Periode {{ date('d', strtotime($beasiswa->start)) }} {{ date('F', strtotime($beasiswa->start)) }} {{ date('Y', strtotime($beasiswa->start)) }} s/d {{ date('d', strtotime($beasiswa->end)) }} {{ date('F', strtotime($beasiswa->end)) }} {{ date('Y', strtotime($beasiswa->end)) }}</h1>
        <div class="ml-auto">
            <a href="{{ route('admin.beasiswa.analisis.pdf', ['id' => $id]) }}" target="_blank"  class="btn btn-outline-secondary"><i class="ion ion-document-text"></i></a>
        </div>
    </div>

    <div class="card mt-2">
            <div class="card-header">
                <h5>Hasil Hitung</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="table-datatables" class="table table-md">
                        <tr>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Nilai</th>
                        </tr>
                        @php($no = 0)
                        @foreach($prodi as $prod)
                            @php($hasil = analisis_full($prod, $values, $mahasiswas, $criterias_count))
                            @php(arsort($hasil))
                            @php($result = array_slice($hasil, 0, session()->get('kuota_'.$prod->name)))
                            @foreach($result as $name => $value)
                                @php($no += 1)

                                @if($no <= $period->quota)
                                    <tr id="tr{{ $no }}">
                                        @php($prodi = explode(" - ",$name) )
                                        <td>{{ $prodi[0] }}</td>
                                        <td>{{$prodi[1]}}</td>
                                        <td>{{$prodi[2]}}</td>
                                        <td>{{ $value }}</td>
                                    </tr>
                                @else
                                    <tr id="tr{{ $no }}" style="background-color: #A1ACBD;">
                                        @php($prodi = explode(" - ",$name) )
                                        <td>{{ $prodi[0] }}</td>
                                        <td>{{$prodi[1]}}</td>
                                        <td>{{$prodi[2]}}</td>
                                        <td>{{ $value }}</td>
                                    </tr>
                                @endif

                            @endforeach
                        @endforeach
                    </table>
                </div>
            </div>
    </div>

    </div>
</section>
@endsection