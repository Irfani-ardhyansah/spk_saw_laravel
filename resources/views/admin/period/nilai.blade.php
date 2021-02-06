@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Nilai Seleksi <b>Irwansyah Putra</b> Prodi <b>Teknologi Informasi</b> </h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Kriteria</th>
                            <th>Nilai</th>
                            <th>File</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>IPK</td>
                            <td>3.50</td>
                            <td> <a href="#"><button>File</button></a> </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Gaji Orang Tua</td>
                            <td>1.000.000 - 1.500.000</td>
                            <td> <a href="#"><button>File</button></a> </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Tanggungan Orang Tua</td>
                            <td>4</td>
                            <td> <a href="#"><button>File</button></a> </td>
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