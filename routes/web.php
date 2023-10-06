<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
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

Route::match(['GET', 'POST'], '/', [HomeController::class, 'index']);
Route::match(['GET', 'POST'], '/tires', [CatalogController::class, 'tires']);
Route::match(['GET', 'POST'], '/rims', [CatalogController::class, 'tires']);

Route::group(['middleware' => 'auth', 'prefix' => 'user'],function () {
    Route::match(['GET', 'POST'], '/info', [UserController::class, 'info'])->name('info');
    Route::match(['GET', 'POST'], '/{slug}', [UserController::class, 'profile'])->name('profile');
});

#region registration
Route::match(['GET', 'POST'], '/login', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::match(['GET', 'POST'], '/register', [UserController::class, 'register'])->middleware('guest')->name('register');

Route::group(['prefix' => 'admin'], function () {Voyager::routes();});
Route::match(['GET', 'POST'], '/{slug}', [PagesController::class, 'page']);



