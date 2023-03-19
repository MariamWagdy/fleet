<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return Redirect('login');
});
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('loginUser');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => \App\Http\Middleware\Authenticate::class], function () {
    Route::get('/home', function () {
        return view('home');
    });
    Route::get('dashboard', [App\Http\Controllers\ReservationsController::class, 'dashboard'])->name('dashboard');
    Route::get('getCrossoverCities', [App\Http\Controllers\ReservationsController::class, 'getCrossoverCities'])->name('crossoverCities');
});


