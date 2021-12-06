@extends('layouts.dashboard')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Data Karyawan / Magang</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Data Magang</li>
                    <li class="breadcrumb-item">Data Presensi</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Datatables</h5>
                            <p></p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nim</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Divisi</th> 
                                        <th scope="col">Mulai Magang</th>
                                        <th scope="col">Selesai Magang</th>
                                        <th scope="col">Asal Sekolah/Kampus</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($form as $p)
                                  
                                 
                                    <tr>
                                        <th scope="row">{{$p->id}}</th>
                                        <td>{{$p->nim}}</td>
                                        <td>{{$p->nama}}</td>
                                        <td>{{$p->divisi}}</td>
                                        <td>{{$p->mulai_magang}}</td>
                                        <td>{{$p->selesai_magang}}</td>
                                        <td>{{$p->asal_kampus}}</td>
                                        <td><a href="{{url('/#/'.$p->user_id)}}" class="btn btn-primary">Sertifikat</a></td>
                                    </tr>
                                  
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->

@endsection