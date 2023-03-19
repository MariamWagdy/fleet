<?php

use App\Models\Reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('profile', array('before' => 'csrf', function()
{
}));
Route::get('reservations', 'ArticleController@index');
//Route::get('reservations/{id}', 'ArticleController@show');
Route::post('reservations', 'ArticleController@store');
//Route::put('reservations/{id}', 'ArticleController@update');
