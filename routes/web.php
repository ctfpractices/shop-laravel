<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SiteController;
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

Route::get('/', [SiteController::class, 'index'])->name('index');

Route::group(['middleware' => 'IsAdmin', 'as' => 'admin.'], function () {
    Route::get('admin', [AdminController::class, 'index'])->name('index');
});

Route::group(['middleware' => 'IsLogout'], function () {
    Route::get('register', [AuthController::class, 'registerForm'])->name('register.form');
    Route::post('register', [AuthController::class, 'register'])->name('register');

    Route::get('login', [AuthController::class, 'loginForm'])->name('login.form');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'IsLogin'], function () {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
