@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Admin</h1>
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
                        <tr>
                            <td>1</td>
                            <td>Irwansyah Saputra</td>
                            <td>2017-01-09</td>
                            <td><a href="#" class="btn btn-danger">Delete</a></td>
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