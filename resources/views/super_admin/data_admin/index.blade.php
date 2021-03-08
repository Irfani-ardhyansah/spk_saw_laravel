@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Admin</h1>
        <div class="ml-auto">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahAdmin">
                Add
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
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Action</th>
                        </tr>
                        @foreach($admins as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->created_at}}</td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm data-delete" data_id="{{ $row->id }}" data_name="{{ $row->name }}" >Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">

            </div>
          </div>
    </div>
</section>

{{-- Modal Tambah Admin --}}
<div class="modal fade" id="modalTambahAdmin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Admin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
    
            <div class="modal-body">
                <form method="POST" action="{{ route('super_admin.save') }}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="form-group col-5 {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="">Name</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" value="{{ old('name') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        </div>

                        <div class="form-group col-7 {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="">Email</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-6 {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="">Password</label>
                            <input type="password" class="form-control {{ $errors->has('password')  ? 'is-invalid' : ''}}" name="password" value="{{ old('password') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        </div>
                        <div class="form-group col-6">
                            <label for="">Password Confirmation</label>
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>

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
        $('.data-delete').click(function(){
            var data_id = $(this).attr('data_id');
            var data_name = $(this).attr('data_name');

            swal({
                backdrop:false,
                title: "Yakin ?",
                text: "Menghapus Akun Dengan Nama " + data_name + " ?",
                icon: "warning",
                background: 'red',
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    window.location = "/admin/super/delete/" + data_id;
                }
                });
                event.preventDefault();
        });
    </script>
@endsection