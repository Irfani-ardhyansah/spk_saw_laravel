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
                        @foreach($criterias as $row)
                            <th>{{$row->code}} = {{$row->name}}</th>
                        @endforeach
                        </tr>
                        <tr>
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
                    <table class="table table-striped table-md">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            @foreach($criterias as $row)
                            <th>{{$row->code}}</th>
                            @endforeach
                        </tr>
                        @foreach($user_periods as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->user->mahasiswa->name}}</td>
                            @foreach($row->user->mahasiswa->values as $value)
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
                    <table class="table table-striped table-md">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            @foreach($criterias as $row)
                            <th>{{$row->code}}</th>
                            @endforeach
                        </tr>
                        @php($hasil = array())
                        @php($no = 0)
                        @foreach($user_periods as $row)
                        @php($no++)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->user->mahasiswa->name}}</td>
                            
                            @foreach($row->user->mahasiswa->values as $value)

                                @if($value->period_id == $period_id && $value->criteria->status == 1)
                                    @if($value->criteria->character == 'Cost')
                                        @php($minimum = (min($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray())))
                                        
                                        @php($cost = $minimum / $value->value)
                                        <td>{{ $cost }}</td>
                                        @php($nilai = $cost * $value->criteria->weight)
                                        @php(array_push($hasil,$nilai))

                                    @elseif($value->criteria->character == 'Benefit')

                                        @php($maximum = (max($values->where('criteria_id', $value->criteria_id)->pluck('value')->toArray())))

                                        @php($benefit = $value->value / $maximum)
                                        <td>{{ $benefit }}</td>
                                        @php($nilai = $benefit * $value->criteria->weight)
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

        <div class="card">
            <div class="card-header">
                <h5>Hasil Hitung</h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>Nama</th>
                            <th>Nilai</th>
                        </tr>
                        @foreach($user_periods as $row)
                        <tr>
                            <td>{{$row->user->mahasiswa->name}}</td>
                            <td>Data</td>
                        </tr>
                        @endforeach
                            @php($result = array_chunk($hasil, $no+1))
                            @foreach($result as $r)
                                @php($hasil_pembobotan = array_sum($r))
                                <td>{{$hasil_pembobotan}}</td>
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