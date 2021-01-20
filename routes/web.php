<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlbumController;

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

Route::get('/', [AlbumController::class, 'viewWelcome']);
Route::get('/list', [AlbumController::class, 'viewListAlbum']);
Route::get('/new', [AlbumController::class, 'viewNewAlbum']);

Route::get('/test', function() {
    dd(\App\Models\Album::find(1)->toArray());
});


Route::post('/new', [AlbumController::class, 'postAlbum'])->name('new-album');

