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

    <div class="row">
        <div class="col-3">
            <div class="form-group">
                <select class="form-control" name="prodi">
                    <option selected>-</option>
                    <option value="TI">Teknologi Informasi</option>
                    <option value="Meto">Mesin Otomotif</option>
                    <option value="TKK">Teknik Komputer Kontrol</option>
                    <option value="Teklis">Teknik Listrik</option>
                    <option value="Kereta">Teknik Perkeretaapian</option>
                    <option value="Kompak">Komputer Akuntansi</option>
                    <option value="Akuntansi">Akuntansi</option>
                    <option value="Adbis">Administrasi Bisnis</option>
                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                </select>
            </div>
        </div>
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