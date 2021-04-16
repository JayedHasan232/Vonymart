<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::namespace('\App\Http\Controllers')->group(function(){

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

});

