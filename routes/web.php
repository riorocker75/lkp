<?php

use Illuminate\Support\Facades\Route;

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

// controller admin route
use App\Http\Controllers\AdminCtrl;
use App\Http\Controllers\LoginCtrl;
use App\Http\Controllers\FrontCtrl;
use App\Http\Controllers\UserCtrl;







// bagian front
Route::get('/', [FrontCtrl::class,'index']);

Route::post('/daftar/act', [FrontCtrl::class,'daftar_act']);





// Login
Route::get('/login', [LoginCtrl::class,'index']);
Route::post('/login/cek', [LoginCtrl::class,'cek_login']);

Route::get('/logout', [LoginCtrl::class,'logout']);


Route::get('/dashboard', [AdminCtrl::class,'index']);


//data pelatihan
Route::get('/dashboard/pelatihan/data', [AdminCtrl::class,'pelatihan']);
Route::post('/dashboard/pelatihan/act', [AdminCtrl::class,'pelatihan_act']);
Route::get('/dashboard/pelatihan/edit/{id}', [AdminCtrl::class,'pelatihan_edit']);
Route::post('/dashboard/pelatihan/update', [AdminCtrl::class,'pelatihan_update']);


Route::get('/dashboard/pelatihan/delete/{id}', [AdminCtrl::class,'pelatihan_delete']);



// data jadwal
Route::get('/dashboard/jadwal/data', [AdminCtrl::class,'jadwal']);
Route::post('/dashboard/jadwal/act', [AdminCtrl::class,'jadwal_act']);
Route::get('/dashboard/jadwal/edit/{id}', [AdminCtrl::class,'jadwal_edit']);
Route::post('/dashboard/jadwal/update', [AdminCtrl::class,'jadwal_update']);
Route::get('/dashboard/jadwal/delete/{id}', [AdminCtrl::class,'jadwal_delete']);



// data daftar
Route::get('/dashboard/daftar/data', [AdminCtrl::class,'daftar']);
Route::post('/dashboard/daftar/act', [AdminCtrl::class,'daftar_act']);
Route::get('/dashboard/daftar/edit/{id}', [AdminCtrl::class,'daftar_edit']);
Route::post('/dashboard/daftar/update', [AdminCtrl::class,'daftar_update']);
Route::get('/dashboard/daftar/delete/{id}', [AdminCtrl::class,'daftar_delete']);




Route::get('/dashboard/kepsek/nilai/cetak/daftar_nilai/{id}', [KapusCtrl::class,'cetak_daftar_nilai']);
Route::get('/dashboard/kepsek/nilai/cetak/ijazah/{id}', [KapusCtrl::class,'cetak_ijazah']);


// bagian user

Route::get('/user', [UserCtrl::class,'index']);



Route::get('/user/daftar/data', [UserCtrl::class,'daftar']);
Route::post('/user/daftar/act', [UserCtrl::class,'daftar_act']);
Route::get('/user/daftar/edit/{id}', [UserCtrl::class,'daftar_edit']);
Route::post('/user/daftar/update', [UserCtrl::class,'daftar_update']);

Route::post('/user/bayar/act', [UserCtrl::class,'bayar_act']);





//

// role 
Route::get('/dashboard/role/data', [AdminCtrl::class,'role']);
Route::post('/dashboard/role/act', [AdminCtrl::class,'role_act']);

Route::get('/dashboard/role/edit/{id}', [AdminCtrl::class,'role_edit']);
Route::post('/dashboard/role/update', [AdminCtrl::class,'role_update']);
Route::get('/dashboard/role/delete/{id}', [AdminCtrl::class,'role_delete']);

// profile ubah password
Route::get('/dashboard/pengaturan/data', [AdminCtrl::class,'pengaturan']);
Route::post('/dashboard/pengaturan/update', [AdminCtrl::class,'pengaturan_update']);


Route::get('/kepsek/pengaturan/data', [KapusCtrl::class,'pengaturan']);
Route::post('/kepsek/pengaturan/update', [KapusCtrl::class,'pengaturan_update']);


