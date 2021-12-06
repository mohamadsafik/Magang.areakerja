@extends('layouts.dashboard')

@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Presensi</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/data-magang">Data Magang</a></li>
        <li class="breadcrumb-item active">Data Presensi</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Rekap Presensi Magang</h5>
            <p></p>

            <!-- Table with stripped rows -->
            <div class="table-responsive">
              <table class="table datatable ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">masuk</th>
                    <th scope="col">istirahat</th>
                    <th scope="col">kembali</th>
                    <th scope="col">keluar</th>
                    <th scope="col">jam kerja</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Detail</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($presensi as $key => $p)
                  <tr>
                    <th scope="row">{{$p->id}}</th>
                    <td>{{$p->jammasuk}} </td>
                    <td>{{$p->jamkeluar}} </td>
                    <td>{{$p->jammasuk_kembali}} </td>
                    <td>{{$p->jampulang}} </td>
                    <td>{{$p->jamkerja}} </td>
                    <td>{{$p->tgl}} </td>
                    <td class="text-center text-primary"><a data-bs-toggle="modal" data-bs-target="#exampleModal{{$key+1}}"><i class="bi bi-info-circle"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
    <!--/modal -->
    @foreach ($presensi as $key => $p)
    <div class="modal fade" id="exampleModal{{$key+1}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <div class="modal-body">
              <div class="card">
                <div class="card-body pt-3">
                  <!-- Bordered Tabs -->
                  <ul class="nav nav-tabs nav-tabs-bordered">
                    <li class="nav-item">
                      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview{{$key+1}}">Keterangan Presensi</button>
                    </li>
                    <li class="nav-item">
                      <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit{{$key+1}}">Aktifitas Log</button>
                    </li>
                  </ul>
                  <div class="tab-content">
                    <div class="tab-pane fade show active profile-overview" id="profile-overview{{$key+1}}">
                      <div class="row">
                        <h5 class="card-title col-6">Keterangan Presensi</h5>
                        <h5 class="card-title col-6" align="right">{{$p->tgl}}</h5>
                      </div>
                      <div class="row">
                        <div class="col-3">
                          <h6 class="col-12 text-dark fw-bold">Masuk</h6>
                          <div class="col-12">{{$p->keterangan_masuk}}</div>
                        </div>
                        <div class="col-3">
                          <h6 class="col-12 text-dark fw-bold">Istirahat</h6>
                          <div class="col-12">{{$p->keterangan_istirahat}}</div>
                        </div>
                        <div class="col-3">
                          <h6 class="col-12 text-dark fw-bold">Kembali</h6>
                          <div class="col-12">{{$p->keterangan_kembali}}</div>
                        </div>
                        <div class="col-3">
                          <h6 class="col-12 text-dark fw-bold">Pulang</h6>
                          <div class="col-12">{{$p->keterangan_pulang}}</div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit{{$key+1}}">
                      <!-- Profile Edit Form -->
                      <div class="tab-pane fade show active profile-overview" id="profile-overview{{$key+1}}">
                        <h5 class="card-title">Aktifitas Log</h5>
                        <div class="center">
                          <div class="text-center">{{$p->aktivitas_log}}</div>
                        </div>
                      </div><!-- End Profile Edit Form -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <!--/modal -->
  </section>

</main><!-- End #main -->

@endsection