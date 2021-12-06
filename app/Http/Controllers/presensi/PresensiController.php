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


class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      $timezone = 'Asia/Jakarta';
      $date = new DateTime('now', new DateTimeZone($timezone));
      $tanggal = $date->format('l, d-m-Y');
      $localtime = $date->format('H:i:s');
  
      $presensi = Presensi::where([
          ['user_id', '=', auth()->user()->id],
          ['tgl', '=', $tanggal],
      ])->first();
      
      $presensi = DB::table('presensi')
          ->where('user_id', '=', auth()->user()->id)
          ->get();
  
      return view('admin.presensi.qr-code',  ['presensi' => $presensi]);
    }
    public function simpan_aktivitas(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id', '=', auth()->user()->id],
            ['tgl', '=', $tanggal],
        ])->first();

        if ($presensi->aktivitas_log == "")
            $presensi->update([
                // dd($presensi)
                'aktivitas_log' => $request->aktivitas_log
            ]);
        return redirect('/user');
    }
  
    public function presensi()
    {
        $qrcode = QrCode::generate('https://www.youtube.com/watch?v=X-YRVj_FiT8');
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id'],
            ['tgl', '=', $tanggal],
        ])->first();
        
        $presensi = DB::table('presensi')
            ->where('user_id', '=', auth()->user()->id)
            ->get();

        return view('presensi.presensi', ['presensi' => $presensi, 'qrcode' => $qrcode]);
    }
    public function aktivitas()
    {
        $presensi = DB::table('presensi')
            ->latest()
            ->get();

        return view('presensi.aktivitas-log', ['presensi' => $presensi]);
    }

    public function presensi_mulai(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id'],
            ['tgl', '=', $tanggal],
        ])->first();
        if ($presensi) {
            return redirect('/presensi');
            // dd('presensi sudah selesai');
        } else {
            Presensi::create([
                'user_id' => auth()->user()->id,
                'tgl' => $tanggal,
                'status' => 'presensi',

            ]);
        }
        return redirect('/presensi');
    }

    public function presensi_masuk(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id', '=', auth()->user()->id],
            ['tgl', '=', $tanggal],
        ])->first();
        if ($presensi->jammasuk == "" ) {
            $presensi->update([
                'jammasuk' => $localtime,
                'status' => $request -> status,
                'keterangan_masuk' => $request->keterangan_masuk

            ]);
            return redirect('/presensi')->with('status', 'Presensi Masuk Berhasil!');
        } else {
            return redirect('/presensi');
        }
    }


    public function presensi_istirahat(Request $request)
    {

        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id', '=', auth()->user()->id],
            ['tgl', '=', $tanggal],
        ])->first();
        if ($presensi->jamkeluar == "") {
            $presensi->update([
                'jamkeluar' => $localtime,
                'status' => 'istirahat',
                'keterangan_istirahat' => $request->keterangan_istirahat

            ]);
            return redirect('/presensi')->with('status', 'Presensi Istirahat Berhasil!');
        } else {
            return redirect('/presensi');
        }
    }


    public function Presensi_kembali(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');
        $localtime = $date->format('H:i:s');

        $presensi = Presensi::where([
            ['user_id', '=', auth()->user()->id],
            ['tgl', '=', $tanggal],
        ])->first();
        if ($presensi->jammasuk_kembali == "") {
            $presensi->update([
                'jammasuk_kembali' => $localtime,
                'status' => 'kembali',
                'keterangan_kembali' => $request->keterangan_kembali

            ]);
            return redirect('/presensi')->with('status', 'Presensi kembali Berhasil!');
        } else {
            return redirect('/presensi');
        }
    }

    public function presensi_pulang(Request $request)
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');
        $localtime = $date->format('H:i:s');

        //rumus hitung jam kerja
        $presensi = Presensi::where([
            ['user_id', '=', auth()->user()->id],
            ['tgl', '=', $tanggal],
        ])->first();
        $dt = [
            'status' => 'pulang',
            'jampulang' => $localtime,
            'keterangan_pulang' => $request->keterangan_pulang,
            'jamkerja' => date(
                'H:i:s',
                (strtotime($localtime) - strtotime($presensi->jammasuk))
                    - ((strtotime($presensi->jammasuk_kembali) - strtotime($presensi->jamkeluar)))
            )
        ];

        if ($presensi->jampulang == "") {
            $presensi->update($dt);
            return redirect('qr-code')->with('status', 'Presensi Selesai');
        } else {
            return redirect('qr-code');
        }
    }

    


    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // public function halamanrekap()
    // {
    //     return view('Presensi.Halaman-rekap-karyawan');
    // }


    // public function tampildatakeseluruhan($tglawal, $tglakhir)
    // {
    //     $presensi = Presensi::with('user')->whereBetween('tgl', [$tglawal, $tglakhir])->orderBy('tgl', 'asc')->get();
    //     return view('Presensi.Rekap-karyawan', compact('presensi'));
    // }
}
