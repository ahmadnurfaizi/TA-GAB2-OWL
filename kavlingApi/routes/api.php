<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;


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

// user
Route::post('users/store', [UsersController::class,'store']);
Route::get('users', [UsersController::class,'index']);
Route::post('users/update/{id}', [UsersController::class,'update']);
Route::get('users/destroy/{id}', [UsersController::class,'destroy']);
Route::get('users/show/{id}', [UsersController::class,'show']);

Route::post('users/login', [UsersController::class,'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
