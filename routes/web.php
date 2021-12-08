<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\Data_pendaftarController;
use App\Http\Controllers\admin\Data_magangController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\Data_karyawan_magangController;


use App\Http\Controllers\user_admin\HomeController;

use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\ResumeController;
use App\Http\Controllers\user\User_daftarController;
use App\Http\Controllers\user\Form_magangController;
use App\Http\Controllers\user\Upload_tugasController;

use App\Http\Controllers\presensi\PresensiController;
use App\Http\Controllers\presensi\ScannerController;
use App\Http\Controllers\admin\QRcodeController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarcodeController;

#Generate BareCode Example

Route::get('barcode', [BarcodeController::class, 'index'])->name('barcode.index');
Route::get('create-barcode', [BarcodeController::class, 'create'])->name('barcode.create');
Route::post('store-barcode', [BarcodeController::class, 'store'])->name('barcode.store');



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::auth();
Route::get('/auth/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
// register
Route::get('/auth/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/home', [HomeController::class, 'index']);



route::post('/simpan-aktivitas', [PresensiController::class, 'simpan_aktivitas']);
route::get('/user/aktivitas-log', [PresensiController::class, 'aktivitas']);
route::get('/user/presensi-ijin', [PresensiController::class, 'presensi_ijin']);


route::middleware(['auth', 'ceklevel:user'])
    ->group(function () {
        Route::get('/user', [UserController::class, 'index']);
        Route::get('/user/upload-tugas/{user_id}', [Upload_tugasController::class, 'index']);
        Route::get('/user-daftar', [User_daftarController::class, 'index']);
        Route::get('/form-magang', [Form_magangController::class, 'index']);
        Route::post('/form', [Form_magangController::class, 'store']);
        Route::get('/user/data-presensi/{user_id}', [UserController::class, 'data_presensi']);
    });




route::middleware(['auth', 'ceklevel:admin'])
    ->group(function () {
        route::get('/dashboard', [DashboardController::class, 'index']);
        route::get('/dashboard/data-karyawan-magang', [Data_karyawan_magangController::class, 'index']);
        route::get('/dashboard/data-pendaftar', [Data_pendaftarController::class, 'data_pendaftar']);
        route::get('/dashboard/data-pendaftar/detail-pendaftar/{id}', [Data_pendaftarController::class, 'detail_pendaftar']);
        route::post('/terima-pendaftar', [Data_pendaftarController::class, 'terima']);
        route::post('/tolak-pendaftar', [Data_pendaftarController::class, 'tolak']);

        route::get('/dashboard/data-magang', [Data_magangController::class, 'data_magang']);
        route::get('/dashboard/data-presensi-sekarang', [Data_magangController::class, 'presensi_sekarang']);
        route::get('/dashboard/data-magang/data-presensi/{id}', [Data_magangController::class, 'data_presensi']);
        route::get('/dashboard/upload-tugas', [ProjectController::class, 'index']);
        
        //tampilan halaman scan
        route::get('/dashboard/scan-masuk', [ScannerController::class, 'index']);
        route::get('/dashboard/scan-istirahat', [ScannerController::class, 'istirahat']);
        route::get('/dashboard/scan-kembali', [ScannerController::class, 'kembali']);
        route::get('/dashboard/scan-pulang', [ScannerController::class, 'pulang']);
        //aksi scan presensi
        Route::post('/presensi-masuk', [ScannerController::class, 'presensi_masuk'])->name('presensi-masuk');
        Route::post('/presensi-istirahat', [ScannerController::class, 'presensi_istirahat'])->name('presensi-istirahat');
        Route::post('/presensi-kembali', [ScannerController::class, 'presensi_kembali'])->name('presensi-kembali');
        Route::post('/presensi-pulang', [ScannerController::class, 'presensi_pulang'])->name('presensi-pulang');
    });
