<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/log in', [LoginController::class,'index']);
Route::post('/login/cek', [LoginController::class,'cek_login']);
Route::post('/log out', [LoginController::class,'logout']);

Route::get('home', [DashboardController::class,'index']);

Route::get('register', [RegisterController::class,'index']);
Route::post('register_create', [UserController::class,'store']);

Route::get('seller', [SellerController::class, 'index']);
Route::get('seller_create', [SellerController::class, 'create']);
Route::post('seller_store', [SellerController::class, 'store']);
Route::get('seller_edit/{id}', [SellerController::class, 'edit']);
Route::put('seller_update', [SellerController::class, 'update']);