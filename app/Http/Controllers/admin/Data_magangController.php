<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use DateTime;
use DateTimeZone;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Data_MagangController extends Controller
{
    public function data_magang()
    {
        $form = DB::table('form')
            ->get();
        return view('admin.presensi.data-magang', ['form' => $form]);
    }
    public function data_presensi($user_id)
    {
        $presensi = DB::table('presensi')
            ->where('user_id', $user_id)
            ->select('presensi.*', 'users.name as name')
            ->join('users', 'presensi.user_id', '=', 'users.id')
            ->latest()
            ->get();
        return view('admin.presensi.data-presensi', ['presensi' => $presensi]);
    }
    public function presensi_sekarang()
    {
        $timezone = 'Asia/Jakarta';
        $date = new DateTime('now', new DateTimeZone($timezone));
        $tanggal = $date->format('l, d-m-Y');

        $users = DB::table('users')
            ->where([
                ['tgl', '=', $tanggal],
            ])
            ->select('users.*', 'presensi.status as status', 'presensi.tgl as tgl')
            ->join('presensi', 'users.id', '=', 'presensi.user_id')
            ->get();
        $form = DB::table('form')
            ->get();

        return view('admin.presensi.data-presensi-sekarang', ['users' => $users, 'form' => $form]);
    }
}
