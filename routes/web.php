<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\LanguageMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Ruta para cambiar el idioma
Route::get('lang/{locale}', 'App\Http\Controllers\LocaleController@setLocale')->name('locale.setLocale');

// Envolver todas las rutas en el middleware de idioma
Route::middleware([LanguageMiddleware::class])->group(function () {
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

    // ========================== GUEST USER =================================
    // Games (Accessible by anyone)
    Route::get('/games', 'App\Http\Controllers\GameController@index')->name('game.index');
    Route::get('/games/search', 'App\Http\Controllers\GameController@search')->name('game.search');
    Route::get('/games/most-purchased', 'App\Http\Controllers\GameController@mostPurchased')->name('game.mostPurchased');

    // Categories
    Route::get('/categories/top-categories', 'App\Http\Controllers\CategoryController@topCategories')->name('category.topCategories');

    // Company
    Route::get('/companies/top-selling', 'App\Http\Controllers\CompanyController@topSellingGames')->name('company.topSellingGames');

    // Partners store
    Route::get('partners/index', 'App\Http\Controllers\PartnersStoreController@index')->name('partner.index');
});

// ========================== AUTH USER =================================
Route::middleware(['auth',LanguageMiddleware::class])->group(function () {
    // Games
    Route::get('/games/shopping-cart', 'App\Http\Controllers\GameController@shoppingCart')->name('game.shoppingCart');
    Route::post('/games/add-to-cart/{id}', 'App\Http\Controllers\GameController@addToShoppingCart')->name('game.addToShoppingCart');

    // Reviews
    Route::post('/reviews/{id}/add-review', 'App\Http\Controllers\ReviewController@addReview')->name('review.addReview');

    // Orders
    Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index');
    Route::post('/orders/create', 'App\Http\Controllers\OrderController@create')->name('order.create');
    Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show');
});
Route::middleware([LanguageMiddleware::class])->group(function () {
    Route::get('/games/{id}', 'App\Http\Controllers\GameController@show')->name('game.show'); //GAMES NEEDS TO BE HERE
});
// ========================== ADMIN ================================
Route::middleware(['auth', AdminMiddleware::class, LanguageMiddleware::class])->group(function () {
    // Games (User)
    Route::post('/games/{id}/generate-balance', 'App\Http\Controllers\GameController@generateBalance')->name('game.generateBalance');

    // Games (Admin)
    Route::get('/admin/games', 'App\Http\Controllers\AdminGameController@index')->name('admin-game.index');
    Route::get('/admin/games/create', 'App\Http\Controllers\AdminGameController@create')->name('admin-game.create');
    Route::post('/admin/games/save', 'App\Http\Controllers\AdminGameController@save')->name('admin-game.save');
    Route::get('/admin/games/{id}', 'App\Http\Controllers\AdminGameController@show')->name('admin-game.show');
    Route::get('/admin/games/{id}/edit', 'App\Http\Controllers\AdminGameController@edit')->name('admin-game.edit');
    Route::put('/admin/games/{id}', 'App\Http\Controllers\AdminGameController@update')->name('admin-game.update');
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