<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class UserController extends Controller
{
    public function index()
    {
        
        $qrcode = QrCode::size(250)->generate(Auth()->user()->id);
        if (Auth::user()->status == 'aktif-magang')
            return view('user.aktif-magang.user', ['qrcode' => $qrcode]);
        elseif (Auth::user()->status == 'daftar-magang')
            return redirect('/user-daftar');
    }

    public function data_presensi($user_id)
    {
        $presensi = DB::table('presensi')
            ->where('user_id', $user_id)
            ->select('presensi.*', 'users.name as name')
            ->join('users', 'presensi.user_id', '=', 'users.id')
            ->latest()
            ->get();
        return view('user.aktif-magang.data-presensi', ['presensi' => $presensi]);
    }
}