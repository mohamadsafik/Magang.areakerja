@extends('layouts.dashboard')

@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

          <!-- Sales Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="filter">
                <a class="icon" href="{{url('/dashboard/data-karyawan-magang')}}" ><i class="bi bi-three-dots">Lihat</i></a>
                <!-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul> -->
              </div>

              <div class="card-body">
                <h5 class="card-title">Karyawan/Magang</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$aktif_magang}}</h6>
                    <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Sales Card -->

          <!-- Revenue Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="filter">
                <a class="icon" href="{{url('/dashboard/data-pendaftar')}}"><i class="bi bi-three-dots">Lihat</i></a>
              </div>

              <div class="card-body">
                <h5 class="card-title">Pendaftar Magang</h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{$daftar_magang}}</h6>
                    <!-- <span class="text-success small pt-1 fw-bold">5</span> <span class="text-muted small pt-2 ps-1">asdasd</span> -->
                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Revenue Card -->

          <!-- Customers Card -->
          <div class="col-xxl-4 col-xl-12">

            <div class="card info-card customers-card">

              <div class="filter">
                <a class="icon" href="{{url('/dashboard/data-presensi-sekarang')}}"><i class="bi bi-three-dots">Lihat</i></a>
              </div>

              <div class="card-body">
                <h5 class="card-title">Presensi <span>| Hari ini</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h5 class="fw-bold">Masuk</h5>
                    <span class="text-danger small pt-1 fw-bold">{{$masuk}}</span> <span class="text-muted small pt-2 ps-1"></span>
                  </div>
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h5 class="fw-bold">Ijin</h5>
                    <span class="text-danger small pt-1 fw-bold">{{$ijin}}</span> <span class="text-muted small pt-2 ps-1"></span>
                  </div>
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h5 class="fw-bold">Sakit</h5>
                    <span class="text-danger small pt-1 fw-bold">{{$sakit}}</span> <span class="text-muted small pt-2 ps-1"></span>
                  </div>
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h5 class="fw-bold">Tanpa Keterangan</h5>
                    <span class="text-danger small pt-1 fw-bold">{{$tanpa_keterangan}}</span> <span class="text-muted small pt-2 ps-1"></span>
                  </div>
                </div>

              </div>
            </div>

          </div><!-- End Customers Card -->
          <!-- Recent Sales -->
          <div class="col-12">
            <div class="card recent-sales">

              <div class="filter">
                <a class="icon" href="{{url('/dashboard/data-pendaftar')}}"><i class="bi bi-three-dots"></i>Selengkapnya</a>
                <!-- <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul> -->
              </div>

              <div class="card-body">
                <h5 class="card-title">Pendaftar Magang <span>| Terbaru</span></h5>

                <table class="table table-borderless datatable">
                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Divisi</th>
                                    <th scope="col">Asal Sekolah/Kampus</th>
                                    <th scope="col">Data</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($form as $key => $p)


                                <tr>
                                    @if ($p->status == "daftar-magang")
                                    <th scope="row">{{$p->id}}</th>
                                    <td>{{$p->nama}}</td>
                                    <td>{{$p->divisi}}</td>
                                    <td>{{$p->asal_kampus}}</td>
                                    <td><a href="{{url('/dashboard/data-pendaftar/detail-pendaftar/'.$p->user_id)}}" class="btn btn-primary">Detail</a></td>
                                    <td class="col">
                                        <form action="/terima-pendaftar" method="post">
                                            @csrf
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" value="{{ $p->id }}" name="id">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" value="{{ $p->user_id }}" name="user_id">
                                            </div>
                                            <button type="button" class="btn btn-primary col-12 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal{{$key+1}}">
                                                Terima
                                            </button>
                                        </form>
                                        <form action="/tolak-pendaftar" method="post">
                                            @csrf
                                            <div class="form-group row mb-1">
                                                <input type="hidden" class="form-control" value="{{ $p->id }}" name="id">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" value="{{ $p->user_id }}" name="user_id">
                                            </div>
                                            <button type="button" class="btn btn-danger col-12 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal2{{$key+1}}">
                                                Tolak
                                            </button>
                                        </form>
                                    </td>
                                    @endif
                                    <!-- modal -->
                                    <div class="modal fade" id="exampleModal{{$key+1}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <form action="/terima-pendaftar" method="post">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fw-bold" id="exampleModalLabel">Send message</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="mb-1">
                                                            <label for="recipient-name" class="col-form-label">Tujuan :</label>
                                                            <input type="text" class="form-control" id="recipient-name" value="{{ $p->nama }}">
                                                        </div>
                                                        <div class="mb-1">
                                                            <label for="message-text" class="col-form-label">Pesan :</label>
                                                            <textarea class="form-control" rows="8" aria-label="With textarea" name="surat_balasan">Selamat sore.. {{$p->nama}}, Anda resmi diterima Magang bag. {{$p->divisi}} di AreaKerja. 

Pelaksanaan magang dimulai tgl {{$p->mulai_magang}} s.d. {{$p->selesai_magang}}. Jam masuk kerja magang 09.00-17.00 WIB. Istirahat 1 : jam 12.15-13.00 (mkn siang + dhuhur) dan istirahat 2 : jam 15.30-15.45 (ashar). Hari kerja Senin-Sabtu. Tgl Merah Libur (tgl2nya akan diinfokan kemudian). Tempat di Kantor SEVEN INC.

Mohon dipastikan kembali, segala kebutuhan magang sudah dipersiapkan dan dibawa saat magang WFO :
- masker (dipakai)
- handsanitizer pribadi
- 1 lembar materai 10000
- laptop, mouse, headset
- alat tulis
- uang 40K utk ambil seragam magang + nametag
- pakaian batik utk dipakai hari jumat


Jika ada perubahan nanti akan diinfokan segera.

Utk sarana komunikasi & koordinasi, tim magang akan diinvite Grup Khusus Magang nanti.

Salam,
AreaKerja.com</textarea>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" value="{{ $p->id }}" name="id">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" class="form-control" value="{{ $p->user_id }}" name="user_id">
                                                        </div>
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Terima & Kirim Pesan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    <!--/modal -->
                    <div class="modal fade" id="exampleModal2{{$key+1}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <form action="/tolak-pendaftar" method="post">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Send message</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Tujuan :</label>
                                            <input type="text" class="form-control" id="recipient-name" value="{{ $p->nama }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Pesan :</label>
                                            <textarea class="form-control" id="message-text" name="surat_balasan">{{$p->nama}}, Mohon Maaf Kami belum Bisa Menerima Anda
                                            </textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <div class="form-group row mb-1">
                                            <input type="hidden" class="form-control" value="{{ $p->id }}" name="id">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" value="{{ $p->user_id }}" name="user_id">
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Tolak Pendaftar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/modal -->
                </tr>

                 @endforeach
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Recent Sales -->

          <!-- Top Selling -->
          <div class="col-12">
            <div class="card top-selling">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
              </div>

              <div class="card-body pb-0">
                <h5 class="card-title">Presensi Hari Ini<span>| Terbaru</span></h5>

                <table class="table table-borderless">
                  <thead>
                    <tr>
                    <th scope="col">#</th>
                      <th scope="col">nama</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($users as $q)
                    <tr>
                      <th scope="row">{{$q->id}}</th>
                      <td>{{$q->name}}</td>
                      <td>{{$q->tgl}}</td>
                      <td>{{$q->status}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>

            </div>
          </div><!-- End Top Selling -->

        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">

        <!-- Recent Activity -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>
        <!-- Website Traffic -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body pb-0">
            <h5 class="card-title">Informasi Magang <span>| Today</span></h5>

            <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

            <script>
              document.addEventListener("DOMContentLoaded", () => {
                echarts.init(document.querySelector("#trafficChart")).setOption({
                  tooltip: {
                    trigger: 'item'
                  },
                  legend: {
                    top: '5%',
                    left: 'center'
                  },
                  series: [{
                    name: 'Dari :',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                      show: false,
                      position: 'center'
                    },
                    emphasis: {
                      label: {
                        show: true,
                        fontSize: '18',
                        fontWeight: 'bold'
                      }
                    },
                    labelLine: {
                      show: false
                    },
                    data: [{
                        value: <?= $website ?>,
                        name: 'website'
                      },
                      {
                        value: <?= $instagram ?>,
                        name: 'instagram'
                      },
                      {
                        value:  <?= $twitter ?>,
                        name: 'twitter'
                      },
                      {
                        value: <?= $glints ?>,
                        name: 'glints'
                      },
                      {
                        value: <?= $youtube ?>,
                        name: 'youtube'
                      },
                      {
                        value: <?= $lain ?>,
                        name: 'yang lain'
                      }
                    ]
                  }]
                });
              });
            </script>

          </div>
        </div><!-- End Website Traffic -->

        <!-- News & Updates Traffic -->
        <div class="card">
          <div class="filter">
            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
              <li class="dropdown-header text-start">
                <h6>Filter</h6>
              </li>

              <li><a class="dropdown-item" href="#">Today</a></li>
              <li><a class="dropdown-item" href="#">This Month</a></li>
              <li><a class="dropdown-item" href="#">This Year</a></li>
            </ul>
          </div>

          <div class="card-body pb-0">
            <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>

            <div class="news">
              <div class="post-item clearfix">
                <img src="{{asset('assets/dashboard/img/news-1.jpg')}}" alt="">
                <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
                <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
              </div>

              <div class="post-item clearfix">
                <img src="{{asset('assets/dashboard/img/news-2.jpg')}}" alt="">
                <h4><a href="#">Quidem autem et impedit</a></h4>
                <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
              </div>

              <div class="post-item clearfix">
                <img src="{{asset('assets/dashboard/img/news-3.jpg')}}" alt="">
                <h4><a href="#">Id quia et et ut maxime similique occaecati ut</a></h4>
                <p>Fugiat voluptas vero eaque accusantium eos. Consequuntur sed ipsam et totam...</p>
              </div>

              <div class="post-item clearfix">
                <img src="{{asset('assets/dashboard/img/news-4.jpg')}}" alt="">
                <h4><a href="#">Laborum corporis quo dara net para</a></h4>
                <p>Qui enim quia optio. Eligendi aut asperiores enim repellendusvel rerum cuder...</p>
              </div>

              <div class="post-item clearfix">
                <img src="{{asset('assets/dashboard/img/news-5.jpg')}}" alt="">
                <h4><a href="#">Et dolores corrupti quae illo quod dolor</a></h4>
                <p>Odit ut eveniet modi reiciendis. Atque cupiditate libero beatae dignissimos eius...</p>
              </div>

            </div><!-- End sidebar recent posts-->

          </div>
        </div><!-- End News & Updates -->

      </div><!-- End Right side columns -->

    </div>
  </section>

</main><!-- End #main -->

@endsection