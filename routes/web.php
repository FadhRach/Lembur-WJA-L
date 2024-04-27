<?php

use App\Http\Controllers\Engineer\BerandaEngineerController;
use App\Http\Controllers\Engineer\BuatkanLemburController as EngineerBuatkanLemburController;
use App\Http\Controllers\Engineer\DaftarKaryawanController as EngineerDaftarKaryawanController;
use App\Http\Controllers\Engineer\LemburEngineerController;
use App\Http\Controllers\Karyawan\BerandaKaryawanController;
use App\Http\Controllers\karyawan\BuatLemburController;
use App\Http\Controllers\Karyawan\LemburKaryawanController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\Manager\BerandaManagerController;
use App\Http\Controllers\Manager\BuatkanLemburController as ManagerBuatkanLemburController;
use App\Http\Controllers\Manager\DaftarKaryawanController as ManagerDaftarKaryawanController;
use App\Http\Controllers\Manager\LemburManagerController;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/sendmail',[MailController::class, 'index']);
Route::get('/', [SesiController::class, 'index'])->name('login');
Route::post('/', [SesiController::class, 'login']);
// RESET
Route::get('/home', function(){return redirect('/');});

Route::middleware(['auth'])->group(function () {

// ROUTE MANAGER ------------------------------------------------------------------------------------------------------------------------
    // Profile Manager
    Route::get('/manager/profile/{id}', [UserController::class, 'indexmanager'])->middleware('userAkses:manager');
    Route::put('/manager/profile/editsave/{id}', [UserController::class, 'editsavemanager'])->middleware('userAkses:manager');
    // Beranda
    Route::get('/manager', [BerandaManagerController::class, 'index'])->middleware('userAkses:manager');
    // Pengajuan Lembur
    Route::get('/manager/datapengajuan', [LemburManagerController::class,'lemburpengajuan'])->middleware('userAkses:manager');
    Route::get('/manager/datapengajuan/{id}', [LemburManagerController::class,'lemburpengajuandetail'])->middleware('userAkses:manager');
    Route::get('/manager/datapengajuan/diterima/{id}', [LemburManagerController::class,'lemburpengajuanterima'])->middleware('userAkses:manager');
    Route::get('/manager/datapengajuan/ditolak/{id}', [LemburManagerController::class,'lemburpengajuantolak'])->middleware('userAkses:manager');
    // Laporan Lembur
    Route::get('/manager/datalaporan', [LemburManagerController::class,'lemburlaporan'])->middleware('userAkses:manager');
    Route::get('/manager/datalaporan/{id}', [LemburManagerController::class,'lemburlaporandetail'])->middleware('userAkses:manager');
    Route::put('/manager/datalaporan/terima/{id}', [LemburManagerController::class,'lemburlaporanterima'])->middleware('userAkses:manager');
    Route::put('/manager/datalaporan/revisi/{id}', [LemburManagerController::class,'lemburlaporanrevisi'])->middleware('userAkses:manager');
    Route::get('/manager/datalaporan/view/{id}', [LemburManagerController::class,'lemburlaporanviewfile'])->middleware('userAkses:manager');
    Route::get('/manager/datalaporan/archive/{id}', [LemburManagerController::class,'lemburlaporanarchive'])->middleware('userAkses:manager');
    // Data Lembur
    Route::get('/manager/datalembur', [LemburManagerController::class,'lemburdata'])->middleware('userAkses:manager');
    Route::get('/manager/datalembur/{id}', [LemburManagerController::class,'lemburdatadetail'])->middleware('userAkses:manager');
    // Daftar Karyawan
    Route::get('/manager/daftarkaryawan', [ManagerDaftarKaryawanController::class,'index'])->middleware('userAkses:manager');
    Route::get('/manager/daftarkaryawan/tambah', [ManagerDaftarKaryawanController::class,'tambah'])->middleware('userAkses:manager');
    Route::post('/manager/daftarkaryawan/tambahsave', [ManagerDaftarKaryawanController::class,'tambahsave'])->middleware('userAkses:manager');
    Route::get('/manager/daftarkaryawan/edit/{id}', [ManagerDaftarKaryawanController::class,'edit'])->middleware('userAkses:manager');
    Route::put('/manager/daftarkaryawan/editsave/{id}', [ManagerDaftarKaryawanController::class,'editsave'])->middleware('userAkses:manager');
    Route::get('/manager/daftarkaryawan/delete/{id}', [ManagerDaftarKaryawanController::class,'delete'])->middleware('userAkses:manager');
    Route::get('/manager/daftarkaryawan/cari', [ManagerDaftarKaryawanController::class,'cari'])->middleware('userAkses:manager');

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
    // Route::get('/engineer/datalaporan/template', [LemburEngineerController::class,'lemburlaporantemplatefile'])->middleware('userAkses:engineer');
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

//ROUTE KARYAWAN -----------------------------------------------------------------------------------------------------------------------
    // Profile
    Route::get('/karyawan/profile/{id}', [UserController::class, 'indexkaryawan'])->middleware('userAkses:karyawan');
    Route::put('/karyawan/profile/editsave/{id}', [UserController::class, 'editsavekaryawan'])->middleware('userAkses:karyawan');
    // Beranda
    Route::get('/karyawan', [BerandaKaryawanController::class, 'index'])->middleware('userAkses:karyawan');
    Route::get('/karyawan/datahistory', function(){return view('karyawan.berandadetail');})->middleware('userAkses:karyawan');
    // Pengajuan Lembur
    Route::get('/karyawan/datapengajuan', [LemburKaryawanController::class, 'lemburpengajuan'])->middleware('userAkses:karyawan');
    Route::get('/karyawan/datapengajuan/{id}', [LemburKaryawanController::class, 'lemburpengajuandetail'])->middleware('userAkses:karyawan');
    Route::get('/karyawan/datapengajuan/delete/{id}', [LemburKaryawanController::class,'lemburpengajuandelete'])->middleware('userAkses:karyawan');
    // Laporan Lembur
    Route::get('/karyawan/datalaporan', [LemburKaryawanController::class, 'lemburlaporan'])->middleware('userAkses:karyawan');
    Route::get('/karyawan/datalaporan/{id}', [LemburKaryawanController::class, 'lemburlaporandetail'])->middleware('userAkses:karyawan');
    Route::put('/karyawan/datalaporan/save/{id}', [LemburKaryawanController::class, 'lemburlaporansave'])->middleware('userAkses:karyawan');
    Route::get('/karyawan/datalaporan/view/{id}', [LemburKaryawanController::class,'lemburlaporanviewfile'])->middleware('userAkses:karyawan');
    Route::get('/karyawan/datalaporan/delete/{id}', [LemburKaryawanController::class,'lemburlaporandelete'])->middleware('userAkses:karyawan');
    Route::get('/karyawan/datalaporan/archive/{id}', [LemburKaryawanController::class,'lemburlaporanarchive'])->middleware('userAkses:karyawan');
    // History Lembur
    Route::get('/karyawan/datahistory', [LemburKaryawanController::class,'lemburhistory'])->middleware('userAkses:karyawan');
    Route::get('/karyawan/datahistory/{id}', [LemburKaryawanController::class,'lemburhistorydetail'])->middleware('userAkses:karyawan');
    // Buat Lembur
    Route::get('/karyawan/buatlembur', [BuatLemburController::class, 'index'])->middleware('userAkses:karyawan');
    Route::post('/karyawan/buatlembursave', [BuatLemburController::class, 'tambahlemburkaryawan'])->middleware('userAkses:karyawan');
    //LOGOUT -------------------------------------------------------------------------------------------------------------------------------
    Route::get('/logout', [SesiController::class, 'logout']);
});

