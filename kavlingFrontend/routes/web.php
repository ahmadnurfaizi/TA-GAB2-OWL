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

// Route::get('/', function () {
//     return view('login');
// });

// login
Route::get('/', [AuthController::class, 'login']);
Route::post('login/auth', [AuthController::class, 'auth']);
Route::get('auth/logout', [AuthController::class, 'logout']);
