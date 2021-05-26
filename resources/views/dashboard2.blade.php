<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistem Pengambilan Keputusan</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link rel="stylesheet" href="{{ asset('css/dashboard/styles2.css')}}">
    </head>

    <body id="page-top">
        <!-- Masthead-->
        <header class="masthead">
            <div class="container d-flex h-100 align-items-center">
                <div class="mx-auto text-center">
                    <h1 class="mx-auto my-0">Sistem Pengambilan Keputusan</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Beasiswa PPA</h2>
                    <a class="btn btn-success js-scroll-trigger" href="{{ url('/login')}}">Login</a>
                    <a class="btn btn-success js-scroll-trigger" href="{{ url('/register')}}">Register</a>
                </div>
            </div>
        </header>
        <!-- Footer-->
        <footer class="footer small text-center text-white-50" style="background-color: #131C21"><div class="container">Copyright &copy; 2021 <div class="bullet"></div> Develop By <a href="https://gitlab.com/Irfani-ardhyansah/">Mochamad Irfani Ardhyansah</a></div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{asset('js/dashboard/scripts.js')}}"></script>
    </body>

</html>
