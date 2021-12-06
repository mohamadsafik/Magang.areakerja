@extends('layouts.dashboard')

@section('content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/data-pendaftar">Pendaftar Magang</a></li>
        <li class="breadcrumb-item active">Detail Pendaftar</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->
  @foreach ($form as $p)
  @endforeach
  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{asset('assets/dashboard/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            <h2>{{$p->nama}}</h2>
            <h3>{{$p->divisi}}</h3>
            <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Profile</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Data</button>
              </li>
            </ul>
            <div class="tab-content pt-2">

              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Alasan Magang di Areakerja</h5>
                <p class="small fst-italic">{{$p->alasan_magang}}</p>

                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Nama</div>
                  <div class="col-lg-9 col-md-8">{{$p->nama}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Gender</div>
                  <div class="col-lg-9 col-md-8">{{$p->jenis_kelamin}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">NIM</div>
                  <div class="col-lg-9 col-md-8">{{$p->nim}}</div>
                </div>


                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8">{{$p->email}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div type="file" class="col-lg-9 col-md-8">{{$p->nomor_hp}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Alamat</div>
                  <div class="col-lg-9 col-md-8">Indramayu</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Jenis Magang</div>
                  <div class="col-lg-9 col-md-8">{{$p->jenis_magang}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Sekolah/Kampus</div>
                  <div class="col-lg-9 col-md-8">{{$p->asal_kampus}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Program Studi</div>
                  <div class="col-lg-9 col-md-8">{{$p->program_studi}}</div>
                </div>


                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Divisi</div>
                  <div class="col-lg-9 col-md-8">{{$p->divisi}}</div>
                </div>

                <div class="row">
                  <label class="col-lg-3 col-md-4 label">Persyaratan Magang</label>
                  <div class="col-lg-9 col-md-8">
                    <input type="hidden" name="user_id" value="{{ $p->user_id }}">
                    <a href="{{asset('/storage/data_form_magang/' .$p->cv)}}" class="btn btn-primary col-lg-4 col-md-8" download=""><i class="bi bi-download"> Download</i></a>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                <!-- Profile Edit Form -->
                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Detail Pendaftar</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">WFO</div>
                    <div class="col-lg-9 col-md-8">{{$p->wfo}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Status Kerja</div>
                    <div class="col-lg-9 col-md-8">{{$p->status_kerja}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Nomor Dosen Pembimbing</div>
                    <div type="file" class="col-lg-9 col-md-8">{{$p->nomor_dosen}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jam Kerja</div>
                    <div class="col-lg-9 col-md-8">{{$p->jam_kerja}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jika Desain Grafis</div>
                    <div class="col-lg-9 col-md-8">{{$p->desain_grafis}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jika Videografer</div>
                    <div class="col-lg-9 col-md-8">{{$p->videografer}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jika Programmer</div>
                    <div class="col-lg-9 col-md-8">{{$p->programmer}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jika Digital Marketing</div>
                    <div class="col-lg-9 col-md-8">{{$p->digital_marketing}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Laptop Magang</div>
                    <div class="col-lg-9 col-md-8">{{$p->laptop_magang}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alat Magang</div>
                    <div class="col-lg-9 col-md-8">{{$p->alat_magang}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Mulai Magang</div>
                    <div class="col-lg-9 col-md-8">{{$p->mulai_magang}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Selesai Magang</div>
                    <div class="col-lg-9 col-md-8">{{$p->selesai_magang}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Asal Info</div>
                    <div class="col-lg-9 col-md-8">{{$p->asal_info}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jika desain/videografer Portofolio</div>
                    <div class="col-lg-9 col-md-8">{{$p->portofolio}}</div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">kegiatan diluar magang</div>
                    <div class="col-lg-9 col-md-8">{{$p->kegiatan_diluar_magang}}</div>
                  </div>



                </div><!-- End Profile Edit Form -->
              </div>
            </div>
          </div>
        </div>
      </div>


</main><!-- End #main -->
@endsection