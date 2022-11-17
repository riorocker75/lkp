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
use App\Http\Controllers\KapusCtrl;
use App\Http\Controllers\LoginCtrl;








Route::get('/', [AdminCtrl::class,'index']);

// Login
Route::get('/login', [LoginCtrl::class,'index']);
Route::post('/login/cek', [LoginCtrl::class,'cek_login']);

Route::get('/logout', [LoginCtrl::class,'logout']);



// data siswa
Route::get('/dashboard/siswa/data', [AdminCtrl::class,'siswa']);
Route::get('/dashboard/siswa/add', [AdminCtrl::class,'siswa_add']);
Route::post('/dashboard/siswa/act', [AdminCtrl::class,'siswa_act']);

Route::get('/dashboard/siswa/edit/{id}', [AdminCtrl::class,'siswa_edit']);
Route::post('/dashboard/siswa/update', [AdminCtrl::class,'siswa_update']);
Route::get('/dashboard/siswa/delete/{id}', [AdminCtrl::class,'siswa_delete']);

// data nilai
Route::get('/dashboard/nilai/data', [AdminCtrl::class,'nilai']);
Route::get('/dashboard/nilai/add', [AdminCtrl::class,'nilai_add']);
Route::post('/dashboard/nilai/act', [AdminCtrl::class,'nilai_act']);

Route::get('/dashboard/nilai/edit/{id}', [AdminCtrl::class,'nilai_edit']);
Route::post('/dashboard/nilai/update', [AdminCtrl::class,'nilai_update']);
Route::get('/dashboard/nilai/delete/{id}', [AdminCtrl::class,'nilai_delete']);

// data ambil

Route::get('/dashboard/ambil/data', [AdminCtrl::class,'ambil']);
Route::get('/dashboard/ambil/add', [AdminCtrl::class,'ambil_add']);
Route::post('/dashboard/ambil/act', [AdminCtrl::class,'ambil_act']);

Route::get('/dashboard/ambil/edit/{id}', [AdminCtrl::class,'ambil_edit']);
Route::post('/dashboard/ambil/update', [AdminCtrl::class,'ambil_update']);
Route::get('/dashboard/ambil/delete/{id}', [AdminCtrl::class,'ambil_delete']);

// bagian kepsek
Route::get('/dashboard/kepsek', [KapusCtrl::class,'index']);
Route::get('/dashboard/kepsek/siswa/data', [KapusCtrl::class,'siswa']);
Route::get('/dashboard/kepsek/nilai/data', [KapusCtrl::class,'nilai']);
Route::get('/dashboard/kepsek/nilai/cetak', [KapusCtrl::class,'cetak_nilai']);


Route::get('/dashboard/kepsek/nilai/cetak/daftar_nilai/{id}', [KapusCtrl::class,'cetak_daftar_nilai']);
Route::get('/dashboard/kepsek/nilai/cetak/ijazah/{id}', [KapusCtrl::class,'cetak_ijazah']);



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


