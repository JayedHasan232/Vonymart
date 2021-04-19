<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::namespace('\App\Http\Controllers')->group(function(){

    // Auth
    Route::name('verification.')->prefix('email')->group(function(){
        Route::get('verify', 'AuthController@verify')->middleware('auth')->name('notice');
        Route::get('verify/{id}/{hash}', 'AuthController@verifyCheck')->middleware(['auth', 'signed'])->name('verify');
        Route::post('verification-notification', 'AuthController@verificationNotification')->middleware(['auth', 'throttle:6,1'])->name('resend');
    });

    // App
    Route::get('/', 'AppController@welcome')->name('welcome');


    // Products
    Route::resource('products', ProductController::class)
        ->except(['index', 'show'])
        ->middleware(['auth']);
        
    Route::resource('products', ProductController::class)
        ->only(['index', 'show']);

    Route::get('trending-products', 'ProductController@trendingProducts')->name('products.trending');
    Route::get('new-products', 'ProductController@newProducts')->name('products.new');

    // Category
    Route::resource('categories', ProductCategoryController::class)
        ->except(['index', 'show'])
        ->middleware(['auth']);
        
    Route::resource('categories', ProductCategoryController::class)
        ->only(['index', 'show']);

    // Subcategory
    Route::resource('sub-categories', ProductSubCategoryController::class)
        ->except(['index', 'show'])
        ->middleware(['auth']);
        
    Route::resource('sub-categories', ProductSubCategoryController::class)
        ->only(['index', 'show']);

    
    // App - Search
    Route::get('search', 'AppController@search')->name('search');

    
    // App - Cart
    Route::get('cart', 'AppController@cart')->name('cart');

});

