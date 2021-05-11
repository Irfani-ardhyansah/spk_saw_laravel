@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Mahasiswa</h1>
        <div class="ml-auto">
            <button class="btn btn-success" data-toggle="modal" data-target="#modalImportExcel">
                Import Data Excel
            </button>
        </div>
    </div>

        <form action="{{ route('admin.mahasiswa.search') }}" class="form-inline" method="GET">
            <a href="{{ route('admin.mahasiswa.pdf') }}" class="btn-sm btn-outline-danger"><i class="ion ion-document"></i></a>
        <div class="row ml-auto">
            <div class="col-2 mt-1">
                <div class="form-group">
                    <button class="btn-sm btn-outline-primary" type="submit">Cari</button>
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    <select class="form-control" name="prodi_id">
                        <option selected>All</option>
                        @foreach($prodis as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        </form>

    <div class="section-body mt-3">
        <div class="card">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table id="tablemahasiswa" class="table table-striped table-md">
                            <tr>
                                <thead>
                                    <th>#</th>
                                    <th>NPM</th>
                                    <th>Nama</th>
                                    <th>No HP</th>
                                    <th>Semester</th>
                                    <th>Prodi</th>
                                    <th>Action</th>
                                </thead>
                            </tr>
                        @foreach($mahasiswas as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->user->npm}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->semester}}</td>
                            <td>{{ $row->prodi->name }}</td>
                            <td>
                                    <a href="{{ route('admin.mahasiswa.detail', ['id' => Crypt::encrypt($row->id)]) }}" class="btn btn-info btn-sm">Info</a>
                                    <a href="#" class="btn btn-danger btn-sm mahasiswa-delete" mahasiswa_id="{{ $row->id }}" mahasiswa="{{ $row->name }}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $mahasiswas->links() }}
                </div>
            </div>
          </div>
    </div>
</section>

{{-- Modal Upload Excel --}}
<div class="modal fade" id="modalImportExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Upload File Data Excel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('admin.mahasiswa.store') }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-5">
                            <a href="/data_mahasiswa/Contoh_Format_Data_Mahasiswa.xlsx" class="btn btn-success">Contoh Format Excel</a>
                        </div>

                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-6 {{ $errors->has('file') ? 'has-error' : '' }}">
                            <label for="">File</label>
                            <input type="file" class="form-control {{ $errors->has('file')  ? 'is-invalid' : ''}}" name="file">
                            <div class="invalid-feedback">
                                {{ $errors->first('file') }}
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Upload</button>

                </form>
            </div>
            
            <div class="modal-footer">
            </div>

        </div>
    </div>
</div>
@endsection

@section('footer')
    <script>
        $('.mahasiswa-delete').click(function(){
            var mahasiswa_id = $(this).attr('mahasiswa_id');
            var mahasiswa = $(this).attr('mahasiswa');
            swal({
                backdrop:false,
                title: "Yakin",
                text: "Menghapus " + mahasiswa + " ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = "/admin/mahasiswa/delete/" + mahasiswa_id;
                    }
                });
                event.preventDefault();
        });


        // $('#tablemahasiswa').DataTable({
        //     processing: true,
        //     serverSide: true,
        //     ajax: {
        //         url: '{{ route('admin.data.mahasiswa') }}'
        //     },
        //     columns: [
        //         {data: 'npm', name: 'npm'},
        //         {data: 'name', name: 'name'},
        //         {data: 'phone', name: 'phone', orderable: false},
        //         {data: 'semester', name: 'semester'},
        //         {data: 'prodi', name: 'prodi'},
        //         {data: 'action', name: 'action', orderable: false, searchable: false},
        //     ],
        // });

    </script>
@endsection
