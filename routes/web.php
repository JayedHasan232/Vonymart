<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::namespace('\App\Http\Controllers')->group(function()
{

    // Auth
    Route::name('verification.')->prefix('email')->group(function()
    {
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


    // Admin
    Route::middleware('admin')->name('admin.')->prefix('admin')->group(function(){
        Route::resource('brands', ProductBrandController::class);
        Route::resource('caregories', ProductCategoryController::class);
        Route::resource('sub-caregories', ProductSubCategoryController::class);
    });

});


// Livewire
Route::namespace('App\Http\Livewire')->group(function()
{
    // App
    Route::namespace('App\Page')->group(function()
    {
        // App - About, Contact
        Route::get('about', About::class)->name('about');
        Route::get('contact', Contact::class)->name('contact');
        Route::get('developer', Developer::class)->name('developer');
    });

    // // User
    // Route::middleware('auth')->namespace('App\Page')->name('user.')->group(function()
    // {
    //     // Dashboard
    //     Route::get('dashboard', Dashboard::class)->name('dashboard');
    // });

    // Admin
    Route::middleware(['auth', 'admin'])->namespace('Admin\Page')->name('admin.')->prefix('admin')->group(function()
    {
        // Dashboard
        Route::get('dashboard', Dashboard::class)->name('dashboard');

        // Product
        Route::namespace('Product')->name('product.')->prefix('product')->group(function()
        {
            Route::get('create', Create::class)->name('create');
            Route::get('edit/{id}', Edit::class)->name('edit');
            
            Route::namespace('Brand')->name('brand.')->prefix('brand')->group(function()
            {
                Route::get('index', Index::class)->name('index');
                Route::get('create', Create::class)->name('create');
                Route::get('edit/{id}', Edit::class)->name('edit');
            });
            
            Route::namespace('Category')->name('category.')->prefix('category')->group(function()
            {
                Route::get('create', Create::class)->name('create');
                Route::get('edit/{id}', Edit::class)->name('edit');
            });
            
            Route::namespace('SubCategory')->name('sub-category.')->prefix('sub-category')->group(function()
            {
                Route::get('create', Create::class)->name('create');
                Route::get('edit/{id}', Edit::class)->name('edit');
            });
        });
    });
});
