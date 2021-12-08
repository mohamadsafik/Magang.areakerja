@extends('layouts.user')

@section('content')


<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Profile User</h2>
            <h3><span>{{auth()->user()->name}}</span></h3>
            <hr>
            @if (session('status'))
            <div id="alert" class="alert alert-success">
                {{ session('status') }}
            </div>
            <script type="text/javascript">
                setTimeout(function() {

                    // Closing the alert
                    $('#alert').alert('close');
                }, 3000);
            </script>
            @endif
            <p>QR CODE PRESENSI</p>
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
                    <div class="icon"><i class="bx bxl-dribbble"></i></div>
                    <h4><a href="/user/presensi-ijin">Presensi Ijin / Sakit</a></h4>
                    <p></p>
                </div>
            </div>
            <div class="col-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box col-12">
                    <div class="icon"><i class="bx bx-file"></i></div>
                    <h4><a href="/user/aktivitas-log">Log Aktifitas</a></h4>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
<!-- End Services Section -->