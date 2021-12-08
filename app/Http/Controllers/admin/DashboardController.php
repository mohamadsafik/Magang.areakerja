<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use DateTime;
use DateTimeZone;
use App\Models\Presensi;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');

        $aktif_magang = DB::table('users')->where('status', '=', 'aktif-magang')->count();
        $daftar_magang = DB::table('users')->where('status', '=', 'daftar-magang')->count();

        // masuk
        $masuk = DB::table('presensi')->where([
            ['tgl', '=', $tanggal],
            ['status', '!=', 'sakit'],
            ['status', '!=', 'presensi'],
            ['status', '!=', 'ijin'],
        ])->count();
        // sakit ijin
        $sakit = DB::table('presensi')->where([
            ['tgl', '=', $tanggal],
            ['status', '=', 'sakit'],
        ])->count();
        $ijin = DB::table('presensi')->where([
            ['tgl', '=', $tanggal],
            ['status', '=', 'ijin'],
        ])->count();
        // tanpa keterangan
        $tanpa_keterangan = $aktif_magang - ($masuk + $sakit + $ijin);

        //informasi magang area kerja dari mana?
        $website  = DB::table('form')->where([
            ['asal_info', '=', 'Website'],
        ])->count();
        $instagram  = DB::table('form')->where([
            ['asal_info', '=', 'Instagram'],
        ])->count();
        $twitter  = DB::table('form')->where([
            ['asal_info', '=', 'Twitter'],
        ])->count();
        $glints  = DB::table('form')->where([
            ['asal_info', '=', 'Glints'],
        ])->count();
        $youtube  = DB::table('form')->where([
            ['asal_info', '=', 'Youtube'],
        ])->count();
        $lain  = DB::table('form')->where([
            ['asal_info', '=', 'Yang lain'],
        ])->count();

        $form = DB::table('form')->latest()
            ->paginate(3);

        $users = DB::table('users')
            ->where([
                ['tgl', '=', $tanggal],
            ])
            ->select('users.*', 'presensi.status as status', 'presensi.tgl as tgl', )
            ->join('presensi', 'users.id', '=', 'presensi.user_id')
            ->latest()
            ->get();


        // return view('admin.admin', ['aktif_magang' => $aktif_magang, 'daftar_magang' => $daftar_magang ]);
        return view('admin.dashboard.dashboard', [
            'aktif_magang' => $aktif_magang,
            'daftar_magang' => $daftar_magang,
            'masuk' => $masuk,
            'sakit' => $sakit,
            'ijin' => $ijin,
            'tanpa_keterangan' => $tanpa_keterangan,
            'website' => $website,
            'instagram' => $instagram,
            'twitter' => $twitter,
            'instagram' => $instagram,
            'glints' => $glints,
            'youtube' => $youtube,
            'lain' => $lain,
            'form' => $form,
            'users' => $users,
        ]);
    }
}
