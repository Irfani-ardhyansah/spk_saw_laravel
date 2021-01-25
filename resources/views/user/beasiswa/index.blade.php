@extends('layouts.user.app')

@section('content')

<div class="section-header">
  <h1>Periode Beasiswa</h1>
  <div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Beasiswa</a></div>
  </div>
</div>

<div class="section-body">
    <div class="col-12 mb-4">
        <div class="hero bg-primary text-white">
            <div class="hero-inner">

                <div class="row">
                    <div class="col-6">
                        <h3 class="lead">Dimulai : </h3>
                        <p>31 Desember 2020</p>
                    </div>
                    <div class="col-6">
                        <h3 class="lead">Berakhir : </h3>
                        <p>1 Januari 2021</p>
                    </div>
                </div>


                <div class="row">
                    <div class="col-3"></div>

                    <div class="col-3">
                        <div class="mt-4">
                            <a href="#" class="btn btn-outline-white btn-lg btn-icon icon-left"><i class="fas fa-file"></i> File Pengumuman</a>
                        </div>
                    </div>

                    <div class="col-3"></div>

                    <div class="col-3">
                        <div class="mt-4">
                            <button type="button" class="btn btn-outline-white btn-lg btn-icon icon-left" data-toggle="modal" data-target="#exampleModal"><i class="far fa-user"></i> Daftar Beasiswa</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
