<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Data_karyawan_magangController extends Controller
{
    public function index(){
        $form = DB::table('form')
        ->get();
        return view('admin.karyawan-magang.data-karyawan-magang',['form' => $form]);

    }
}
