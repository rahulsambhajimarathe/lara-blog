<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use GuzzleHttp\Middleware;

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


Route::get('/', [HomeController::class, "homeController"]);


Route::get('/login', [AuthController::class, "loginController"])->name("login");
Route::post("/login", [AuthController::class, "user_loginController"]);
Route::get('/register', [AuthController::class, "registerController"])->name("register");
Route::post('/register', [AuthController::class, "userregisterController"]);

Route::get('/verify/{token}', [AuthController::class, "verifyregisterController"]);

Route::get('/forget-password', [AuthController::class, "forgetController"])->name('forget-password');
Route::post('/forget-password', [AuthController::class, "user_forgetController"]);


Route::get('/reset/{token}', [AuthController::class, "user_reset"]);
Route::post('/reset/{token}', [AuthController::class, "user_reset_save"]);

Route::get('/logout', [AuthController::class, "logout"])->name('logout');



Route::group(['middleware' => 'adminuser'], function() {
    Route::get('panel/dashboard', [DashboardController::class, "adminpanel"]);
});
