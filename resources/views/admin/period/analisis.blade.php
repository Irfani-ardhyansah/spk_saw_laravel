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
                            <th>{{$row->name}}</th>
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
                            <th>{{$row->name}}</th>
                            @endforeach
                        </tr>
                        @foreach($user_periods as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->user->mahasiswa->name}}</td>
                            @foreach($row->user->mahasiswa->values as $value)
                                @if($value->period_id == $period_id)
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
                            <th>IPK</th>
                            <th>Gaji Orang Tua</th>
                            <th>Tanggungan Orang Tua</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Irwansyah Saputra</td>
                            <td>0.67</td>
                            <td>1</td>
                            <td>0.50</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Nicholas Saputra</td>
                            <td>1</td>
                            <td>0.75</td>
                            <td>0.50</td>
                        </tr>
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
                        <tr>
                            <td>Irwansyah Saputra</td>
                            <td>0.27</td>
                        </tr>
                        <tr>
                            <td>Nicholas Saputra</td>
                            <td>0.26</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">
            </div>
        </div>
    </div>
</section>
@endsection