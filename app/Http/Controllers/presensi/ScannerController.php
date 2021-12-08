<?php

namespace App\Http\Controllers\presensi;

use App\Http\Controllers\Controller;
use DateTime;
use DateTimeZone;
use App\Models\Presensi;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ScannerController extends Controller
{
    public function index()
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');
        $localtime = $date->format('H:i:s');

        $presensi = DB::table('presensi')
            ->get();

        return view('admin.presensi.scan-masuk',  ['presensi' => $presensi, 'tanggal' => $tanggal]);
    }
    public function istirahat()
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');
        $localtime = $date->format('H:i:s');

        $presensi = DB::table('presensi')
            ->get();

        return view('admin.presensi.scan-istirahat',  ['presensi' => $presensi, 'tanggal' => $tanggal]);
    }
    public function kembali()
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');
        $localtime = $date->format('H:i:s');

        $presensi = DB::table('presensi')
            ->get();

        return view('admin.presensi.scan-kembali',  ['presensi' => $presensi, 'tanggal' => $tanggal]);
    }
    public function pulang()
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');
        $localtime = $date->format('H:i:s');

        $presensi = DB::table('presensi')
            ->get();

        return view('admin.presensi.scan-pulang',  ['presensi' => $presensi, 'tanggal' => $tanggal]);
    }

    public function presensi_masuk(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id', '=', $request->user_id],
            ['tgl', '=', $tanggal],
        ])->first();
        if ($presensi) {
            // dd('sudah ada');
            return redirect('/dashboard/scan-masuk')->with('status', 'Sudah Melakukan Presensi Masuk');
        } else {
            Presensi::create([
                'user_id' =>  $request->user_id,
                'tgl' => $tanggal,
                'jammasuk' => $localtime,
                'status' => 'masuk',

            ]);
        }
        return redirect('/dashboard/scan-masuk')->with('status', 'Presensi Masuk Berhasil!');
    }
    public function presensi_istirahat(Request $request)
    {

        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id', '=', $request->user_id],
            ['tgl', '=', $tanggal],
        ])->first();
        if ($presensi->jamkeluar == "") {
            $presensi->update([
                'jamkeluar' => $localtime,
                'status' => 'istirahat',
            ]);
            return redirect('/dashboard/scan-istirahat')->with('status', 'Presensi Istirahat Berhasil!');
        } else {
            return redirect('/dashboard/scan-istirahat')->with('status', 'Sudah Melakukan Presensi Istirahat!');
        }
    }

    public function presensi_kembali(Request $request)
    {

        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id', '=', $request->user_id],
            ['tgl', '=', $tanggal],
        ])->first();
        if ($presensi->jammasuk_kembali == "") {
            $presensi->update([
                'jammasuk_kembali' => $localtime,
                'status' => 'kembali',
            ]);
            return redirect('/dashboard/scan-kembali')->with('status', 'Presensi kembali Berhasil!');
        } else {
            return redirect('/dashboard/scan-kembali')->with('status', 'Sudah Melakukan Presensi kembali!');
        }
    }

    public function presensi_pulang(Request $request)
    {

        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');
        $localtime = $date->format('H:i:s');


        $presensi = Presensi::where([
            ['user_id', '=', $request->user_id],
            ['tgl', '=', $tanggal],
        ])->first();

        $hitung_masuk = date(
            'H:i:s', strtotime($presensi->jamkembali_masuk) - strtotime($presensi->jamkeluar));
        // $hitung_istirahat = strtotime('jammasuk_kembali') - strtotime('jamkeluar');
        // $hitung_jamkerja = $hitung_masuk - $hitung_istirahat;

        if ($presensi->jampulang == "") {
            $presensi->update([
                'jampulang' => $localtime,
                'status' => 'pulang',
                'jamkerja' => $hitung_masuk
            ]);
            return redirect('/dashboard/scan-pulang')->with('status', 'Presensi Pulang Berhasil!');
        } elseif (($presensi->jampulang != "")) {
            return redirect('/dashboard/scan-pulang')->with('status', 'Sudah Melakukan Presensi Pulang!');
        }
    }
}
