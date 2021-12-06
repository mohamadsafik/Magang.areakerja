@extends('layouts.dashboard')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Presensi</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active">Presensi</li>
                    <li class="breadcrumb-item">Presensi Perorang</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Data Presensi hari ini</h5>
                            <p></p>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $p)
                                  
                                 
                                    <tr>
                                        <th scope="row">{{$p->id}}</th>
                                        @foreach ($form as $q)
                                        @endforeach
                                        <td>{{$p->name}}</td>
                                        <td>{{$p->tgl}}</td>
                                       @if ($p->status == "sakit")
                                        <td class="badge bg-danger col-12">Sakit</td>
                                        @elseif ($p->status == "ijin")
                                        <td class="badge bg-warning col-12">Ijin</td>
                                        @elseif ($p->status == "")
                                        <td>tanpa keterangan</td>         
                                        @else
                                        <td class="badge bg-primary col-12">masuk</td>
                                        @endif
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