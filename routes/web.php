<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::get('/errors/nonexistent', 'App\Http\Controllers\ErrorController@nonexistent')->name('error.nonexistent');

Route::get('/reviews', 'App\Http\Controllers\ReviewController@index')->name('review.index');
Route::get('/reviews/create', 'App\Http\Controllers\ReviewController@create')->name('review.create');
Route::post('/reviews/save', 'App\Http\Controllers\ReviewController@save')->name('review.save');
Route::get('/reviews/{id}', 'App\Http\Controllers\ReviewController@show')->name('review.show');
Route::delete('/reviews/{id}', 'App\Http\Controllers\ReviewController@destroy')->name('review.destroy');

Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('category.index');
Route::get('/categories/create', 'App\Http\Controllers\CategoryController@create')->name('category.create');
Route::post('/categories/save', 'App\Http\Controllers\CategoryController@save')->name('category.save');
Route::get('/categories/{id}', 'App\Http\Controllers\CategoryController@show')->name('category.show');
Route::delete('/categories/{id}', 'App\Http\Controllers\CategoryController@destroy')->name('category.destroy');

Route::get('/custom-users', 'App\Http\Controllers\CustomUserController@index')->name('custom-user.index');
Route::get('/custom-users/create', 'App\Http\Controllers\CustomUserController@create')->name('custom-user.create');
Route::post('/custom-users/save', 'App\Http\Controllers\CustomUserController@save')->name('custom-user.save');
Route::get('/custom-users/{id}', 'App\Http\Controllers\CustomUserController@show')->name('custom-user.show');
Route::delete('/custom-users/{id}', 'App\Http\Controllers\CustomUserController@destroy')->name('custom-user.destroy');

Route::get('/games', 'App\Http\Controllers\GameController@index')->name('game.index');
Route::get('/games/create', 'App\Http\Controllers\GameController@create')->name('game.create');
Route::post('/games/save', 'App\Http\Controllers\GameController@save')->name('game.save');
Route::get('/games/shopping-cart', 'App\Http\Controllers\GameController@shoppingCart')->name('game.shoppingCart');
Route::post('/games/add-to-cart/{id}', 'App\Http\Controllers\GameController@addToShoppingCart')->name('game.addToShoppingCart');
Route::get('/games/{id}', 'App\Http\Controllers\GameController@show')->name('game.show');
Route::delete('/games/{id}', 'App\Http\Controllers\GameController@destroy')->name('game.destroy');
