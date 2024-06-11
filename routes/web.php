<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\absensi;
use App\Http\Controllers\login;

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

/* route absensi*/
route::middleware(['auth'])->group(function(){
    route::get('/dashboard-{id}',[absensi::class,'index'])->name('dasboard');
    route::get('/{id}-create-absensi-Karyawan',[absensi::class,'create'])->name('create');
    route::post('/prosess-absensi-karyawan/{id}',[absensi::class,'store'])->name('store');
    route::get('/{name}/edit-absensi-karyawan-{id}',[absensi::class,'edit'])->name('edit');
    route::PUT('/{name}/update-absensi-karyawan-{id}',[absensi::class,'update'])->name('update');
    route::post('/{name}/prosessing-delete-{id}',[absensi::class,'delete'])->name('delete');
    route::get('{name}/show-absensi-karyawan-{id}',[absensi::class,'show'])->name('show');
    route::get('/cetak-pdf',[absensi::class,'cetak_pdf']);
    route::get('/cetak-pdf{id}',[absensi::class,'pdf'])->name('pdf');
    route::get('dashboard/{name}/daftar-karyawan',[absensi::class,'karyawan'])->name('karyawan');
    route::post('/{name}/prosessing-{id}',[absensi::class,'deleteAkun'])->name('deleteAkun');
    route::get('dashboard-{name}/daftar karyawan/Absen {id}',[absensi::class,'AbsenAkun'])->name('Absen');
});


/* route login*/
route::get('/',[login::class,'login'])->name('login');
route::get('/signin',[login::class,'signin'])->name('signin');
route::PUT('/inputsignin',[login::class,'inputsignin'])->name('inputsignin');
route::post('/login_proses',[login::class,'login_proses'])->name('login_proses');
route::get('/logout',[login::class,'akunlogout'])->name('logout');



