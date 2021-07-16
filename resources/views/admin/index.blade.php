@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
    </div>

    <div class="section-body">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon"  style="background-color: #505976;">
              <i class="ion ion-ios-people"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Total Admin</h4>
              </div>
              <div class="card-body">
                {{$admin_count}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon" style="background-color: #D9F3FF">
              <i class="ion ion-android-contacts"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Data Mahasiswa</h4>
              </div>
              <div class="card-body">
                {{$mahasiswa_count}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon" style="background-color: #DF9F1F">
              <i class="ion ion-android-archive"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Data Kriteria</h4>
              </div>
              <div class="card-body">
                {{$criteria_count}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon" style="background-color: #897456">
              <i class="ion ion-android-time"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Periode Beasiswa</h4>
              </div>
              <div class="card-body">
                {{$period_count}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="panel">
            <div id="chartMahasiswa"></div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection

@section('footer')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
  Highcharts.chart('chartMahasiswa', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Laporan Pendaftar Beasiswa ' 
    },
    xAxis: {
        categories: {!! json_encode($prodiAll) !!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Mahasiswa'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:1f} Orang</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Mahasiswa Pendaftar',
        data: {!! json_encode($pendaftar) !!}

    }]
});
</script>
@endsection