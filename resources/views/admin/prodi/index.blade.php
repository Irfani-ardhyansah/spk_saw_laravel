@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Prodi</h1>
        <div class="ml-auto">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahProdi">
                Tambah
            </button>
        </div>
    </div>

    <div class="section-body mt-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="tablemahasiswa" class="table table-striped table-md">
                            <tr>
                                <thead>
                                    <th>#</th>
                                    <th>Prodi</th>
                                    <th>Total Mahasiswa</th>
                                    <th>Action</th>
                                </thead>
                            </tr>
                        @foreach($prodis as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->total}}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalEditProdi-{{ $row->id }}">Edit</button>
                                <a href="#" class="btn btn-danger btn-sm prodi-delete" prodi_id="{{ $row->id }}" prodi="{{ $row->name }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $prodis->links() }}
                </div>
            </div>
          </div>
    </div>
</section>

{{-- Modal Tambah Prodi --}}
<div class="modal fade" id="modalTambahProdi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.prodi.save') }}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-5 {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="">Nama Prodi</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>

                        <div class="form-group col-7 {{ $errors->has('total') ? 'has-error' : '' }}">
                            <label for="">Total Mahasiswa</label>
                            <input type="number" class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" name="total" value="{{ old('total') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('total') }}
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>

                </form>
            </div>

        </div>
    </div>
</div>

{{-- Modal Edit Prodi --}}
@foreach($prodis as $row)
<div class="modal fade" id="modalEditProdi-{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.prodi.update', ['id' => $row->id]) }}">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-5 {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="">Nama Prodi</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ $row->name }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>

                        <div class="form-group col-7 {{ $errors->has('total') ? 'has-error' : '' }}">
                            <label for="">Total Mahasiswa</label>
                            <input type="number" class="form-control {{ $errors->has('total') ? 'is-invalid' : '' }}" name="total" value="{{ $row->total }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('total') }}
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save changes</button>

                </form>
            </div>

        </div>
    </div>
</div>
@endforeach

@endsection

@section('footer')
    <script>
        $('.prodi-delete').click(function(){
            var prodi_id = $(this).attr('prodi_id');
            var prodi = $(this).attr('prodi');
            swal({
                backdrop:false,
                title: "Yakin",
                text: "Menghapus " + prodi + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/admin/prodi/delete/" + prodi_id;
                    }
                });
                event.preventDefault();
        });
    </script>
@endsection

