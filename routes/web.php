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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');

Route::group(['prefix' => 'admin'], function(){    
    Route::get("/login", [App\Http\Controllers\AdminController::class, 'login'])->middleware('admin.guest')->name("admin.login");
    Route::post("/login", [App\Http\Controllers\AdminController::class, 'login'])->middleware('admin.guest')->name("admin.login.check");
    Route::get("/register", [App\Http\Controllers\AdminController::class, 'register'])->middleware('admin.guest')->name("admin.register");
    Route::post("/register", [App\Http\Controllers\AdminController::class, 'register'])->middleware('admin.guest')->name("admin.register.submit");
    Route::get("/dashboard", [App\Http\Controllers\AdminController::class, 'dashboard'])->middleware('admin.auth')->name("admin.dashboard");
}); 