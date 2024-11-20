<?php

// Esteban, Jonathan, Samuel

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\LanguageMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ========================== LANGUAGE =================================
Route::get('lang/{locale}', 'App\Http\Controllers\LocaleController@setLocale')->name('locale.setLocale');

// ========================== GUEST USER =================================
Route::middleware([LanguageMiddleware::class])->group(function () {
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

    // Games (Accessible by anyone)
    Route::get('/games', 'App\Http\Controllers\GameController@index')->name('game.index');
    Route::get('/games/search', 'App\Http\Controllers\GameController@search')->name('game.search');
    Route::get('/games/most-purchased', 'App\Http\Controllers\GameController@mostPurchased')->name('game.mostPurchased');

    // Categories
    Route::get('/categories/top-categories', 'App\Http\Controllers\CategoryController@topCategories')->name('category.topCategories');

    // Company
    Route::get('/companies/top-selling', 'App\Http\Controllers\CompanyController@topSellingGames')->name('company.topSellingGames');

    // Partners store
    Route::get('/partners/index', 'App\Http\Controllers\Service\PartnersStoreController@index')->name('partner.index');
});

// ========================== AUTH USER =================================
Route::middleware(['auth', LanguageMiddleware::class])->group(function () {
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
    Route::post('/games/{id}/generate-balance-gemini', 'App\Http\Controllers\GameController@generateBalanceGemini')->name('game.generateBalanceGemini');
    Route::post('/games/{id}/generate-balance-huggingface', 'App\Http\Controllers\GameController@generateBalanceHuggingFace')->name('game.generateBalanceHuggingFace');

    // Games (Admin)
    Route::get('/admin/games', 'App\Http\Controllers\Admin\AdminGameController@index')->name('admin-game.index');
    Route::get('/admin/games/create', 'App\Http\Controllers\Admin\AdminGameController@create')->name('admin-game.create');
    Route::post('/admin/games/save', 'App\Http\Controllers\Admin\AdminGameController@save')->name('admin-game.save');
    Route::get('/admin/games/{id}', 'App\Http\Controllers\Admin\AdminGameController@show')->name('admin-game.show');
    Route::get('/admin/games/{id}/edit', 'App\Http\Controllers\Admin\AdminGameController@edit')->name('admin-game.edit');
    Route::put('/admin/games/{id}', 'App\Http\Controllers\Admin\AdminGameController@update')->name('admin-game.update');
    Route::delete('/admin/games/{id}', 'App\Http\Controllers\Admin\AdminGameController@destroy')->name('admin-game.destroy');

    // Reviews
    Route::get('/admin/reviews', 'App\Http\Controllers\Admin\AdminReviewController@index')->name('admin-review.index');
    Route::get('/admin/reviews/create', 'App\Http\Controllers\Admin\AdminReviewController@create')->name('admin-review.create');
    Route::post('/admin/reviews/save', 'App\Http\Controllers\Admin\AdminReviewController@save')->name('admin-review.save');
    Route::get('/admin/reviews/{id}', 'App\Http\Controllers\Admin\AdminReviewController@show')->name('admin-review.show');
    Route::delete('/admin/reviews/{id}', 'App\Http\Controllers\Admin\AdminReviewController@destroy')->name('admin-review.destroy');

    // Categories
    Route::get('/admin/categories', 'App\Http\Controllers\Admin\AdminCategoryController@index')->name('admin-category.index');
    Route::get('/admin/categories/create', 'App\Http\Controllers\Admin\AdminCategoryController@create')->name('admin-category.create');
    Route::post('/admin/categories/save', 'App\Http\Controllers\Admin\AdminCategoryController@save')->name('admin-category.save');
    Route::get('/admin/categories/{id}', 'App\Http\Controllers\Admin\AdminCategoryController@show')->name('admin-category.show');
    Route::delete('/admin/categories/{id}', 'App\Http\Controllers\Admin\AdminCategoryController@destroy')->name('admin-category.destroy');

    // Custom Users
    Route::get('/admin/custom-users', 'App\Http\Controllers\Admin\AdminCustomUserController@index')->name('admin-custom-user.index');
    Route::get('/admin/custom-users/create', 'App\Http\Controllers\Admin\AdminCustomUserController@create')->name('admin-custom-user.create');
    Route::post('/admin/custom-users/save', 'App\Http\Controllers\Admin\AdminCustomUserController@save')->name('admin-custom-user.save');
    Route::get('/admin/custom-users/{id}', 'App\Http\Controllers\Admin\AdminCustomUserController@show')->name('admin-custom-user.show');
    Route::get('/admin/custom-users/{id}/edit', 'App\Http\Controllers\Admin\AdminCustomUserController@edit')->name('admin-custom-user.edit');
    Route::put('/admin/custom-users/{id}', 'App\Http\Controllers\Admin\AdminCustomUserController@update')->name('admin-custom-user.update');
    Route::delete('admin/custom-users/{id}', 'App\Http\Controllers\Admin\AdminCustomUserController@destroy')->name('admin-custom-user.destroy');
});

// ========================== ERRORS =================================
Route::get('/errors/nonexistent', 'App\Http\Controllers\ErrorController@nonexistent')->name('error.nonexistent');

// ========================== AUTH =================================
Auth::routes();
