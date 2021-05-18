@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Analisis</h1>
        {{-- {{ session()->get('kuota_'.$prodi->name) }} --}}
    </div>

<h2 class="section-title">Prodi {{ $prodi->name }} </h2>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h5>Bobot Nilai</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md text-center">
                        <tr>
                        {{-- Mengambil Kriteria --}}
                        @foreach($criterias as $row)
                            <th>{{$row->code}} = {{$row->name}} - {{ $row->character }}</th>
                        @endforeach
                        </tr>
                        <tr>
                        {{-- Mengambil Bobot Kriteria --}}
                        @foreach($criterias as $row)
                            <td>{{$row->weight}}</td>
                        @endforeach
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Nilai Mahasiswa</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-md">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama</th>
                                {{-- Mengambil Kode Kriteria --}}
                                @foreach($criterias as $row)
                                <th>{{$row->code}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        {{-- Mengambil Data Mahasiswa --}}
                        @foreach($mahasiswas as $row)
                        <tr>
                            <td>{{$loop->iteration}}.</td>
                            <td>{{$row->user->npm}}</td>
                            <td>{{$row->name}}</td>
                            {{-- Mengambil Nilai Mahasiswa --}}
                            @foreach($values->where('mahasiswa_id', $row->id) as $value)
                                @if($value->criteria->status == 1)
                                    <td>{{ $value->value }}</td>
                                @endif
                            @endforeach
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Hasil Normalisasi</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-md">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama</th>
                                {{-- Mengambil Data Kriteria --}}
                                @foreach($criterias as $row)
                                <th>{{$row->code}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        @foreach($mahasiswas as $row)
                        <tr>
                            <td>{{$loop->iteration}}.</td>
                            <td>{{$row->user->npm}}</td>
                            <td>{{$row->name}}</td>
                            {{-- Mengambil Nilai Mahasiswa --}}                            
                            @foreach($row->values as $value)
                                <td>{{ normalisasi_prodi($values, $value) }}</td>
                            @endforeach
                        </tr>
                        @endforeach

                    </table>
                </div>
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
                        @php($hasil = analisis_prodi($values, $mahasiswas, $criterias_count))
                        @php($no = 0)
                        @php(arsort($hasil))
                        @foreach($hasil as $name => $value)
                            @php($no++)
                            <tr id="tr{{ $no }}">
                                @php($prodi = explode(" - ",$name) )
                                <td>{{ $prodi[0] }}</td>
                                <td>{{$prodi[1]}}</td>
                                <td>{{$prodi[2]}}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection