@extends('layouts.user')

@section('content')


<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Profile User</h2>
            <h3><span>{{auth()->user()->name}}</span></h3>
            <hr>
            <p>QR CODE ABSENSI</p>
        </div>
        <div class="col-12 col-md-12 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box col-12">
                <br></br>
                <div class="icon"><i class="">{{ $qrcode}}</i></div> 
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box col-12">
                    {{-- <!-- <form action="{{ route('simpan-presensi') }}" method="post">
                    @csrf -->--}}
                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                    <h4> <button type="submit" class="btn btn-primary">Presensi</button></h4>
                    <p></p>
                    {{--<!-- </form> -->--}}
                </div>
            </div>
            <div class="col-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box col-12">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4><a href="/aktivitas-log">Log Aktifitas</a></h4>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box col-12">
                    <form action="" method="post">
                        @csrf
                        <div class="icon"><i class="bx bxl-dribbble"></i></div>
                        <h4> <button type="submit" class="btn btn-primary">ambil barcode</button></h4>
                        <p></p>
                    </form>
                </div>
            </div>
            <div class="col-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box col-12">
                    <div class="icon"><i class="">aa</i></div>
                    <h4><a href="#"></a></h4>
                    <p></p>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box col-12">
                    <div class="icon"><i class="bx bx-tachometer"></i></div>
                    <h4>06:40:00</h4>
                    <h4><a href="">Timer Kerja</a></h4>
                    <p></p>
                </div>
            </div>
            <div class="col-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box col-12">
                    <div class="icon"><i class="bx bx-world"></i></div>
                    <h4><a href="">Sewa Kost</a></h4>
                    <p></p>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box col-12">
                    <div class="icon"><i class="bx bx-slideshow"></i></div>
                    <h4><a href="">Sewa Motor</a></h4>
                    <p></p>
                </div>
            </div>
            <div class="col-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box col-12">
                    <div class="icon"><i class="bx bx-arch"></i></div>
                    <h4><a href="">Katering</a></h4>
                    <p></p>
                </div>
            </div>
        </div>s



    </div>
    </div>
</section>
@endsection
<!-- End Services Section -->