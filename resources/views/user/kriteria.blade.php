@extends('layouts.user.app')

@section('content')

<div class="section-header">
  <h1>Kriteria</h1>
  <div class="section-header-breadcrumb">
  <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
  <div class="breadcrumb-item"><a href="#">Kriteria</a></div>
  </div>
</div>

<div class="section-body">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-4">
                    <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#ipk" role="tab" aria-controls="home" aria-selected="true">IPK</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#gaji" role="tab" aria-controls="profile" aria-selected="false">Pendapatan Orang Tua</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#tanggungan" role="tab" aria-controls="contact" aria-selected="false">Jumlah Tanggungan Orang Tua</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-sm-12 col-md-8">
                    <div class="tab-content no-padding" id="myTab2Content">
                        <div class="tab-pane fade show active" id="ipk" role="tabpanel" aria-labelledby="">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </div>
                        <div class="tab-pane fade" id="gaji" role="tabpanel" aria-labelledby="profile-tab4">
                        Sed sed metus vel lacus hendrerit tempus. Sed efficitur velit tortor, ac efficitur est lobortis quis. Nullam lacinia metus erat, sed fermentum justo rutrum ultrices. Proin quis iaculis tellus. Etiam ac vehicula eros, pharetra consectetur dui. Aliquam convallis neque eget tellus efficitur, eget maximus massa imperdiet. Morbi a mattis velit. Donec hendrerit venenatis justo, eget scelerisque tellus pharetra a.
                        </div>
                        <div class="tab-pane fade" id="tanggungan" role="tabpanel" aria-labelledby="contact-tab4">
                        Vestibulum imperdiet odio sed neque ultricies, ut dapibus mi maximus. Proin ligula massa, gravida in lacinia efficitur, hendrerit eget mauris. Pellentesque fermentum, sem interdum molestie finibus, nulla diam varius leo, nec varius lectus elit id dolor. Nam malesuada orci non ornare vulputate. Ut ut sollicitudin magna. Vestibulum eget ligula ut ipsum venenatis ultrices. Proin bibendum bibendum augue ut luctus.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
