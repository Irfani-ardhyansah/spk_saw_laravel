@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Mahasiswa</h1>
    </div>

    @if (session('success'))
    <div class="alert alert-primary alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        {!! session('success') !!}
    </div>
    @endif

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
                        @foreach($mahasiswas as $row)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$row->user->npm}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->semester}}</td>
                            <td>{{$row->prodi}}</td>
                            <td>
                                <form method="POST" action="{{ route('admin.mahasiswa.delete', ['id' => $row->id]) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ route('admin.mahasiswa.detail', ['id' => $row->id]) }}" class="btn btn-info btn-sm">Info</a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Menghapus Data {{ $row->name }} ?');" >Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {{ $mahasiswas->links() }}
                </div>
            </div>
            <div class="card-footer text-right">

            </div>
          </div>
    </div>
</section>
@endsection