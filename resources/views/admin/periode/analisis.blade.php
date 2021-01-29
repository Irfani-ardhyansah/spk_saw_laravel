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
                            <th>IPK</th>
                            <th>Gaji Orang Tua</th>
                            <th>Tanggungan Orang Tua</th>
                        </tr>
                        <tr>
                            <td>0.35</td>
                            <td>0.35</td>
                            <td>0.30</td>
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
                            <th>IPK</th>
                            <th>Gaji Orang Tua</th>
                            <th>Tanggungan Orang Tua</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Irwansyah Saputra</td>
                            <td>0.50</td>
                            <td>0.75</td>
                            <td>0.25</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Nicholas Saputra</td>
                            <td>1</td>
                            <td>0.25</td>
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