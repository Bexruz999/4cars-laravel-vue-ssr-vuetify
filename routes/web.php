<?php

use App\Http\Controllers\CatalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PagesController;
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
Route::match(['GET', 'POST'], '/delivery', [PagesController::class, 'delivery']);
Route::match(['GET', 'POST'], '/news', [PagesController::class, 'news']);
Route::match(['GET', 'POST'], '/contacts', [PagesController::class, 'contacts']);
Route::match(['GET', 'POST'], '/shinomontazh', [PagesController::class, 'shinomontazh']);

Route::group(['prefix' => 'admin'], function () {Voyager::routes();});
