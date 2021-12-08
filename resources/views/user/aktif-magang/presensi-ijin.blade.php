<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Presensi Ijin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/form-magang/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/form-magang/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/form-magang/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/form-magang/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('assets/form-magang/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/form-magang/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/form-magang/vendor/quill/quill.snow.css')}}" rel="stylesheet">
    <link href="{{asset('assets/form-magang/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
    <link href="{{asset('assets/form-magang/vendor/simple-datatables/style.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/form-magang/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: NiceAdmin - v2.1.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <!-- <h1 class="logo"><a href="index.html">BizLand<span>.</span></a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index.html" class="logo"><img src="{{asset('assets/user/img/logo.png')}}" alt=""></a>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="{{url('/user')}}">Halaman Utama</a></li>
                    <li><a class="nav-link scrollto" href="{{url('/user/data-presensi/'.Auth::user()->id)}}">Data Presensi</a></li>
                    <li><a class="nav-link scrollto" href="#">Laporan Progress</a></li>
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
                            <li> <a class="bg-transparent text-dark fw-bold" href="#">Profile</a></li>
                        </ul>
                    </li>
                    @endif

                    @endguest
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Presensi Ijin / Sakit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/user">user</a></li>
                    <li class="breadcrumb-item">Presensi Ijin dan Sakit</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        <section class="section">
            <div class="row gallery justify-content-center">
                <div class="col-lg-8">

                    <div class="card ">
                        <div class="card-body">
                            <h5 class="card-title">AKTIFITAS LOG</h5>

                            <!-- General Form Elements -->
                            @foreach ($presensi as $p)
                            @endforeach
                            <form action="/simpan-aktivitas" method="POST" enctype="multipart/form-data">
                                @csrf
                                <fieldset class="row mb-3">
                                    <legend class="col-form-label col-sm-12 pt-0" required>Tidak Masuk Karena?</legend>
                                    <div class="col-sm-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="gridRadios1">
                                            <label class="form-check-label" for="gridRadios1">
                                                Sakit
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="status" id="gridRadios2">
                                            <label class="form-check-label" for="gridRadios2">
                                                Ijin
                                            </label>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">Sakit apa / Ijin kareana apa?</label>
                                    <div class="col-sm-12">
                                        <textarea class="form-control" style="height: 100px" name="keterangan_ijin"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="inputText" class="col-sm-12 col-form-label">Surat Ijin / Sakit *optional</label>
                                    <div class="col-sm-12">
                                        <input type="file" class="form-control"name="surat_ijin"></input>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-4 col-form-label"></label>
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form><!-- End General Form Elements -->
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    {{-- <footer id="footer" class="footer">
        <div class="copyright">
          
        </div>
        <div class="credits">

        </div>
    </footer> --}}<!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{asset('assets/form-magang/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <script src="{{asset('assets/form-magang/vendor/php-email-form/validate.js')}}"></script>
    <script src="{{asset('assets/form-magang/vendor/quill/quill.min.js')}}"></script>
    <script src="{{asset('assets/form-magang/vendor/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('assets/form-magang/vendor/simple-datatables/simple-datatables.j')}}s"></script>
    <script src="{{asset('assets/form-magang/vendor/chart.js/chart.min.js')}}"></script>
    <script src="{{asset('assets/form-magang/vendor/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/form-magang/vendor/echarts/echarts.min.js')}}"></script>

    <!-- Template Main JS File -->
    <script src="{{asset('assets/form-magang/js/main.js')}}"></script>

</body>

</html>