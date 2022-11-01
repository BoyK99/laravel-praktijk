<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PlaylistCommentController;

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
Route::get('/home', [PlaylistController::class, 'index'])->name('home');

//-----------------------------------------------------------------

// Resource -playlist- call
Route::resource('/playlist', PlaylistController::class);
// Search
Route::post('playlist/search', [PlaylistController::class, 'search'])->name('playlist.search');
// Comment delete
Route::resource('playlist/{playlist:id}/comments', PlaylistCommentController::class)->only(['store', 'destroy']);

// Only when logged in (no admin/verified)
Route::middleware(['auth'])->group(function () {
    // Edit profile
    Route::resource('/user', UserController::class)->only(['update', 'edit']);
});

// When verified account
Route::middleware(['auth', 'isVerified'])->group(function () {
    // Comment add
    Route::post('/playlist/{playlist:id}/comments', [PlaylistCommentController::class, 'store'])->name('comments.store');
});

// When admin role
Route::middleware(['auth', 'isAdmin'])->group(function () {
    // all playlists when admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.overview');;
    Route::get('playlist/{playlist:id}/toggle-visibility', [PlaylistController::class, 'toggleVisibility'])->name('playlist.toggle-visibility');
});



Auth::routes();

