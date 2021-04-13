@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Pengumuman</h1>
        <div class="ml-auto">
        </div>    
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md">
                        <tr>
                            <th>#</th>
                            <th>Periode</th>
                            <th>File</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        @forelse($anouncements as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->period->start}} S/D {{$row->period->end}}</td>
                            <td>
                                <a href="/periode/{{$row->period->start .'_'.$row->period->end }}/pengumuman_beasiswa/{{ $row->file }}">{{$row->file}}</a>
                            </td>
                            <td>
                                @if($row->status == 0)
                                <span class="badge badge-secondary">Belum Disahkan</span>
                                @else
                                <span class="badge badge-success">Disahkan</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-outline-warning btn-sm" data-toggle="modal" data-target="#modalGantiStatus-{{ $row->id }}">Pengesahan</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" style="text-align:center;">Tidak Ada Data</td>
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
@foreach($anouncements as $row)
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
                <form method="POST" action="{{ route('pengumuman.update', ['id' => $row->id]) }}">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="form-group col-6">
                            <label>Status</label>
                            <select class="form-control selectric" name="status">
                                <option selected>-</option>
                                <option value="1" {{ $row->status  == "1" ? 'selected' : '' }}>Disahkan</option>
                                <option value="0" {{ $row->status  == "0" ? 'selected' : '' }}>Belum Disahkan</option>
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