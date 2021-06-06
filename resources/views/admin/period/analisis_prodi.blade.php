@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Analisis Periode {{ date('d', strtotime($beasiswa->start)) }} {{ date('F', strtotime($beasiswa->start)) }} {{ date('Y', strtotime($beasiswa->start)) }} s/d {{ date('d', strtotime($beasiswa->end)) }} {{ date('F', strtotime($beasiswa->end)) }} {{ date('Y', strtotime($beasiswa->end)) }}</h1>
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
                        @forelse($mahasiswas as $row)
                        <tr>
                            <td>{{$loop->iteration}}.</td>
                            <td>{{$row->user->npm}}</td>
                            <td>{{$row->name}}</td>
                            {{-- Mengambil Nilai Mahasiswa --}}
                            @foreach($values->where('mahasiswa_id', $row->id) as $value)
                                {{-- Melakukan pengecekan criteria --}}
                                @if($value->criteria->status == 1)
                                    <td>{{ $value->value }}</td>
                                @endif
                            @endforeach
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak Ada Data!</td>
                        </tr>
                        @endforelse
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
                        @forelse($mahasiswas as $row)
                        <tr>
                            <td>{{$loop->iteration}}.</td>
                            <td>{{$row->user->npm}}</td>
                            <td>{{$row->name}}</td>
                            {{-- Mengambil Nilai Mahasiswa --}}                            
                            @foreach($values->where('mahasiswa_id', $row->id) as $value)
                                {{-- Melakukan pengecekan kriteria --}}
                                @if($value->criteria->status == 1)
                                    {{-- Melakukan penghitungan normalisasi dengan memanggil helper normalisasi_prodi --}}
                                    <td>{{ normalisasi_prodi($values, $value) }}</td>
                                @endif
                            @endforeach
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak Ada Data!</td>
                        </tr>
                        @endforelse
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
                        {{-- Melakukan analisis dengan memanggil helper --}}
                        @php($hasil = analisis_prodi($values, $mahasiswas, $criterias_count))
                        {{-- Mendefinisi variabel --}}
                        @php($no = 0)
                        {{-- melakukan sort data secara asc --}}
                        @php(arsort($hasil))
                        {{-- Memanggil data dari variabel $hasil --}}
                        @forelse($hasil as $name => $value)
                            @php($no++)
                            <tr id="tr{{ $no }}">
                                {{-- memecah array pada variabel name --}}
                                @php($prodi = explode(" - ",$name) )
                                <td>{{ $prodi[0] }}</td>
                                <td>{{$prodi[1]}}</td>
                                <td>{{$prodi[2]}}</td>
                                <td>{{ $value }}</td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidak ada Data!</td>
                        </tr>
                        @endforelse

                    </table>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection