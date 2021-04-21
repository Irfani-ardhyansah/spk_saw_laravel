@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Analisis</h1>
    </div>

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
                        @foreach($user_periods as $row)
                        <tr>
                            <td>{{$loop->iteration}}.</td>
                            <td>{{$row->user->npm}}</td>
                            <td>{{$row->user->mahasiswa->name}}</td>
                            {{-- Mengambil Nilai Mahasiswa --}}
                            @foreach($row->user->mahasiswa->values as $value)
                                {{-- Memanggil helper untuk memanggil value --}}
                                <td>{{ values($value, $period_id) }}</td>
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
                        @foreach($user_periods as $row)
                        <tr>
                            <td>{{$loop->iteration}}.</td>
                            <td>{{$row->user->npm}}</td>
                            <td>{{$row->user->mahasiswa->name}}</td>
                            {{-- Mengambil Nilai Mahasiswa --}}                            
                            @foreach($row->user->mahasiswa->values as $value)
                                <td>{{ normalisasi($values, $value, $period_id) }}</td>
                            @endforeach
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>

            <div class="form-group row mt-5">
                <form action="{{ route('admin.beasiswa.search', ['period_id' => $period_id]) }}" class="form-inline" method="GET">
                    <h6 class="col-sm-2 mt-2"> Jumlah </h6>
                    <div class="col-sm-5">
                        <input type="number" id="batas" name="batas" value="0" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <button type="submit"><i class="ion ion-document-text"></i>
                        </button>
                    </div>
                </form>
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
                        @php($hasil = analisis($values, $period_id, $user_periods, $criterias_count))
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

@section('footer')
    <script>
        $(document).ready(function () {
            $("#batas").keyup(function () {
                var value = parseInt($(this).val());
                console.log(value);
                
                for (i = 1; i <= value; i++) {
                    // document.getElementById('tr'+i).bgColor='#9cdfe7';
                    $('#tr'+i).css('background-color', '#A1ACBD'); 
                    $('#tr'+i).css('color', 'white'); 
                }

                if(value == 0) {
                    for (i = 1; i <= {{$no}}; i++) {
                        $("#tr"+i).removeAttr("style");
                    }

                }
            });

        });
    </script>
@endsection