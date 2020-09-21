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
    Route::post('/loginn', [App\Http\Controllers\Api\AuthController::class, 'loginn'])->name('loginn');
    Route::post('/logoutt', [App\Http\Controllers\Api\AuthController::class, 'logout'])->name('logoutt');
    Route::get('/state', [App\Http\Controllers\Api\StateController::class, 'index'])->name('state');
    Route::post('/add-state', [App\Http\Controllers\Api\StateController::class, 'store'])->name('add-state');
    Route::get('/district', [App\Http\Controllers\Api\DistrictController::class, 'index'])->name('district');
    Route::post('/add-district', [App\Http\Controllers\Api\DistrictController::class, 'store'])->name('add-district');
    Route::get('/child', [App\Http\Controllers\Api\ChildController::class, 'index'])->name('child');
    Route::post('/add-child', [App\Http\Controllers\Api\ChildController::class, 'store'])->name('add-child');

});
