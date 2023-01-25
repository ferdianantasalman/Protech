<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('admin/order/index');
});

// Login
Route::get('/login', [SessionController::class, 'login']);
Route::post('/login', [SessionController::class, 'login_action']);
// Logout
Route::get('/logout', [SessionController::class, 'logout']);
// Register
Route::get('/register', [SessionController::class, 'register']);
Route::post('/register', [SessionController::class, 'register_action']);

// Admin
Route::get('/dev', [AdminController::class, 'dashboard']);
Route::resource('dev/produk', ProdukController::class);
Route::resource('dev/order', OrderController::class);
Route::resource('dev/user', UserController::class);