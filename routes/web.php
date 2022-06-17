<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DbimbinganController;
use App\Http\Controllers\AbimbinganController;
use App\Http\Controllers\DlitmasController;
use App\Http\Controllers\AlitmasController;
use App\Http\Controllers\PendampinganController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Tby\TbyController;
use App\Http\Controllers\Tby\BpanakController;
use App\Http\Controllers\Tby\BimbingandewasaController;
use App\Http\Controllers\Tby\PendampingananakController;
use App\Http\Controllers\Tby\LitmasanakController;
use App\Http\Controllers\Auth\AuthController;

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


//TUPOKSI 
Route::get('/tby', [TbyController::class, 'index'])->name('tby.index');
Route::get('/tby/bpanak', [BpanakController::class, 'index'])->name('bpanak.index');
Route::get('/tby/bimbingandewasa', [BimbingandewasaController::class, 'index'])->name('bimbingandewasa.index');
Route::get('/tby/pendampingananak', [PendampingananakController::class, 'index'])->name('pendampingananak.index');
Route::get('/tby/litmasanak', [LitmasanakController::class, 'index'])->name('litmasanak.index');
Route::get('/tby/login', [AuthController::class, 'login'])->name('login');
Route::post('/tby/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    //Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    //Route Bimbingan Dewasa
    Route::get('/dbimbingan', [DbimbinganController::class, 'index'])->name('dbimbingan.index');;
    Route::get('/dbimbingan/create', [DbimbinganController::class, 'create'])->name('dbimbingan.create');
    Route::get('/dbimbingan/{id}/edit', [DbimbinganController::class, 'edit'])->name('dbimbingan.edit');
    Route::get('/dbimbingan/{id}/show', [DbimbinganController::class, 'show'])->name('dbimbingan.show');
    Route::patch('/dbimbingan/{id}/update', [DbimbinganController::class, 'update'])->name('dbimbingan.update');
    Route::post('/dbimbingan/store', [DbimbinganController::class, 'store'])->name('dbimbingan.store');
    Route::delete('/dbimbingan/{id}/delete', [DbimbinganController::class, 'destroy'])->name('dbimbingan.destroy');
    Route::get('/dbimbingan/{id}/detail', [DbimbinganController::class, 'detail'])->name('dbimbingan.detail');
    Route::post('/dbimbingan/{id}/adddetail', [DbimbinganController::class, 'adddetail'])->name('dbimbingan.adddetail');

    //Route Bimbingan Anak
    Route::get('/abimbingan', [AbimbinganController::class, 'index'])->name('abimbingan.index');;
    Route::get('/abimbingan/create', [AbimbinganController::class, 'create'])->name('abimbingan.create');
    Route::get('/abimbingan/{id}/edit', [AbimbinganController::class, 'edit'])->name('abimbingan.edit');
    Route::get('/abimbingan/{id}/show', [AbimbinganController::class, 'show'])->name('abimbingan.show');
    Route::patch('/abimbingan/{id}/update', [AbimbinganController::class, 'update'])->name('abimbingan.update');
    Route::post('/abimbingan/store', [AbimbinganController::class, 'store'])->name('abimbingan.store');
    Route::delete('/abimbingan/{id}/delete', [AbimbinganController::class, 'destroy'])->name('abimbingan.destroy');
    Route::get('/abimbingan/{id}/detail', [AbimbinganController::class, 'detail'])->name('abimbingan.detail');
    Route::post('/abimbingan/{id}/adddetail', [AbimbinganController::class, 'adddetail'])->name('abimbingan.adddetail');

    //Route LitMas Dewasa
    Route::get('/dlitmas', [DlitmasController::class, 'index'])->name('dlitmas.index');;
    Route::get('/dlitmas/create', [DlitmasController::class, 'create'])->name('dlitmas.create');
    Route::get('/dlitmas/{id}/edit', [DlitmasController::class, 'edit'])->name('dlitmas.edit');
    Route::get('/dlitmas/{id}/show', [DlitmasController::class, 'show'])->name('dlitmas.show');
    Route::patch('/dlitmas/{id}/update', [DlitmasController::class, 'update'])->name('dlitmas.update');
    Route::post('/dlitmas/store', [DlitmasController::class, 'store'])->name('dlitmas.store');
    Route::delete('/dlitmas/{id}/delete', [DlitmasController::class, 'destroy'])->name('dlitmas.destroy');

    //Route LitMas Anak
    Route::get('/alitmas', [AlitmasController::class, 'index'])->name('alitmas.index');;
    Route::get('/alitmas/create', [AlitmasController::class, 'create'])->name('alitmas.create');
    Route::get('/alitmas/{id}/edit', [AlitmasController::class, 'edit'])->name('alitmas.edit');
    Route::get('/alitmas/{id}/show', [AlitmasController::class, 'show'])->name('alitmas.show');
    Route::patch('/alitmas/{id}/update', [AlitmasController::class, 'update'])->name('alitmas.update');
    Route::post('/alitmas/store', [AlitmasController::class, 'store'])->name('alitmas.store');
    Route::delete('/alitmas/{id}/delete', [AlitmasController::class, 'destroy'])->name('alitmas.destroy');

    //Route Pendampingan Anak
    Route::get('/pendampingan', [PendampinganController::class, 'index'])->name('pendampingan.index');;
    Route::get('/pendampingan/create', [PendampinganController::class, 'create'])->name('pendampingan.create');
    Route::get('/pendampingan/{id}/edit', [PendampinganController::class, 'edit'])->name('pendampingan.edit');
    Route::get('/pendampingan/{id}/show', [PendampinganController::class, 'show'])->name('pendampingan.show');
    Route::patch('/pendampingan/{id}/update', [PendampinganController::class, 'update'])->name('pendampingan.update');
    Route::post('/pendampingan/store', [PendampinganController::class, 'store'])->name('pendampingan.store');
    Route::delete('/pendampingan/{id}/delete', [PendampinganController::class, 'destroy'])->name('pendampingan.destroy');

    //Route List Petugas PK
    Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.index');
    Route::patch('/petugas/update',[PetugasController::class, 'update'])->name('petugas.update');
    Route::post('/petugas/store', [PetugasController::class, 'store'])->name('petugas.store');
    Route::get('/petugas/{id}/delete',[PetugasController::class, 'destroy'])->name('petugas.destroy');
});