<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
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


Route::get('/auth/callback', [AuthController::class, 'authenticate']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

Route::get('/{username}', [MainController::class, 'getProfile']);
Route::post('/{user}/ask', [MainController::class, 'postQuestion'])->name('ask-question');
Route::post('/{user}/answer/{question}', [MainController::class, 'postAnswerQuestion'])->name('answer-question');
