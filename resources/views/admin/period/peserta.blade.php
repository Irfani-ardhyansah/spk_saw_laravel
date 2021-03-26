@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Peserta Periode {{ $beasiswa->start }} s/d {{ $beasiswa->end }}</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>NPM</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>No HP</th>
                            <th>Semester</th>
                            <th>Prodi</th>
                            <th>Action</th>
                        </tr>
                        @forelse($pendaftar as $row) 
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->user->npm}}</td>
                            <td>{{$row->user->mahasiswa->name}}</td>
                            <td>
                            @if($row->status == '0')
                                <span class="badge badge-secondary">Menunggu</span>
                            @elseif($row->status == '1')
                                <span class="badge badge-success">Diterima</span>
                            @else
                                <span class="badge badge-danger">Ditolak</span>
                            @endif
                            </td>
                            <td>{{$row->user->mahasiswa->phone}}</td>
                            <td>{{$row->user->mahasiswa->semester}}</td>
                            <td>{{$row->user->mahasiswa->prodi}}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modalGantiStatus-{{ $row->id }}">Ganti Status</a>
                                <a href="/admin/periode/{{$period_id}}/peserta/{{$row->user->mahasiswa->id}}/nilai" class="btn btn-outline-info btn-sm">Nilai</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" style="text-align:center;">Tidak Ada Data</td>
                        </tr>
                        @endforelse
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">

            </div>
          </div>
    </div>
</section>

{{-- Modal Ganti Status --}}
@foreach($pendaftar as $row)
<div class="modal fade" id="modalGantiStatus-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ganti Status</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.beasiswa.status.peserta', ['id' => $row->id]) }}">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Status</label>
                            <select class="form-control selectric" name="status">
                                <option selected>-</option>
                                <option value="0" {{ $row->status  == "0" ? 'selected' : '' }}>Menunggu</option>
                                <option value="1" {{ $row->status  == "1" ? 'selected' : '' }}>Diterima</option>
                                <option value="2" {{ $row->status  == "2" ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>

                </form>
            </div>
            
            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>
@endforeach

@endsection