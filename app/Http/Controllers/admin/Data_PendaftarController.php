<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Data_PendaftarController extends Controller
{
    public function data_pendaftar()
    {
        $form = DB::table('form')->latest()
            ->get();
        return view('admin.daftar-magang.data-pendaftar', ['form' => $form]);
    }
    public function detail_pendaftar($user_id)
    {
        $form = DB::table('form')
            ->where('user_id', $user_id)
            ->latest()
            ->get();
        return view('admin.daftar-magang.detail-pendaftar', ['form' => $form]);
    }

    public function terima(Request $request)
    {
        DB::table('form')
            ->where('user_id',  $request->user_id)
            ->update([
                'surat_balasan' => $request->surat_balasan,
                'status' => 'aktif-magang'
               
            ]);

        DB::table('users')
            ->where('id',  $request->user_id)
            ->update([
                'status' => 'aktif-magang'
            ]);
           

        return redirect('/dashboard/data-pendaftar');
    }
    public function tolak(Request $request)
    {
        DB::table('form')
            ->where('user_id',  $request->user_id)
            ->update([
                'surat_balasan' => $request->surat_balasan,
                'status' => 'ditolak'
            ]);

        DB::table('users')
            ->where('id',  $request->user_id)
            ->update([
                'status' => 'ditolak'
            ]);

        return redirect('/dashboard/data-pendaftar');
    }
}
