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
Route::get('basket/{product}/{number}', [SiteController::class, 'addToBasket'])->where('number', '[0-9]+')->name('basket.add');
Route::get( '@{profile_path}', [SiteController::class, 'showProfile'])->name('profile.show');

Route::group(['middleware' => 'IsAdmin', 'as' => 'admin.'], function () {
    Route::get('admin', [AdminController::class, 'index'])->name('index');
});

Route::group(['middleware' => 'IsLogout'], function () {
    Route::get('register', [AuthController::class, 'registerForm'])->name('register.form');
    Route::post('register', [AuthController::class, 'register'])->name('register');

    Route::get('login', [AuthController::class, 'loginForm'])->name('login.form');
    Route::post('login', [AuthController::class, 'login'])->name('login');

    Route::get('recovery', [AuthController::class, 'recoveryForm'])->name('recovery.form');
    Route::post('recovery', [AuthController::class, 'recovery'])->name('recovery');

    Route::get('password/{token}', [AuthController::class, 'passwordResetForm'])->name('password.reset');
    Route::post('password', [AuthController::class, 'passwordReset'])->name('reset');
});

Route::group(['middleware' => 'IsLogin'], function () {
    Route::get('basket', [SiteController::class, 'basketList'])->name('basket.list');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
