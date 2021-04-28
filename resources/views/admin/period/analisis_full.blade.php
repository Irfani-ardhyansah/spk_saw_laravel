@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Analisis</h1>
        <div class="ml-auto">
            <a href="{{ route('admin.beasiswa.analisis.pdf', ['id' => $id]) }}" class="btn btn-outline-secondary"><i class="ion ion-document-text"></i></a>
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
                        @foreach($prodi as $prod)
                            @php($hasil = analisis_full($prod, $values, $mahasiswas, $criterias_count))
                            @php($no = 0)
                            @php(arsort($hasil))
                            @php($result = array_slice($hasil, 0, session()->get('kuota_'.$prod->name)))
                            @foreach($result as $name => $value)
                                @php($no++)
                                <tr id="tr{{ $no }}">
                                    @php($prodi = explode(" - ",$name) )
                                    <td>{{ $prodi[0] }}</td>
                                    <td>{{$prodi[1]}}</td>
                                    <td>{{$prodi[2]}}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </table>
                </div>
            </div>
    </div>

    </div>
</section>
@endsection