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
            <div class="card-footer text-right">
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
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->user->mahasiswa->name}}</td>
                            {{-- Mengambil Nilai Mahasiswa --}}
                            @foreach($row->user->mahasiswa->values as $value)
                                {{-- Mengecek menampilkan berdasarkan periode beasiswa dan status kriteria yang 1 --}}
                                @if($value->period_id == $period_id && $value->criteria->status == 1)
                                    <td>{{$value->value}}</td>
                                @endif
                            @endforeach
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
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
                                <th>Nama</th>
                                {{-- Mengambil Data Kriteria --}}
                                @foreach($criterias as $row)
                                <th>{{$row->code}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        {{-- Membuat Variabel Hasil --}}
                        @php($hasil = array())
                        @foreach($user_periods as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->user->mahasiswa->name}}</td>
                            {{-- Mengambil Nilai Mahasiswa --}}                            
                            @foreach($row->user->mahasiswa->values as $value)
                                {{-- Cek Apabila Kriteria Termasuk Cost --}}
                                @if($value->period_id == $period_id && $value->criteria->status == 1)
                                    @if($value->criteria->character == 'Cost')
                                        {{-- Menghitung Nilai Normalisasi Apabila COST --}}
                                        @php($minimum = (min($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray())))
                                        @php($cost = $minimum / $value->value)
                                        {{-- Mendapat Nilai Normalisasi COST --}}
                                        <td>{{ $cost }}</td>
                                        {{-- Menghitung hasil normalisasi dengan bobot kriteria --}}
                                        @php($nilai = $cost * $value->criteria->weight)
                                        {{-- Memasukkan Dalam Array $hasil --}}                                        
                                        @php(array_push($hasil,$nilai))
                                
                                    {{-- Cek Apabila Kriteria Termasuk Benefit --}}
                                    @elseif($value->criteria->character == 'Benefit')
                                        {{-- Menghitung Nilai Normalisasi Apabila BENEFIT --}}
                                        @php($maximum = (max($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray())))
                                        @php($benefit = $value->value / $maximum)
                                        {{-- Mendapat Nilai Normalisasi BENEFIT --}}
                                        <td>{{ $benefit }}</td>
                                        {{-- Menghitung hasil normalisasi dengan bobot kriteria --}}
                                        @php($nilai = $benefit * $value->criteria->weight)
                                        {{-- Memasukkan Dalam Array $hasil --}}                                        
                                        @php(array_push($hasil,$nilai))

                                    @endif
                                @endif

                            @endforeach

                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
            </div>
        </div>

            <div class="form-group row mt-5">
                <form action="{{ route('admin.beasiswa.search', ['period_id' => $period_id]) }}" class="form-inline" method="GET">
                    <h6 class="col-sm-2 mt-2"> Jumlah </h6>
                    <div class="col-sm-5">
                        <input type="number" id="batas" name="batas" class="form-control">
                    </div>
                    <div class="col-sm-4">
                        <button type="submit"><i class="fas fa-file-pdf"></i>
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
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Nilai</th>
                        </tr>
                        {{-- Membuat array $nama --}}
                        @php($nama = array())
                        @php($np =array())
                            {{-- Mengambil data mahasiswa --}}
                            @foreach($user_periods as $row)
                                {{-- Memasukkan Nama Mahasiswa dalam array $nama --}}
                                @php(array_push($nama,$row->user->mahasiswa->name))
                                @php(array_push($nama, prodi($row->user->mahasiswa->prodi)))
                                @php($coba = array_chunk($nama, 2))
                                @foreach($coba as $cob)
                                    @php($co = implode(" - ",$cob))  
                                @endforeach
                                @php(array_push($np,$co))
                            @endforeach
                        
                        {{-- Membuat array $nilai --}}
                        @php($nilai = array())
                        {{-- Memecah array $hasil --}}
                        @php($result = array_chunk($hasil, $criterias_count))
                            {{-- Mengambil data result --}}
                            @foreach($result as $r)
                                {{-- menghitung total nilai dan memasukkan kedalam variable $hasil_pembobotan --}}
                                @php($hasil_pembobotan = array_sum($r))
                                {{-- Memasukkan hasil_pembobotan ke dalam array  --}}
                                @php(array_push($nilai,$hasil_pembobotan))
                            @endforeach

                            {{-- Menggabung array $nama dan $nilai --}}
                            @php($hasil = array_combine($np,$nilai))
                                {{-- Mensortir Data DESC dari value array $array --}}
                                @php(arsort($hasil))
                                @php($no = 0)
                                @foreach($hasil as $name => $value)
                                    @php($no++)
                                    <tr id="tr{{ $no }}">
                                        @php($prodi = explode(" - ",$name) )
                                        <td>{{ $prodi[0] }}</td>
                                        <td>{{$prodi[1]}}</td>
                                        <td>{{ $value }}</td>
                                    </tr>
                                @endforeach

                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
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
                    $('#tr'+i).css('background-color', '#FAFAFA'); 
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