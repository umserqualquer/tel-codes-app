<?php

use App\Http\Controllers\CodeController;
use App\Http\Controllers\ConnectionHistoryController;
use App\Http\Controllers\PlanController;
use Illuminate\Support\Facades\Auth;
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



Auth::routes();



Route::middleware(['auth'])->group(function() {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('code', CodeController::class);
    Route::resource('connection_history', ConnectionHistoryController::class);
    Route::resource('plan', PlanController::class);

});
