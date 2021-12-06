<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class Upload_tugasController extends Controller
{
    public function index($user_id)
    {
        $presensi = DB::table('presensi')
            ->where('user_id', $user_id)
            ->select('presensi.*', 'users.name as name')
            ->join('users', 'presensi.user_id', '=', 'users.id')
            ->latest()
            ->get();
            
        return view('user.upload-tugas', ['presensi' => $presensi]);
    }
}
