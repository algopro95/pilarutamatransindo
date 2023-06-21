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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('categories', App\Http\Controllers\API\CategoryAPIController::class);


Route::resource('playlists', App\Http\Controllers\API\PlaylistAPIController::class);


Route::resource('videos', App\Http\Controllers\API\VideoAPIController::class);


Route::resource('subscriptions', App\Http\Controllers\API\SubscriptionAPIController::class);


Route::resource('orders', App\Http\Controllers\API\OrderAPIController::class);


Route::resource('playlist_users', App\Http\Controllers\API\PlaylistUserAPIController::class);


Route::resource('data', App\Http\Controllers\API\dataAPIController::class);
