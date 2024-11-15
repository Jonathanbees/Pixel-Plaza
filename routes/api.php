<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/games', 'App\Http\Controllers\Api\GameApiController@index')->name('api.game.index');
Route::get('/games/{id}', 'App\Http\Controllers\Api\GameApiController@show')->name('api.game.show'); 