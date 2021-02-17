<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Grayscale - Start Bootstrap Theme</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/dashboard/styles2.css')}}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#pengumuman">Pengumuman Penerima</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container d-flex h-100 align-items-center">
                <div class="mx-auto text-center">
                    <h1 class="mx-auto my-0">Sistem Pengambilan Keputusan</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Beasiswa PPA.</h2>
                    <a class="btn btn-primary js-scroll-trigger" href="{{ url('/login')}}">Login</a>
                    <a class="btn btn-primary js-scroll-trigger" href="{{ url('/register')}}">Register</a>
                </div>
            </div>
        </header>
        <!-- Contact-->
        <section class="contact-section bg-black" id="pengumuman">
            <div class="container">
                <h1 class="mx-auto my-0 mb-3">Pengumuman Penerimaan Beasiswa</h1>
                <div class="row">
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="far fa-circle text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0 mb-2">Periode Beasiswa</h4>
                                <h5 class="text-uppercase m-0">4 Februari 2020 - 10 Februari 2020</h5>
                                <hr class="my-4" />
                                <a class="btn btn-info btn-sm text-black-50">Unduh</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="far fa-circle  text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0 mb-2">Periode Beasiswa</h4>
                                <h5 class="text-uppercase m-0">4 Februari 2020 - 10 Februari 2020</h5>
                                <hr class="my-4" />
                                <a class="btn btn-info btn-sm text-black-50">Unduh</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3 mb-md-0">
                        <div class="card py-4 h-100">
                            <div class="card-body text-center">
                                <i class="far fa-circle  text-primary mb-2"></i>
                                <h4 class="text-uppercase m-0 mb-2">Periode Beasiswa</h4>
                                <h5 class="text-uppercase m-0">4 Februari 2020 - 10 Februari 2020</h5>
                                <hr class="my-4" />
                                <a class="btn btn-info btn-sm text-black-50">Unduh</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer small text-center text-white-50 bg-black"><div class="container">Copyright © Your Website 2020</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/dashboard/scripts.js')}}"></script>
    </body>
</html>
