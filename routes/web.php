<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::get('/reviews', 'App\Http\Controllers\ReviewController@index')->name('review.index');
Route::get('/reviews/create', 'App\Http\Controllers\ReviewController@create')->name('review.create');
Route::post('/reviews/save', 'App\Http\Controllers\ReviewController@save')->name('review.save');
Route::get('/reviews/success', 'App\Http\Controllers\ReviewController@success')->name('review.success');
Route::get('/reviews/nonexistent', 'App\Http\Controllers\ReviewController@nonexistent')->name('review.nonexistent');
Route::get('/reviews/{id}', 'App\Http\Controllers\ReviewController@show')->name('review.show');
Route::delete('/reviews/{id}', 'App\Http\Controllers\ReviewController@destroy')->name('review.destroy');

Route::get('/categories', 'App\Http\Controllers\CategoryController@index')->name('category.index');
Route::get('/categories/create', 'App\Http\Controllers\CategoryController@create')->name('category.create');
Route::post('/categories/save', 'App\Http\Controllers\CategoryController@save')->name('category.save');
Route::get('/categories/success', 'App\Http\Controllers\CategoryController@success')->name('category.success');
// Route::get('/categories/nonexistent', 'App\Http\Controllers\CategoryController@nonexistent')->name('category.nonexistent');
Route::get('/categories/{id}', 'App\Http\Controllers\CategoryController@show')->name('category.show');
Route::delete('/categories/{id}', 'App\Http\Controllers\CategoryController@destroy')->name('category.destroy');

Route::get('/custom-users', 'App\Http\Controllers\CustomUserController@index')->name('custom-users.index');
Route::get('/custom-users/create', 'App\Http\Controllers\CustomUserController@create')->name('custom-users.create');
Route::post('/custom-users/save', 'App\Http\Controllers\CustomUserController@save')->name('custom-users.save');
// Route::get('/custom-users/success', 'App\Http\Controllers\CustomUserController@success')->name('custom-users.success');
// Route::get('/custom-users/nonexistent', 'App\Http\Controllers\CustomUserController@nonexistent')->name('custom-users.nonexistent');
Route::get('/custom-users/{id}', 'App\Http\Controllers\CustomUserController@show')->name('custom-users.show');
Route::delete('/custom-users/{id}', 'App\Http\Controllers\CustomUserController@destroy')->name('custom-users.destroy');
