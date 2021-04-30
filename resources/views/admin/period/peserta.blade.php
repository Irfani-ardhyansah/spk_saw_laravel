@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Periode Beasiswa {{ date('d', strtotime($beasiswa->start)) }} {{ date('F', strtotime($beasiswa->start)) }} {{ date('Y', strtotime($beasiswa->start)) }} s/d {{ date('d', strtotime($beasiswa->end)) }} {{ date('F', strtotime($beasiswa->end)) }} {{ date('Y', strtotime($beasiswa->end)) }}</h1>
    </div>
    <h2 class="section-title">Data Peserta</h2>
    <div class="section-body">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>No HP</th>
                            <th>Semester</th>
                            <th>Prodi</th>
                            <th>Action</th>
                        </tr>
                        @forelse($pendaftar as $row) 
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->user->npm}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->semester}}</td>
                            <td>{{$row->prodi->name}}</td>
                            <td>
                                <a href="/admin/periode/{{$period_id}}/peserta/{{$row->id}}/nilai" class="btn btn-outline-info btn-sm">Nilai</a>
                                <a href="#" class="btn btn-outline-danger btn-sm peserta-delete" period_id="{{ $period_id }}" peserta_id="{{ $row->id }}" peserta_name="{{ $row->name }}" >Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" style="text-align:center;">Tidak Ada Data</td>
                        </tr>
                        @endforelse
                    </table>
                {{$pendaftar->links()}}
                </div>
            </div>
          </div>
    </div>
</section>

@endsection

@section('footer')
    <script>
        $('.peserta-delete').click(function(){
            var period_id = $(this).attr('period_id');
            var peserta_id = $(this).attr('peserta_id');
            var peserta_name = $(this).attr('peserta_name');
            swal({
                backdrop:false,
                title: "Yakin ?",
                text: "Menghapus Data Dengan Nama " + peserta_name + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/periode/" + period_id + "/peserta/" + peserta_id + "/delete";
                }
                });
                event.preventDefault();
        });
    </script>
@endsection