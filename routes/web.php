<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChildController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DropdownController;
use App\Http\Controllers\Auth\LoginController;


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

Route::get('/',[LoginController::class, 'showLoginForm']);




Auth::routes();


 
//Route::resource('/child', ChildController::class)->middleware('auth');
//
//Route::resource('/state', StateController::class)->middleware('auth');
//
//Route::resource('/district', DistrictController::class)->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
Route::resources([
    'child' => ChildController::class,
    'state' => StateController::class,
    'district' => DistrictController::class,
]);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

Route::get('get-District-list',[DropdownController::class, 'getDistrictList']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

});







