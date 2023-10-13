<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ExcellController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;

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
Route::post('/test', [\App\Services\UploadService::class, 'generate']);


Route::match(['GET', 'POST'], '/', [HomeController::class, 'index']);
Route::match(['GET', 'POST'], '/tires', [CatalogController::class, 'tires']);
Route::match(['GET', 'POST'], '/rims', [CatalogController::class, 'tires']);

#region profile
Route::group(['middleware' => 'auth', 'prefix' => 'user'],function () {
    Route::match(['GET', 'POST'], '/info', [UserController::class, 'info'])->name('info');
    Route::match(['GET', 'POST'], '/{slug}', [UserController::class, 'profile'])->name('profile');
});

#region registration
Route::match(['GET', 'POST'], '/login', [UserController::class, 'login'])->middleware('guest')->name('login');
Route::match(['GET', 'POST'], '/register', [UserController::class, 'register'])->middleware('guest')->name('register');
#region registration


#region admin
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
    Route::get('/excell', [ExcellController::class, 'import'])->middleware('admin');
    Route::post('/excell-upload', [ExcellController::class, 'upload'])->middleware('admin');
});


Route::match(['GET', 'POST'], '/blog/{id}', [PagesController::class, 'blog']);
Route::match(['GET', 'POST'], '/{slug}', [PagesController::class, 'page']);



