<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BarangController;

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

//Login
Route::get('/log in', [LoginController::class,'index']);
Route::post('/login/cek', [LoginController::class,'cek_login']);
Route::get('/log out', [LoginController::class,'logout']);

//dashboard
Route::get('home', [DashboardController::class,'index']);

//Register
Route::get('register', [RegisterController::class,'index']);
Route::post('register_create', [UserController::class,'store']);

//CRUD Seller
Route::get('seller', [SellerController::class, 'index']);
Route::get('seller_create', [SellerController::class, 'create']);
Route::post('seller_store', [SellerController::class, 'store']);
Route::get('seller_edit/{id}', [SellerController::class, 'edit']);
Route::put('seller_update/{id}', [SellerController::class, 'update']);
Route::delete('seller_destroy/{id}', [SellerController::class, 'destroy']);

//CRUD Barang
Route::get('barang', [BarangController::class, 'index']);
Route::get('barang_create', [BarangController::class, 'create']);
Route::post('barang_store', [BarangController::class, 'store']);
Route::get('barang_edit/{id}', [BarangController::class, 'edit']);
Route::put('barang_update/{id}', [BarangController::class, 'update']);
Route::delete('barang_destroy/{id}', [BarangController::class, 'destroy']);