<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataPeminjamanController;

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

Route::get('/',function(){
    return view('pick');
});

Route::get('/home',function(){
    return view('home');
});

Route::post('/data',[DataPeminjamanController::class,'insert']);
Route::get('/data',[DataPeminjamanController::class,'getdata']);
Route::get('/data/viewuser',[DataPeminjamanController::class,'getdatauseronly']);
Route::get('/validate',[DataPeminjamanController::class,'validation']);
Route::get('/history',[DataPeminjamanController::class,'getdatahistory']);
Route::get('/search',[DataPeminjamanController::class,'search']);
Route::get('/data/update/{nama}/{barang}/{tanggal}/{waktuawal}/{waktuakhir}',[DataPeminjamanController::class,'showdataupdate']);
// Route::get('/update/{nama}/{tanggal}/{waktuawal}/{waktuakhir}',[DataPeminjamanController::class,'update']);
Route::get('/update/{id}',[DataPeminjamanController::class,'update']);

Route::get('/webhook',[DataPeminjamanController::class,'webhook']);


