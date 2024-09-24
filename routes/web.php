<?php

// Esteban, Jonathan

use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

// ========================== USER =================================
// Games (Accessible by anyone)
Route::get('/games', 'App\Http\Controllers\GameController@index')->name('game.index');
Route::get('/games/{id}', 'App\Http\Controllers\GameController@show')->name('game.show');

// Routes for authenticated users only
Route::middleware(['auth'])->group(function () {
    // Shopping Cart
    Route::get('/games/shopping-cart', 'App\Http\Controllers\GameController@shoppingCart')->name('game.shoppingCart');
    Route::post('/games/add-to-cart/{id}', 'App\Http\Controllers\GameController@addToShoppingCart')->name('game.addToShoppingCart');
});

// ========================== ADMIN ================================
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    // Games
    Route::get('/admin/games', 'App\Http\Controllers\AdminGameController@index')->name('admin-game.index');
    Route::get('/admin/games/create', 'App\Http\Controllers\AdminGameController@create')->name('admin-game.create');
    Route::post('/admin/games/save', 'App\Http\Controllers\AdminGameController@save')->name('admin-game.save');
    Route::get('/admin/games/{id}', 'App\Http\Controllers\AdminGameController@show')->name('admin-game.show');
    Route::delete('/admin/games/{id}', 'App\Http\Controllers\AdminGameController@destroy')->name('admin-game.destroy');

    // Reviews
    Route::get('/admin/reviews', 'App\Http\Controllers\AdminReviewController@index')->name('admin-review.index');
    Route::get('/admin/reviews/create', 'App\Http\Controllers\AdminReviewController@create')->name('admin-review.create');
    Route::post('/admin/reviews/save', 'App\Http\Controllers\AdminReviewController@save')->name('admin-review.save');
    Route::get('/admin/reviews/{id}', 'App\Http\Controllers\AdminReviewController@show')->name('admin-review.show');
    Route::delete('/admin/reviews/{id}', 'App\Http\Controllers\AdminReviewController@destroy')->name('admin-review.destroy');

    // Categories
    Route::get('/admin/categories', 'App\Http\Controllers\AdminCategoryController@index')->name('admin-category.index');
    Route::get('/admin/categories/create', 'App\Http\Controllers\AdminCategoryController@create')->name('admin-category.create');
    Route::post('/admin/categories/save', 'App\Http\Controllers\AdminCategoryController@save')->name('admin-category.save');
    Route::get('/admin/categories/{id}', 'App\Http\Controllers\AdminCategoryController@show')->name('admin-category.show');
    Route::delete('/admin/categories/{id}', 'App\Http\Controllers\AdminCategoryController@destroy')->name('admin-category.destroy');

    // Custom Users
    Route::get('/admin/custom-users', 'App\Http\Controllers\AdminCustomUserController@index')->name('admin-custom-user.index');
    Route::get('/admin/custom-users/create', 'App\Http\Controllers\AdminCustomUserController@create')->name('admin-custom-user.create');
    Route::post('/admin/custom-users/save', 'App\Http\Controllers\AdminCustomUserController@save')->name('admin-custom-user.save');
    Route::get('/admin/custom-users/{id}', 'App\Http\Controllers\AdminCustomUserController@show')->name('admin-custom-user.show');
    Route::get('/admin/custom-users/{id}/edit', 'App\Http\Controllers\AdminCustomUserController@edit')->name('admin-custom-user.edit');
    Route::put('/admin/custom-users/{id}', 'App\Http\Controllers\AdminCustomUserController@update')->name('admin-custom-user.update');
    Route::delete('admin/custom-users/{id}', 'App\Http\Controllers\AdminCustomUserController@destroy')->name('admin-custom-user.destroy');
});

// ========================== ERRORS =================================
Route::get('/errors/nonexistent', 'App\Http\Controllers\ErrorController@nonexistent')->name('error.nonexistent');
Auth::routes();
