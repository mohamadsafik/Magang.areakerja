<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Berkas Magang</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/form-magang/img/favicon.png" rel="icon">
    <link href="assets/form-magang/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/form-magang/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/form-magang/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/form-magang/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/form-magang/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/form-magang/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/form-magang/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/form-magang/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/form-magang/css/style.css" rel="stylesheet">

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
            <a href="index.html" class="logo"><img src="assets/user/img/logo.png" alt=""></a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    <li><a class="nav-link scrollto" href="#services">Services</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">Portfolio</a></li>
                    <li><a class="nav-link scrollto" href="#team">Team</a></li>
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
                            <li> <a class="list-group-item list-group-item-action bg-transparent text-danger fw-bold" href="{{ route('logout') }}" onclick="event.preventDefault();
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
                    <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
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
      <h1>Form Editors</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="user-daftar">Daftar Magang</a></li>
          <li class="breadcrumb-item">Berkas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row gallery justify-content-center">
        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Quill Editor Default</h5>

              <!-- Quill Editor Default -->
              <div class="quill-editor-default">
                <p>Hello World!</p>
                <p>This is Quill <strong>default</strong> editor</p>
              </div>
              <!-- End Quill Editor Default -->

            </div>
          </div>
          

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Quill Editor Bubble</h5>

              <!-- Quill Editor Bubble -->
              <p>Select some text to display options in poppovers</p>
              <div class="quill-editor-bubble">
                <p>Hello World!</p>
                <p>This is Quill <strong>bubble</strong> editor</p>
              </div>
              <!-- End Quill Editor Bubble -->

            </div>
          </div>

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

        </div>

        <div class="col-lg-6">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">TinyMCE Editor</h5>

              <!-- TinyMCE Editor -->
              <textarea class="tinymce-editor">
                <p>Hello World!</p>
                <p>This is TinyMCE <strong>full</strong> editor</p>
              </textarea><!-- End TinyMCE Editor -->

            </div>
          </div>

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
    <script src="assets/form-magang/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/form-magang/vendor/php-email-form/validate.js"></script>
    <script src="assets/form-magang/vendor/quill/quill.min.js"></script>
    <script src="assets/form-magang/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/form-magang/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/form-magang/vendor/chart.js/chart.min.js"></script>
    <script src="assets/form-magang/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/form-magang/vendor/echarts/echarts.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/form-magang/js/main.js"></script>

</body>

</html>