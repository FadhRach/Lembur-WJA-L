<?php

use App\Http\Controllers\Engineer\BerandaEngineerController;
use App\Http\Controllers\Engineer\BuatkanLemburController as EngineerBuatkanLemburController;
use App\Http\Controllers\Engineer\DaftarKaryawanController as EngineerDaftarKaryawanController;
use App\Http\Controllers\Engineer\LemburEngineerController;
use App\Http\Controllers\Karyawan\BerandaKaryawanController;
use App\Http\Controllers\karyawan\BuatLemburController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Manager\BerandaManagerController;
use App\Http\Controllers\Manager\BuatkanLemburController as ManagerBuatkanLemburController;
use App\Http\Controllers\Manager\DaftarKaryawanController as ManagerDaftarKaryawanController;
use App\Http\Controllers\Manager\LemburManagerController;
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
Route::get('/sendmail',[MailController::class, 'index']);
Route::get('/', [SesiController::class, 'index'])->name('login');
Route::post('/', [SesiController::class, 'login']);
// RESET BOBOL
Route::get('/home', function(){
    return redirect('/');
});

Route::middleware(['auth'])->group(function () {

// ROUTE MANAGER ------------------------------------------------------------------------------------------------------------------------
    // Profile Manager
    Route::get('/manager/profile/{id}', [UserController::class, 'indexmanager'])->middleware('userAkses:manager');
    Route::put('/manager/profile/editsave/{id}', [UserController::class, 'editsavemanager'])->middleware('userAkses:manager');
    // Beranda
    Route::get('/manager', [BerandaManagerController::class, 'index'])->middleware('userAkses:manager');
    // Pengajuan Lembur
    Route::get('/manager/datapengajuan', [LemburManagerController::class,'lemburpengajuan'])->middleware('userAkses:manager');
    Route::get('/manager/datapengajuan/diterima/{id}', [LemburManagerController::class,'lemburpengajuanterima'])->middleware('userAkses:manager');
    Route::get('/manager/datapengajuan/ditolak/{id}', [LemburManagerController::class,'lemburpengajuantolak'])->middleware('userAkses:manager');
    // Laporan Lembur
    Route::get('/manager/datalaporan', [LemburManagerController::class,'lemburlaporan'])->middleware('userAkses:manager');
    Route::get('/manager/datalaporan/{id}', [LemburManagerController::class,'lemburlaporandetail'])->middleware('userAkses:manager');
    Route::put('/manager/datalaporan/terima/{id}', [LemburManagerController::class,'lemburlaporanterima'])->middleware('userAkses:manager');
    Route::put('/manager/datalaporan/revisi/{id}', [LemburManagerController::class,'lemburlaporanrevisi'])->middleware('userAkses:manager');
    Route::get('/manager/datalaporan/view/{id}', [LemburManagerController::class,'lemburlaporanviewfile'])->middleware('userAkses:manager');
    // Data Lembur
    Route::get('/manager/datalembur', function(){return view('manager.lemburdata');})->middleware('userAkses:manager');
    // Daftar Karyawan
    Route::get('/manager/daftarkaryawan', [ManagerDaftarKaryawanController::class,'index'])->middleware('userAkses:manager');
    Route::get('/manager/daftarkaryawan/tambah', [ManagerDaftarKaryawanController::class,'tambah'])->middleware('userAkses:manager');
    Route::post('/manager/daftarkaryawan/tambahsave', [ManagerDaftarKaryawanController::class,'tambahsave'])->middleware('userAkses:manager');
    Route::get('/manager/daftarkaryawan/edit/{id}', [ManagerDaftarKaryawanController::class,'edit'])->middleware('userAkses:manager');
    Route::put('/manager/daftarkaryawan/editsave/{id}', [ManagerDaftarKaryawanController::class,'editsave'])->middleware('userAkses:manager');
    Route::get('/manager/daftarkaryawan/delete/{id}', [ManagerDaftarKaryawanController::class,'delete'])->middleware('userAkses:manager');
    Route::get('/manager/daftarkaryawan/cari', [ManagerDaftarKaryawanController::class,'cari'])->middleware('userAkses:manager');
    // Buatkanlembur Karyawan
    Route::get('/manager/buatkanlembur/karyawan', [ManagerBuatkanLemburController::class,'indexbuatlemburkaryawan'])->middleware('userAkses:manager');
    Route::post('/manager/buatkanlembur/karyawansave', [ManagerBuatkanLemburController::class,'tambahlemburkaryawan'])->middleware('userAkses:manager');
    // Buatkanlembur Engineer
    Route::get('/manager/buatkanlembur/engineer', [ManagerBuatkanLemburController::class,'indexbuatlemburengineer'])->middleware('userAkses:manager');
    Route::post('/manager/buatkanlembur/engineersave', [ManagerBuatkanLemburController::class,'tambahlemburengineer'])->middleware('userAkses:manager');


//ROUTE ENGINEER -----------------------------------------------------------------------------------------------------------------------
    // Profile
    Route::get('/engineer/profile/{id}', [UserController::class, 'indexengineer'])->middleware('userAkses:engineer');
    Route::put('/engineer/profile/editsave/{id}', [UserController::class, 'editsaveengineer'])->middleware('userAkses:engineer');
    // Beranda
    Route::get('/engineer', [BerandaEngineerController::class, 'index'])->middleware('userAkses:engineer');
    // Pengajuan Lembur
    Route::get('/engineer/datapengajuan', [LemburEngineerController::class,'lemburpengajuan'])->middleware('userAkses:engineer');
    Route::get('/engineer/datapengajuan/{id}', [LemburEngineerController::class,'lemburpengajuandetail'])->middleware('userAkses:engineer');
    Route::get('/engineer/datapengajuan/diterima/{id}', [LemburEngineerController::class,'lemburpengajuanterima'])->middleware('userAkses:engineer');
    Route::get('/engineer/datapengajuan/ditolak/{id}', [LemburEngineerController::class,'lemburpengajuantolak'])->middleware('userAkses:engineer');
    Route::get('/engineer/datapengajuan/delete/{id}', [LemburEngineerController::class,'lemburpengajuandelete'])->middleware('userAkses:engineer');
    // Laporan Lembur
    Route::get('/engineer/datalaporan', [LemburEngineerController::class,'lemburlaporan'])->middleware('userAkses:engineer');
    Route::get('/engineer/datalaporan/{id}', [LemburEngineerController::class,'lemburlaporandetail'])->middleware('userAkses:engineer');
    Route::put('/engineer/datalaporan/terima/{id}', [LemburEngineerController::class,'lemburlaporanterima'])->middleware('userAkses:engineer');
    Route::put('/engineer/datalaporan/revisi/{id}', [LemburEngineerController::class,'lemburlaporanrevisi'])->middleware('userAkses:engineer');
    Route::get('/engineer/datalaporan/delete/{id}', [LemburEngineerController::class,'lemburlaporandelete'])->middleware('userAkses:engineer');
    Route::get('/engineer/datalaporan/view/{id}', [LemburEngineerController::class,'lemburlaporanviewfile'])->middleware('userAkses:engineer');
    Route::get('/engineer/datalaporan/archive/{id}', [LemburEngineerController::class,'lemburlaporanarchive'])->middleware('userAkses:engineer');
    // Data Lembur
    Route::get('/engineer/datalembur', [LemburEngineerController::class,'lemburdata'])->middleware('userAkses:engineer');
    Route::get('/engineer/datalembur/{id}', [LemburEngineerController::class,'lemburdatadetail'])->middleware('userAkses:engineer');
    // Daftar Karyawan
    Route::get('/engineer/daftarkaryawan', [EngineerDaftarKaryawanController::class, 'index'])->middleware('userAkses:engineer');
    Route::get('/engineer/daftarkaryawan/tambah', [EngineerDaftarKaryawanController::class,'tambah'])->middleware('userAkses:engineer');
    Route::post('/engineer/daftarkaryawan/tambahsave', [EngineerDaftarKaryawanController::class,'tambahsave'])->middleware('userAkses:engineer');
    Route::get('/engineer/daftarkaryawan/edit/{id}', [EngineerDaftarKaryawanController::class,'edit'])->middleware('userAkses:engineer');
    Route::put('/engineer/daftarkaryawan/editsave/{id}', [EngineerDaftarKaryawanController::class,'editsave'])->middleware('userAkses:engineer');
    Route::get('/engineer/daftarkaryawan/delete/{id}', [EngineerDaftarKaryawanController::class,'delete'])->middleware('userAkses:engineer');
    Route::get('/engineer/daftarkaryawan/cari', [EngineerDaftarKaryawanController::class,'cari'])->middleware('userAkses:engineer');

    // Buatkan Lembur
    Route::get('/engineer/buatkanlembur/sendiri', [EngineerBuatkanLemburController::class,'indexbuatlembursendiri'])->middleware('userAkses:engineer');
    Route::post('/engineer/buatkanlembur/sendirisave', [EngineerBuatkanLemburController::class,'tambahlembursendiri'])->middleware('userAkses:engineer');
    Route::get('/engineer/buatkanlembur/karyawan', [EngineerBuatkanLemburController::class,'indexbuatlemburkaryawan'])->middleware('userAkses:engineer');
    Route::post('/engineer/buatkanlembur/karyawansave', [EngineerBuatkanLemburController::class,'tambahlemburkaryawan'])->middleware('userAkses:engineer');




//ROUTE KARYAWAN -----------------------------------------------------------------------------------------------------------------------
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

    //LOGOUT -------------------------------------------------------------------------------------------------------------------------------
    Route::get('/logout', [SesiController::class, 'logout']);
});

