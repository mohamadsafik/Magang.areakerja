<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/qrcode/css/main.css">

    <title>QR Code Scanner</title>
</head>

<body>
    <div class="container">
        <div id="info" class="show-on-success">
            <form action="{{ route('presensi-pulang') }}" method="post">
                @csrf
                <textarea id="text" name="user_id"></textarea>

                <span id="info-controls">
                    <button id="copy">Copy to Clipboard</button>
                    @foreach ($presensi as $p)
                    @endforeach
                    <button type="submit" id="open-url">Go to URL</button>
           
            <button id="scan">Scan Again</button>
            </span>
        </div>
        <div id="scanlog" class="show-on-scan">ScanQR</div>
        @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
        @endif
        <video autoplay class="show-on-scan"></video>
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="480" height="480" id="svg">
        </svg>
        <canvas id="qr-canvas" class="show-on-success"></canvas>
        </form>
    </div>


</body>
<script type="text/javascript" src="/qrcode/jsqrcode/grid.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/version.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/detector.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/formatinf.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/errorlevel.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/bitmat.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/datablock.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/bmparser.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/datamask.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/rsdecoder.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/gf256poly.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/gf256.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/decoder.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/qrcode.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/findpat.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/alignpat.js"></script>
<script type="text/javascript" src="/qrcode/jsqrcode/databr.js"></script>
<script type="text/javascript" src="/qrcode/scripts/main.js"></script>
<script>
      
    // window.onload = function() {
    //     var button = document.getElementById('open-url');
    //     setInterval(function() {
    //         button.click();
    //     }, 100000); // this will make it click again every 1000 miliseconds
    //     }
    
</script>


</html>