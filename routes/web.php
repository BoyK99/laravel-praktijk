<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\AdminController;

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
// / -> index function
Route::get('/', [PlaylistController::class, 'index']);
// index -> index
Route::get('/index', [PlaylistController::class, 'index']);
// home -> index
Route::get('/home', [PlaylistController::class, 'index']);
// Resource -playlist- call
Route::resource('/playlist', PlaylistController::class);



// Overview page for admin (all playlists)
//Route::resource( '/playlist', OverviewController::class);

Route::middleware(['auth'])->group(function () {
    // all playlists when admin
    Route::get('/admin', [AdminController::class, 'index']);
});



Auth::routes();







// Goes to login page
//Route::get('/home', [HomeController::class, 'index']);

//Route::get('/', function () {
//    return view('index');
//});

//Route::get('/data', [ProductController::class, 'index'])->name('data');
