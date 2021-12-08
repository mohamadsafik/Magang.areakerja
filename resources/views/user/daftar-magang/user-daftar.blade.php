<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Daftar Magang</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{asset('assets/home/img/favicon.png')}}" rel="icon">
    <link href="{{ asset('assets/user-daftar/img/apple-touch-logo.png') }}" rel="apple-touch-icon">
</head>

<body>
    <!-- modal alert -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Favicons -->


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/user-daftar/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user-daftar/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user-daftar/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user-daftar/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user-daftar/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{asset('assets/user-daftar/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/user-daftar/css/style.css') }}" rel="stylesheet">
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <!-- <h1 class="logo"><a href="index.html">BizLand<span>.</span></a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index.html" class="logo"><img src="{{asset('assets/user-daftar/img/logo.png')}}" alt=""></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <!-- <li><a class="nav-link scrollto" href="home">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#">Services</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li> -->
                    @guest
                    @if (Route::has('login'))
                    <li class="dropdown"><a href="login"><span>login</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>

                        </ul>
                    </li>
                    @endif
                    @else
                    @if (Auth::user()->level == 'user')
                    <li class="dropdown"><a href="#"><span>{{ Auth::user()->name }}</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li> <a class="bg-transparent text-danger fw-bold" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif

                    @endguest
                    <!-- <li><a class="nav-link scrollto" href="#contact">Contact</a></li> -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->


    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
            @foreach ($form as $p)
            @endforeach
            <div class="section-title">
                <h2>Pendaftaran Magang</h2>
                <h3><span>{{ Auth::user()->name }}</span></h3>
                <hr>
                @if (Auth::user()->status == 'aktif-magang')
                <button class="btn btn-primary text-white"><a class="text-white" href="/user">Klik untuk Mulai Magang</a></button>
                @endif
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box col-12">
                        @if (Auth::user()->status == '')
                        <div> <a href="form-magang" class="icon"><i class="bx bxl-dribbble"></i></a></div>
                        <h4><a class="btn btn-primary text-white" href="{{url('form-magang')}}">Daftar Magang</a></h4>
                        <h6 class="text-dark" style="font-family: sans-serif;">Mengisi Form Daftar Magang</h6>
                        <p></p>
                        @else
                        <div><a href="#" class="icon"><i class="bx bxl-dribbble"></i></a></div>
                        <h4><a href="#myModal" data-toggle="modal">Daftar Magang</a></h4>
                        <h6 class="text-dark" style="font-family: sans-serif;">Mengisi Form Daftar Magang</h6>
                        <p></p>
                        @endif
                    </div>
                </div>
                <div class="col-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                    <div class="icon-box col-12">
                        <div> <a type="submit" class="icon"><i class="bx bx-file" data-bs-toggle="modal" data-bs-target="#exampleModal"></i></a></div>
                        <h4><a type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">Status Pendaftaran</a></h4>
                        <h6 class="text-dark" style="font-family: sans-serif;">Balasan Magang Areakerja</h6>
                    </div>
                </div>

            </div>
            <br>

            <div class="row">

                <!-- isi card berikutnya -->
            </div>
        </div>

        <!-- modal -->
        <div id="myModal" class="modal fade">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="material-icons">&#xE876;</i>
                        </div>
                        <h4 class="modal-title w-100">!</h4>
                    </div>
                    <div class="modal-body">
                        <p class="text-center">Anda Sudah Mengisi Formulir Pendaftaran</p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-block" data-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($form as $p)

        <!--/modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="icon-box">
                            <i class="material-icons">&#xE876;</i>
                        </div>
                        <h4 class="modal-title w-100">Surat Balasan dari Areakerja</h4>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <h4 for="recipient-name" class="col-form-h4 fw-bold"></label>
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Pesan :</label>
                            <textarea class="form-control" rows="10" id="message-text"> {{$p->surat_balasan}}</textarea>
                        </div>
                        <button type="button" class="btn btn-secondary pull-right" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            <!--/modal -->
            @endforeach
    </section>
    <!-- End Services Section -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->

    <script src="{{asset('assets/user-daftar/vendor/aos/aos.js')}}"></script>
    <script src="{{asset('assets/user-daftar/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/user-daftar/vendor/glightbox/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/user-daftar/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
    <script src="{{asset('assets/user-daftar/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/user-daftar/vendor/purecounter/purecounter.js')}}"></script>
    <script src="{{asset('assets/user-daftar/vendor/swiper/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('assets/user-daftar/vendor/waypoints/noframework.waypoints.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/user-daftar/js/main.js')}}"></script>

</body>

</html>