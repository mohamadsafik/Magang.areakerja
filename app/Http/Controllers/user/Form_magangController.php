<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use DateTime;
use DateTimeZone;
use Carbon\Carbon;

class Form_magangController extends Controller
{
    //halaman formulir-magang
    public function index()
    {
        $form = DB::table('form')->get();
        if (Auth::user()->status == '') {
            return view('user.form-magang', ['form' => $form]);
        } elseif (Auth::user()->status == 'daftar-magang') {
            return redirect('user-daftar');
        }
    }
    public function store(Request $request)
    {
        $cv = $request->file('cv');
        $cv->storeAs('public/data_form_magang', $cv->getClientOriginalName());
        $portofolio = $request->file('portofolio');
        $portofolio->storeAs('public/data_form_magang', $portofolio->getClientOriginalName());

        DB::table('form')->insert([
            'user_id' => Auth::user()->id,
            'status' => 'daftar-magang',
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nomor_hp' => $request->nomor_hp,
            'asal_kampus' => $request->asal_kampus,
            'program_studi' => $request->program_studi,
            'alamat' => $request->alamat,
            'alasan_magang' =>  $request->alasan_magang,
            'jenis_magang' => $request->jenis_magang,
            'wfo' => $request->wfo,
            'status_kerja' => $request->status_kerja,
            'bahasa_inggris' => $request->bahasa_inggris,
            'nomor_dosen' => $request->nomor_dosen,
            'divisi' =>  $request->divisi,
            'jam_kerja' => $request->jam_kerja,
            'desain_grafis' => $request->desain_grafis,
            'videografer' => $request->videografer,
            'programmer' => $request->programmer,
            'digital_marketing' => $request->digital_marketing,
            'laptop_magang' => $request->laptop_magang,
            'alat_magang' => $request->alat_magang,
            'mulai_magang' =>  $request->mulai_magang,
            'selesai_magang' =>  $request->selesai_magang,
            'asal_info' => $request->asal_info,
            'cv' => $cv->getClientOriginalName(),
            'portofolio' => $portofolio->getClientOriginalName(),
            'kegiatan_diluar_magang' => $request->nama,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()

        ]);
        DB::table('users')
            ->where('id', '=', auth()->user()->id)
            ->update([
                'status' => 'daftar-magang'
            ]);


        return redirect('/user-daftar')->with('status', 'berhasil mengirim Formulir Magang');
    }

    //halaman berkas-magang
    public function berkas()
    {

        return view('user.berkas-magang');
    }
}
