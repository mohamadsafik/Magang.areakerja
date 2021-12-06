<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Areakerja</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/dashboard/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/dashboard/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/dashboard/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/dashboard/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/dashboard/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/dashboard/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/dashboard/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/dashboard/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/dashboard/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/user/data-presensi/css/style.css')}}" rel="stylesheet">

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
          <li><a class="nav-link scrollto" href="#">Tugas</a></li>
          <li><a class="nav-link scrollto" href="{{url('/user/data-presensi/'.Auth::user()->id)}}">Data Presensi</a></li>
          <li><a class="nav-link scrollto" href="#">Laporan Progress</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Sertifikat</a></li>
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
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <!-- End Header -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>General Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
    <div class="card">
            <div class="card-body">
              <h5 class="card-title">Quill Editor Full</h5>

              <!-- Quill Editor Full -->
              <p>Quill editor with full toolset</p>
              <div class="quill-editor-full">
                <p>Hello World!</p>
                <p>This is Quill <strong>full</strong> editor</p>
              </div>
              <!-- End Quill Editor Full -->

            </div>
          </div>
    </section>

  </main><!-- End #main -->


  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/dashboard/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/dashboard/vendor/echarts/echarts.min.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/user/data-presensi/js/main.js')}}"></script>

</body>

</html>