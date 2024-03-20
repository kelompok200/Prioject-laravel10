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
    route::get('/dashboard',[absensi::class,'index'])->name('dasboard');
    route::get('/create',[absensi::class,'create'])->name('create');
    route::post('/store',[absensi::class,'store'])->name('store');
    route::get('/edit/{id}',[absensi::class,'edit'])->name('edit');
    route::PUT('/update/{id}',[absensi::class,'update'])->name('update');
    route::post('/delete/{id}',[absensi::class,'delete'])->name('delete');
});

/* route login*/
route::get('/',[login::class,'login'])->name('login');
route::get('/signin',[login::class,'signin'])->name('signin');
route::PUT('/inputsignin',[login::class,'inputsignin'])->name('inputsignin');
route::post('/login_proses',[login::class,'login_proses'])->name('login_proses');
route::get('/logout',[login::class,'logout'])->name('logout');
