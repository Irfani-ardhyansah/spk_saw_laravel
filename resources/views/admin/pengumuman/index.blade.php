@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Pengumuman</h1>
        <div class="ml-auto">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahPengumuman">
                Tambah
            </button>
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
                                <a href="#" class="btn btn-outline-danger btn-sm anouncement-delete" anouncement_id="{{ $row->id }}">Delete</a>
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
          </div>
    </div>
</section>

{{-- Modal Tambah Pengumuman --}}
<div class="modal fade" id="modalTambahPengumuman" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Pengumuman</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.pengumuman.save') }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-6 {{ $errors->has('period_id') ? 'has-error' : '' }}">
                            <label>Periode</label>
                            <select class="form-control selectric {{ $errors->has('period_id')  ? 'is-invalid' : ''}}" name="period_id">
                                <option selected>-</option>
                                @foreach($periods as $row)
                                <option value="{{$row->id}}">{{$row->start}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">
                                {{ $errors->first('period_id') }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-9 {{ $errors->has('file') ? 'has-error' : '' }}">
                        <label for="">File Pengumuman</label>
                            <input type="file" class="form-control {{ $errors->has('file')  ? 'is-invalid' : ''}}" name="file" value="{{ old('file') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('file') }}
                            </div>
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

@endsection

@section('footer')
<script src="{{ asset('/assets/js/toastr.min.js')}}"></script>
    <script>
        $('.anouncement-delete').click(function(){
            var anouncement_id = $(this).attr('anouncement_id');
            swal({
                backdrop:false,
                title: "Yakin ?",
                text: "Menghapus Pengumuman ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/admin/pengumuman/delete/" + anouncement_id;
                    }
                });
                event.preventDefault();
        });
    </script>
@endsection

