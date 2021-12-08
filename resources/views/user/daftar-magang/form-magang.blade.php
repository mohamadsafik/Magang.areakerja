<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Formulir Magang</title>
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
            <h1>Formulir Magang</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="user-daftar">Daftar</a></li>
                    <li class="breadcrumb-item">Form</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row gallery justify-content-center">
                <div class="col-lg-8">
                    <div class="">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">General Form Elements</h5>

                                <!-- General Form Elements -->
                                @foreach ($form as $p)
                                @endforeach
                                <form action="/form" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-12 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="nama" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-12 col-form-label">Nomor Induk Mahasiswa</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="nim"required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-12 col-form-label">Email</label>
                                        <div class="col-sm-12">
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-12 col-form-label">Divisi Magang</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" name="jenis_kelamin" required>
                                                <option selected>pilih divisi</option>
                                                <option value="Laki-Laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                                <option value="Human Resources">Human Resources</option>
                                                <option value="Social Media Specialist">Social Media Specialist</option>
                                                <option value="Editor Foto & Video">Editor Foto & Video</option>
                                                <option value="Content Writer">Content Writer</option>
                                                <option value="Marketing & Sales">Marketing & Sales</option>
                                                <option value="Content Creative /Desainer Grafis">Content Creative /Desainer Grafis</option>
                                                <option value="Digital Research">Digital Research</option>
                                                <option value="Marcomm / Public Relation">Marcomm / Public Relation</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputTexe" class="col-sm-12 col-form-label">Nomor Wa</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="nomor_hp" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputTexe" class="col-sm-12 col-form-label">Asal Sekolah/Kampus</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="asal_kampus" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputTexe" class="col-sm-12 col-form-label">Program Studi</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="program_studi" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputTexe" class="col-sm-12 col-form-label">Nama Kota/Daerah Asal Anda</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="alamat" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputPassword" class="col-sm-12 col-form-label">Mengapa Anda ingin Magang/PKL di AREAKERJA</label>
                                        <div class="col-sm-12">
                                            <textarea class="form-control" style="height: 100px" name="alasan_magang" required></textarea>
                                        </div>
                                    </div>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-12 pt-0" required>Jenis Magang</legend>
                                        <div class="col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_magang" id="gridRadios1" value="smk/kampus">
                                                <label class="form-check-label" for="gridRadios1">
                                                    Magang SMK/KAMPUS
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jenis_magang" id="gridRadios2" value="mandiri">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Magang Mandiri
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-12 pt-0">saya siap dengan sistem magang ini</legend>
                                        <div class="col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="wfo" id="gridRadios1" value="WFO (Work From Office)">
                                                <label class="form-check-label" for="gridRadios1">
                                                    WFO (Work From Office)
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-12 pt-0" required>Status Anda Saat ini</legend>
                                        <div class="col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status_kerja" id="gridRadios1" value="Masih Sekolah/Kuliah">
                                                <label class="form-check-label" for="gridRadios1">
                                                    Masih Sekolah/Kuliah
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status_kerja" id="gridRadios2" value="Sudah lulus sekolah/kuliah dan belum bekerja">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Sudah lulus sekolah/kuliah dan belum bekerja
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status_kerja" id="gridRadios2" value=" sudah lulus dan sedang bekerja">
                                                <label class="form-check-label" for="gridRadios2">
                                                    sudah lulus dan sedang bekerja
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-12 pt-0">Anda Bisa Baca Buku Bahasa Inggris kah?</legend>
                                        <div class="col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="bahasa_inggris" id="gridRadios1" value="Saya Bisa">
                                                <label class="form-check-label" for="gridRadios1">
                                                    Saya Bisa
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="bahasa_inggris" id="gridRadios2" value="Saya Kurang Bisa (bisa sedikit-sedikit)">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Saya Kurang Bisa (bisa sedikit-sedikit)
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="bahasa_inggris" id="gridRadios2" value=" Saya Tidak Bisa">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Saya Tidak Bisa
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="row mb-3">
                                        <label for="inputTexe" class="col-sm-12 col-form-label">Nomor Wa Dosen</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="nomor_dosen" required>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="col-sm-12 col-form-label">Divisi Magang</label>
                                        <div class="col-sm-12">
                                            <select class="form-select" aria-label="Default select example" name="divisi" required>
                                                <option selected>pilih divisi</option>
                                                <option value="UI/UX Designer">UI/UX Designer</option>
                                                <option value="Programmer (Frontend/ Backend)">Programmer (Frontend/ Backend)</option>
                                                <option value="Human Resources">Human Resources</option>
                                                <option value="Social Media Specialist">Social Media Specialist</option>
                                                <option value="Editor Foto & Video">Editor Foto & Video</option>
                                                <option value="Content Writer">Content Writer</option>
                                                <option value="Marketing & Sales">Marketing & Sales</option>
                                                <option value="Content Creative /Desainer Grafis">Content Creative /Desainer Grafis</option>
                                                <option value="Digital Research">Digital Research</option>
                                                <option value="Marcomm / Public Relation">Marcomm / Public Relation</option>
                                            </select>
                                        </div>
                                    </div>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-12 pt-0">Hari magang adalah Senin-Sabtu. Silakan pilih jam kerja magang yang Anda sanggupi :</legend>
                                        <div class="col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jam_kerja" id="gridRadios1" value=" 09:00-17:00 (sudah termasuk 1 jam istirahat didalamnya)">
                                                <label class="form-check-label" for="gridRadios1">
                                                    09:00-17:00 (sudah termasuk 1 jam istirahat didalamnya)
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="jam_kerja" id="gridRadios2" value=" 13:00-21:00 (sudah termasuk 1 jam istirahat didalamnya)">
                                                <label class="form-check-label" for="gridRadios2">
                                                    13:00-21:00 (sudah termasuk 1 jam istirahat didalamnya)
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-12 col-form-label">Jika Anda memilih minat program magang di Disain Grafis atau UI/UX Designer, software design apa saja yang Anda kuasai ? (jika minat Anda bukan ini, cukup diisi dg strip "-") *</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="desain_grafis" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-12 col-form-label">Jika Anda memilih minat program magang Videografer, software editing video yang Anda kuasai apa saja? (jika minat Anda bukan ini, cukup diisi dg strip "-") *</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="videografer" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-12 col-form-label">Jika Anda memilih minat program magang Programmer, Bahasa Pemrograman apa saja yang sudah Anda kuasai? (jika minat Anda bukan ini, cukup diisi dg strip "-") *</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="programmer" required>
                                        </div>
                                    </div>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-12 pt-0">Jika Anda memilih minat program magang Digital Marketing, materi mana yang anda ingin praktikan? (jika minat Anda bukan ini, cukup pilih opsi "yang lain") *</legend>
                                        <div class="col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="digital_marketing" id="gridRadios1" value="Digital Marketing Organic. Nb : Free tanpa dana untuk beriklan.">
                                                <label class="form-check-label" for="gridRadios1">
                                                    Digital Marketing Organic. Nb : Free tanpa dana untuk beriklan.
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="digital_marketing" id="gridRadios2" value=" Digital Marketing Ads (Fb Ads / Ig Ads). Nb : Harus menyiapkan dana utk belajar beriklan dengan Ads min. 30 K/day selama iklan berjalan.">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Digital Marketing Ads (Fb Ads / Ig Ads). Nb : Harus menyiapkan dana utk belajar beriklan dengan Ads min. 30 K/day selama iklan berjalan.
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="digital_marketing" id="gridRadios2" value=" Yang lain">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Yang lain:
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-12 pt-0" required>Apakah Anda ada alat kerja sendiri (LAPTOP) yang bisa dipakai selama Magang/PKL? *</legend>
                                        <div class="col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="laptop_magang" id="gridRadios1" value="YA ADA">
                                                <label class="form-check-label" for="gridRadios1">
                                                    YA ADA
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="laptop_magang" id="gridRadios2" value="TIDAK ADA">
                                                <label class="form-check-label" for="gridRadios2">
                                                    TIDAK ADA
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-12 pt-0" required>Jika YA, alat apa yang Anda miliki, yang bisa Anda bawa selama Magang/PKL? *</legend>
                                        <div class="col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="alat_magang" id="gridRadios1" value="Laptop yang sudah terinstal Corel dan Photoshop">
                                                <label class="form-check-label" for="gridRadios1">
                                                    Laptop yang sudah terinstal Corel dan Photoshop
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="alat_magang" id="gridRadios2" value="Laptop yang sudah terinstal Adobe Premiere Pro/Final Cut Pro/Adobe After Effect">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Laptop yang sudah terinstal Adobe Premiere Pro/Final Cut Pro/Adobe After Effect
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="alat_magang" id="gridRadios3" value="Kamera DSLR">
                                                <label class="form-check-label" for="gridRadios3">
                                                    Kamera DSLR

                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="alat_magang" id="gridRadios4" value="Laptop/ Netbook">
                                                <label class="form-check-label" for="gridRadios4">
                                                    Laptop/ Netbook
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="alat_magang" id="gridRadios5" value="yang lain">
                                                <label class="form-check-label" for="gridRadios5">
                                                 yang lain
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>


                                    <div class="row mb-3">

                                        <label for="inputDate" class="col-sm-2 col-form-label">Mulai Magang</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="mulai_magang" required>
                                        </div>
                                        <label for="inputDate" class="col-sm-2 col-form-label">Selesai Magang</label>
                                        <div class="col-sm-4">
                                            <input type="date" class="form-control" name="selesai_magang" required>
                                        </div>
                                    </div>

                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-12 pt-0" required>Anda tahu info magang ini darimana? *</legend>
                                        <div class="col-sm-12">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="asal_info" id="gridRadios1" value="Website">
                                                <label class="form-check-label" for="gridRadios1">
                                                    Website
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="asal_info" id="gridRadios2" value="Instagram">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Instagram
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="asal_info" id="gridRadios2" value="Twitter">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Twitter

                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="asal_info" id="gridRadios2" value="Glints">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Glints
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="asal_info" id="gridRadios2" value="Youtube">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Youtube
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="asal_info" id="gridRadios2" value="Yang lain">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Yang lain
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <br>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-12 col-form-label">Silakan upload : CV, Scan KTP/KTM, dan Surat Pengantar dr kampus disini. Format pdf.</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" type="file" id="formFile" name="cv" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row mb-3">
                                        <label for="inputNumber" class="col-sm-12 col-form-label">Silakan upload : Portofolio (berupa gambar jpg bagi disainer grafis atau link youtube bagi videografer)</label>
                                        <div class="col-sm-12">
                                            <input class="form-control" type="file" id="formFile" name="portofolio" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-12 col-form-label">Kegiatan Anda saat ini selain magang/pkl ada kah? Jika ada, mohon sebutkan apa saja : *</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="kegiatan_diluar_magang" required>
                                        </div>
                                    </div>


                                    <div class="row mb-3">
                                        <label class="col-sm-12 col-form-label"></label>
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-primary">Submit Form</button>
                                        </div>
                                    </div>

                                </form><!-- End General Form Elements -->

                            </div>
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