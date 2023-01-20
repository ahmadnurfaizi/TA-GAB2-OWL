<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\Buku_besarController;

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

// Route::get('/', function () {
//     return view('login');
// });

// tampilan
Route::get('home', function(){
    return view('home');
});
Route::get('depan', function(){
    return view('depan');
});

// buku_besar
Route::get('buku_besar', [Buku_besarController::class,'index']);
Route::post('buku_besar/tambah', [Buku_besarController::class,'store']);
Route::get('buku_besar/tambah_kredit', [Buku_besarController::class,'create']);
Route::get('buku_besar/tambah_debit', [Buku_besarController::class,'dcreate']);
Route::get('buku_besar/hapus/{id}', [Buku_besarController::class,'destroy']);
Route::get('buku_besar/edit/{id}', [Buku_besarController::class,'show']);
Route::post('buku_besar/update/{id}', [Buku_besarController::class,'update']);

// angsuran
Route::get('angsuran', [AngsuranController::class,'index']);
Route::get('angsuran/pdf', [AngsuranController::class, 'generatePDF']);
Route::get('angsuran/tambah', [AngsuranController::class, 'create']);
Route::post('angsuran/store', [AngsuranController::class, 'store']);

// konsumen
Route::get('konsumen', [KonsumenController::class,'index']);
Route::get('konsumen/tambah', [KonsumenController::class,'create']);
Route::post('konsumen/create/', [KonsumenController::class,'store']);
Route::get('konsumen/hapus/{id}', [konsumenController::class,'destroy']);

// login
Route::get('/', [AuthController::class, 'login']);
Route::post('login/auth', [AuthController::class, 'auth']);
Route::get('auth/logout', [AuthController::class, 'logout']);
