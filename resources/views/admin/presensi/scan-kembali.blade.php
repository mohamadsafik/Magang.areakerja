@extends('layouts.scanner')

@section('content')

<body>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Scan Presensi Kembali</h1>
            <nav>
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
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="{{url('/dashboard/scan-masuk')}}">Scan Masuk</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/dashboard/scan-istirahat')}}">Scan Istirahat</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/dashboard/scan-kembali')}}">Scan Kembali</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/dashboard/scan-pulang')}}">Scan Pulang</a></li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="container">
            <div id="info" class="show-on-success">
                <form action="{{ route('presensi-kembali') }}" method="post">
                    @csrf
                    <textarea id="text" name="user_id"style="display: none;"></textarea>

                    <span id="info-controls">
                        <button id="copy"style="display: none;">Copy to Clipboard</button>
                        @foreach ($presensi as $p)
                        @endforeach
                        <button type="submit" id="open-url"style="display: none;">Go to URL</button>

                        <button id="scan"style="display: none;">Scan Again</button>
                    </span>
                    <div id="scanlog" class="show-on-scan"style="display: none;">ScanQR</div>
            </div>
            <video autoplay class="show-on-scan"></video>
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="480" height="480" id="svg">
            </svg>
            <canvas id="qr-canvas" class="show-on-success"></canvas>
            </form>
        </div>
    </main>


</body>
@endsection