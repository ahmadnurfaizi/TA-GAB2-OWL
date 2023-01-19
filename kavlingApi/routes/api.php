<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\Buku_besarController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// buku_besar
Route::post('buku_besar/store', [Buku_besarController::class,'store']);
Route::get('buku_besar', [Buku_besarController::class,'index']);
Route::post('buku_besar/update/{id}', [Buku_besarController::class,'update']);
Route::get('buku_besar/destroy/{id}', [Buku_besarController::class,'destroy']);
Route::get('buku_besar/show/{id}', [Buku_besarController::class,'show']);

// angsuran
Route::post('angsuran/store', [AngsuranController::class,'store']);
Route::get('angsuran', [AngsuranController::class,'index']);
Route::get('laporan', [AngsuranController::class,'laporan']);
Route::post('angsuran/update/{id}', [AngsuranController::class,'update']);
Route::get('angsuran/destroy/{id}', [AngsuranController::class,'destroy']);
Route::get('angsuran/show/{id}', [AngsuranController::class,'show']);

// konsumen
Route::post('konsumen/store', [KonsumenController::class,'store']);
Route::get('konsumen', [KonsumenController::class,'index']);
Route::post('konsumen/update/{id}', [KonsumenController::class,'update']);
Route::get('konsumen/destroy/{id}', [KonsumenController::class,'destroy']);
Route::get('konsumen/show/{id}', [KonsumenController::class,'show']);

// user
Route::post('users/store', [UsersController::class,'store']);
Route::get('users', [UsersController::class,'index']);
Route::post('users/update/{id}', [UsersController::class,'update']);
Route::get('users/destroy/{id}', [UsersController::class,'destroy']);
Route::get('users/show/{id}', [UsersController::class,'show']);

// login
Route::post('users/login', [UsersController::class,'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
