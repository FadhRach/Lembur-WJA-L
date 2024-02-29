<?php

use App\Http\Controllers\EngineerController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ManagerController;
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
    Route::get('/manager', [ManagerController::class, 'index'])->middleware('userAkses:manager');

    //ROUTE ENGINEER
    Route::get('/engineer', [EngineerController::class, 'index'])->middleware('userAkses:engineer');

    //ROUTE KARYAWAN
    Route::get('/karyawan', [KaryawanController::class, 'index'])->middleware('userAkses:karyawan');

    //LOGOUT
    Route::get('/logout', [SesiController::class, 'logout']);
});

