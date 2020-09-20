<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login'])->name('login');
    Route::post('/logoutt', [App\Http\Controllers\Api\AuthController::class, 'logoutt'])->name('logoutt');
    Route::get('/state', [App\Http\Controllers\Api\StateController::class, 'state'])->name('state');
});
