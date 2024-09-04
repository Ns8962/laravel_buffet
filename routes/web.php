<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admincontroller;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/reserve_table',[Admincontroller::class,'get_table'])->name('reserve');
Route::post('/add_table', [Admincontroller::class,'add_table'])->name('add_table');
Route::get('/user', [Admincontroller::class,'show_menu'])->name('user');
Route::post('/select_type', [Admincontroller::class,'select_type'])->name('select_type');
Route::post('/add_menu', [Admincontroller::class,'add_menu'])->name('add_menu');
Route::post('/preorder', [Admincontroller::class,'preorder'])->name('preorder');
Route::get('/create_table',[Admincontroller::class,'create_table'])->name('create_table');
Route::post('/send_api_create',[Admincontroller::class, 'send_api_create'])->name('send_api_create');
Route::get('/report_graft',[Admincontroller::class, 'report_graft'])->name('report_graft');
Route::get('/report_qrcode/{tb_id}',[Admincontroller::class, 'report_qrcode'])->name('report_qrcode');

Route::get('/main', function () {
    return view('main');
});