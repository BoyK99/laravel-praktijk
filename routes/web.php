<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaylistController;

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
//
//Route::get('/', function () {
//    return view('index');
//});

//Route::get('/data', [ProductController::class, 'index'])->name('data');


Auth::routes();

Route::resource('/', PlaylistController::class);

Route::get('/create', [PlaylistController::class, 'create']);

Route::get('/home', [HomeController::class, 'index']);


