@extends('layouts.admin.app')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Kriteria</h1>
        <div class="ml-auto">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambahKriteria">
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
                            <th>Inisial</th>
                            <th>Nama</th>
                            <th>Bobot</th>
                            <th>Sifat</th>
                            <th>Action</th>
                            <th>Nilai 
                                <a href="#" class="btn btn-sm btn-light" style="text-align-right">Tambah Nilai</a>
                            </th>
                            <th>#</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>C1</td>
                            <td>IPK</td>
                            <td>35%</td>
                            <td>Benefit</td>
                            <td>
                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                <a href="#" class="btn btn-success btn-sm">Edit</a>
                            </td>
                            <td>
                                <table>
                                    <tr>
                                        <td> >= 3.50 (1) </td>
                                        <td>
                                            <a href="#" class="btn btn-outline-success btn-sm">Edit</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 3.25 S/D 3.50 (0.75) </td>
                                        <td>
                                            <a href="#" class="btn btn-outline-success btn-sm">Edit</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 3.00 S/D 3.25 (0.50) </td>
                                        <td>
                                            <a href="#" class="btn btn-outline-success btn-sm">Edit</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td> 2.75 S/D 3.00 (0.25) </td>
                                        <td>
                                            <a href="#" class="btn btn-outline-success btn-sm">Edit</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>  < 2.75 (0) </td>
                                        <td>
                                            <a href="#" class="btn btn-outline-success btn-sm">Edit</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-light">Tambah Nilai</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="card-footer text-right">

            </div>
          </div>
    </div>
</section>

{{-- Modal Tambah Kriteria --}}
<div class="modal fade" id="modalTambahKriteria" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Kriteria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <div class="modal-body">

        </div>
        
        <div class="modal-footer">
 