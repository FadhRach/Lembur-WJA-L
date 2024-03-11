<?php

use App\Http\Controllers\Engineer\BerandaEngineerController;
use App\Http\Controllers\Karyawan\BerandaKaryawanController;
use App\Http\Controllers\Manager\BerandaManagerController;
use App\Http\Controllers\Manager\DaftarKaryawanController;
use App\Http\Controllers\SesiController;
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
    Route::get('/manager', [BerandaManagerController::class, 'index'])->middleware('userAkses:manager');
    Route::get('/manager/datalembur', function(){return view('manager.lemburdata');})->middleware('userAkses:manager');
    Route::get('/manager/datalaporan', function(){return view('manager.lemburlaporan');})->middleware('userAkses:manager');
    Route::get('/manager/datapengajuan', function(){return view('manager.lemburpengajuan');})->middleware('userAkses:manager');
    Route::get('/manager/daftarkaryawan', [DaftarKaryawanController::class,'index'])->middleware('userAkses:manager');
    Route::get('/manager/daftarkaryawan/tambah', [DaftarKaryawanController::class,'tambah'])->middleware('userAkses:manager');
    Route::get('/manager/buatkanlembur', function(){return view('manager.buatkanlembur');})->middleware('userAkses:manager');

    //ROUTE ENGINEER
    Route::get('/engineer', [BerandaEngineerController::class, 'index'])->middleware('userAkses:engineer');

    //ROUTE KARYAWAN
    Route::get('/karyawan', [BerandaKaryawanController::class, 'index'])->middleware('userAkses:karyawan');

    //LOGOUT
    Route::get('/logout', [SesiController::class, 'logout']);
});

