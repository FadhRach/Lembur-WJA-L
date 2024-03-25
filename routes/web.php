<?php

use App\Http\Controllers\Engineer\BerandaEngineerController;
use App\Http\Controllers\Karyawan\BerandaKaryawanController;
use App\Http\Controllers\karyawan\BuatLemburController;
use App\Http\Controllers\Manager\BerandaManagerController;
use App\Http\Controllers\Manager\DaftarKaryawanController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['guest'])->group(function(){
    
});
Route::get('/', [SesiController::class, 'index'])->name('login');
Route::post('/', [SesiController::class, 'login']);
// RESET BOBOL
Route::get('/home', function(){
    return redirect('/');
});

Route::middleware(['auth'])->group(function () {

    // ROUTE MANAGER
    Route::get('/manager/profile/{id}', [UserController::class, 'indexmanager'])->middleware('userAkses:manager');
    Route::put('/manager/profile/editsave/{id}', [UserController::class, 'editsavemanager'])->middleware('userAkses:manager');
    Route::get('/manager', [BerandaManagerController::class, 'index'])->middleware('userAkses:manager');
    Route::get('/manager/datalembur', function(){return view('manager.lemburdata');})->middleware('userAkses:manager');
    Route::get('/manager/datalaporan', function(){return view('manager.lemburlaporan');})->middleware('userAkses:manager');
    Route::get('/manager/datapengajuan', function(){return view('manager.lemburpengajuan');})->middleware('userAkses:manager');
    Route::get('/manager/daftarkaryawan', [DaftarKaryawanController::class,'index'])->middleware('userAkses:manager');
    Route::get('/manager/daftarkaryawan/tambah', [DaftarKaryawanController::class,'tambah'])->middleware('userAkses:manager');
    Route::post('/manager/daftarkaryawan/tambahsave', [DaftarKaryawanController::class,'tambahsave'])->middleware('userAkses:manager');
    Route::get('/manager/daftarkaryawan/edit/{id}', [DaftarKaryawanController::class,'edit'])->middleware('userAkses:manager');
    Route::put('/manager/daftarkaryawan/editsave/{id}', [DaftarKaryawanController::class,'editsave'])->middleware('userAkses:manager');
    Route::get('/manager/daftarkaryawan/delete/{id}', [DaftarKaryawanController::class,'delete'])->middleware('userAkses:manager');
    Route::get('/manager/daftarkaryawan/cari', [DaftarKaryawanController::class,'cari'])->middleware('userAkses:manager');
    Route::get('/manager/buatkanlembur', function(){return view('manager.buatkanlembur');})->middleware('userAkses:manager');

    //ROUTE ENGINEER
    Route::get('/engineer/profile/{id}', [UserController::class, 'indexengineer'])->middleware('userAkses:engineer');
    Route::put('/engineer/profile/editsave/{id}', [UserController::class, 'editsaveengineer'])->middleware('userAkses:engineer');
    Route::get('/engineer', [BerandaEngineerController::class, 'index'])->middleware('userAkses:engineer');

    //ROUTE KARYAWAN
    Route::get('/karyawan/profile/{id}', [UserController::class, 'indexkaryawan'])->middleware('userAkses:karyawan');
    Route::put('/karyawan/profile/editsave/{id}', [UserController::class, 'editsavekaryawan'])->middleware('userAkses:karyawan');
    Route::get('/karyawan', [BerandaKaryawanController::class, 'index'])->middleware('userAkses:karyawan');
    Route::get('/karyawan/pengajuan', function(){return view('karyawan.lemburpengajuan');})->middleware('userAkses:karyawan');
    Route::get('/karyawan/laporan', function(){return view('karyawan.lemburlaporan');})->middleware('userAkses:karyawan');
    Route::get('/karyawan/history', function(){return view('karyawan.lemburhistory');})->middleware('userAkses:karyawan');
    Route::get('/karyawan/buatlembur', [BuatLemburController::class, 'index'])->middleware('userAkses:karyawan');
    Route::post('/karyawan/buatlembursave', [BuatLemburController::class, 'tambahlemburkaryawan'])->middleware('userAkses:karyawan');
    Route::get('/karyawan/lemburpengajuan', function(){return view ('karyawan.pengajuanlembur');})->middleware('userAkses:karyawan');
    Route::get('/karyawan/lemburkegiatan', function(){return view ('karyawan.kegiatanlembur');})->middleware('userAkses:karyawan');
    Route::get('/karyawan/lemburlaporan', function(){return view ('karyawan.laporanlembur');})->middleware('userAkses:karyawan');
    Route::get('/karyawan/lemburhistory', function(){return view ('karyawan.history');})->middleware('userAkses:karyawan');

    //LOGOUT
    Route::get('/logout', [SesiController::class, 'logout']);
});

