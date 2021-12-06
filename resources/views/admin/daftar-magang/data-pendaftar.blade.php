@extends('layouts.dashboard')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Pendaftar Magang</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Pendaftar Magang</li>
                <li class="breadcrumb-item">Detail Pendaftar</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pendaftar Magang Areakerja</h5>
                        <p></p>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
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
                <!-- End Table with stripped rows -->

            </div>
        </div>

        </div>
        </div>
    </section>

</main><!-- End #main -->

@endsection