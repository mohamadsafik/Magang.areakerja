@extends('layouts.presensi')

@section('content')

<section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/user">User</a></li>
                <li class="breadcrumb-item">Absensi</li>
            </ol>
        </nav>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @foreach ($presensi as $p)
                        @endforeach

                        @if ($p->status == "presensi")
                        <form action="{{ route('simpan-masuk') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <center>
                                    <label id="clock" style="font-size: 100px; color: #000000; -webkit-text-stroke: 3px #F0F8FF;
                                                    text-shadow: 4px 4px 10px #F0F8FF,
                                                    4px 4px 20px #F0F8FF,
                                                    4px 4px 30px #F0F8FF,
                                                    4px 4px 40px #F0F8FF;">
                                    </label>
                                 <a href="https://www.youtube.com/watch?v=X-YRVj_FiT8">{{$qrcode}}</a>   
                                </center>
                            </div>
                            <div class="row mb-3">
                                <center>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" style="height: 100px" placeholder="Keterangan Masuk..." name="keterangan_masuk"></textarea>

                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" value="masuk" name="status">
                                    </div>
                                </center>
                            </div>

                            <center>
                                <div class="form-group">

                                    <button type="submit" class="btn btn-primary col-2">Presensi Masuk</button>

                                    @if (session('status'))
                                    <hr>
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                </div>
                            </center>
                        </form>
                        <form action="{{ route('simpan-masuk') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <center>
                                    <label id="clock" style="font-size: 100px; color: #000000; -webkit-text-stroke: 3px #F0F8FF;
                                                    text-shadow: 4px 4px 10px #F0F8FF,
                                                    4px 4px 20px #F0F8FF,
                                                    4px 4px 30px #F0F8FF,
                                                    4px 4px 40px #F0F8FF;">
                                    </label>
                                </center>
                            </div>
                            <div class="row mb-3">
                                {{-- <center>
                                    <div class="col-sm-8">
                                        <input type="hidden" class="form-control" value="sakit" name="status">
                                    </div>
                                </center>--}}
                            </div>

                            <center>
                                    <div class="form-group">
                                        <form action="{{ route('simpan-masuk') }}" method="post">
                                            @csrf
                                            <input type="hidden" class="form-control" value="sakit" name="status">
                                            <button type="submit" class="btn btn-danger col-2">Presensi Sakit</button>
                                        </form>
                                        @if (session('status'))
                                        <hr>
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                        @endif
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <form action="{{ route('simpan-masuk') }}" method="post">
                                            @csrf
                                            <input type="hidden" class="form-control" value="ijin" name="status">
                                            <button type="submit" class="btn btn-warning col-2">Presensi Ijin</button>
                                        </form>

                                        @if (session('status'))
                                        <hr>
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                        @endif
                                    </div>
                            </center>
                        </form>

                        @elseif ($p->status == "masuk")
                        <form action="{{ route('simpan-istirahat') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <center>
                                    <label id="clock" style="font-size: 100px; color: #000000; -webkit-text-stroke: 3px #F0F8FF;
                                                    text-shadow: 4px 4px 10px #F0F8FF,
                                                    4px 4px 20px #F0F8FF,
                                                    4px 4px 30px #F0F8FF,
                                                    4px 4px 40px #F0F8FF;">
                                    </label>
                                </center>
                            </div>
                            <div class="row mb-3">
                                <center>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" style="height: 100px" name="keterangan_istirahat" placeholder="Keterangan istirahat..."></textarea>
                                    </div>
                                </center>
                            </div>
                            <center>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Presensi Istirahat</button>

                                    @if (session('status'))
                                    <hr>
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                </div>
                            </center>
                        </form>
                        @elseif ($p->status == "istirahat")
                        <form action="{{ route('simpan-kembali') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <center>
                                    <label id="clock" style="font-size: 100px; color: #000000; -webkit-text-stroke: 3px #F0F8FF;
                                                    text-shadow: 4px 4px 10px #F0F8FF,
                                                    4px 4px 20px #F0F8FF,
                                                    4px 4px 30px #F0F8FF,
                                                    4px 4px 40px #F0F8FF;">
                                    </label>
                                </center>
                            </div>
                            <div class="row mb-3">
                                <center>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" style="height: 100px" name="keterangan_kembali" placeholder="Keterangan Kembali..."></textarea>
                                    </div>
                                </center>
                            </div>
                            <center>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Presensi Kembali</button>

                                    @if (session('status'))
                                    <hr>
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                </div>
                            </center>
                        </form>
                        @elseif ($p->status == "kembali")
                        <form action="{{ route('simpan-pulang') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <center>
                                    <label id="clock" style="font-size: 100px; color: #000000; -webkit-text-stroke: 3px #F0F8FF;
                                                    text-shadow: 4px 4px 10px #F0F8FF,
                                                    4px 4px 20px #F0F8FF,
                                                    4px 4px 30px #F0F8FF,
                                                    4px 4px 40px #F0F8FF;">
                                    </label>
                                </center>
                            </div>
                            <div class="row mb-3">
                                <center>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" style="height: 100px" name="keterangan_pulang" placeholder="Keterangan pulang..."></textarea>
                                    </div>
                                </center>
                            </div>
                            <center>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Presensi Pulang</button>

                                    @if (session('status'))
                                    <hr>
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                </div>
                            </center>
                        </form>
                        @elseif ($p->status == "pulang")
                        <form action="{{ route('simpan-presensi') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <center>
                                    <label id="clock" style="font-size: 100px; color: #000000; -webkit-text-stroke: 3px #F0F8FF;
                                                    text-shadow: 4px 4px 10px #F0F8FF,
                                                    4px 4px 20px #F0F8FF,
                                                    4px 4px 30px #F0F8FF,
                                                    4px 4px 40px #F0F8FF;">
                                    </label>
                                </center>
                            </div>
                            <center>
                                <div class="form-group">
                                    @if ($presensi)
                                    <h4> <button type="submit" class="btn btn-primary">Presensi</button></h4>
                                    @else
                                    <h4> <button type="submit" class="btn btn-primary">Presensi</button></h4>
                                    @endif
                                    @if (session('status'))
                                    <hr>
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                    @endif
                                </div>
                        </form>
                    </div>
                    </center>
                    </form>
                    @elseif ($p->status == "sakit")
                    <form action="{{ route('simpan-masuk') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <center>
                                <label id="clock" style="font-size: 100px; color: #000000; -webkit-text-stroke: 3px #F0F8FF;
                                                    text-shadow: 4px 4px 10px #F0F8FF,
                                                    4px 4px 20px #F0F8FF,
                                                    4px 4px 30px #F0F8FF,
                                                    4px 4px 40px #F0F8FF;">
                                </label>
                            </center>
                        </div>
                        <div class="row mb-3">
                            <center>
                                <div class="col-sm-8">
                                    <textarea class="form-control" style="height: 100px" placeholder="Keterangan Sakit / Ijin..." name="keterangan_masuk"></textarea>

                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" value="Sakit" name="status">
                                </div>
                                <br>
                                <div class="col-sm-8">
                                    <p>Upload foto surat keterangan sakit</p>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </center>
                        </div>

                        <center>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Presensi Sakit / Ijin</button>

                                @if (session('status'))
                                <hr>
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                                @endif
                            </div>
                        </center>
                    </form>
                    @endif
                </div>
            </div>
            <!-- /modal -->
            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Open modal for @mdo</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@fat">Open modal for @fat</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Open modal for @getbootstrap</button>

                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                                            <input type="text" class="form-control" id="recipient-name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Message:</label>
                                            <textarea class="form-control" id="message-text"></textarea>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Send message</button>
                                </div>
                            </div>
                        </div>
                    </div>--}}

            <!-- modal -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Riwayat Absensi</h5>
                        <p></p>
                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table datatable .table-responsive">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Masuk</th>
                                        <th scope="col">Keluar</th>
                                        <th scope="col">Kembali</th>
                                        <th scope="col">pulang</th>
                                        <th scope="col">jam kerja</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                @foreach ($presensi as $p)
                                <tbody>
                                    <tr>
                                        <th scope="row">{{ $p->id }}</th>
                                        <td>{{$p->jammasuk}}</td>
                                        <td>{{$p->jamkeluar }}</td>
                                        <td>{{$p->jammasuk_kembali }}</td>
                                        <td>{{$p->jampulang}}</td>
                                        <td>{{$p->jamkerja}}</td>
                                        <td>{{$p->tgl }}</td>
                                        <td><i class="bi bi-info-circle-fill"></i></td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <!-- End Table with stripped rows -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection