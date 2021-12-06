<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class User_daftarController extends Controller
{
   public function index(Request $request)
   {
      $form = DB::table('form')
         ->where('user_id', '=', auth()->user()->id)
         ->get();

      if (Auth::user()->status == 'aktif-magang')
         return redirect('/user');
      else
         return view('user.user-daftar', ['form' => $form]);
   }
}
