<?php

namespace App\Http\Controllers\user_admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index(){
        $users = DB::table('users')->get();


        return view('beranda.home',['users' => $users]);
    }
}
