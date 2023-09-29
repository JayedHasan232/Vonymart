<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::namespace('\App\Http\Controllers')->group(function () {

    // Route::resource('products', ProductController::class)
    //     ->except(['index', 'show'])
    //     ->middleware(['auth']);

    // // Category
    // Route::resource('categories', ProductCategoryController::class)
    //     ->except(['index', 'show'])
    //     ->middleware(['auth']);

    // // Subcategory
    // Route::resource('sub-categories', ProductSubCategoryController::class)
    //     ->except(['index', 'show'])
    //     ->middleware(['auth']);

    // Admin
    Route::middleware('admin')->name('admin.')->prefix('admin')->group(function () {
        Route::resource('brands', ProductBrandController::class);
        Route::resource('caregories', ProductCategoryController::class);
        Route::resource('sub-caregories', ProductSubCategoryController::class);
    });
});

// Livewire
Route::namespace('App\Http\Livewire')->group(function () {

    // Admin
    Route::middleware(['auth', 'admin'])->namespace('Admin\Page')->name('admin.')->prefix('admin')->group(function () {
        // Dashboard
        Route::get('dashboard', Dashboard::class)->name('dashboard');

        // Order
        Route::namespace('Order')->name('orders.')->prefix('orders')->group(function () {
            Route::get('/', Index::class)->name('index');
            Route::get('show/{order}', Show::class)->name('show');
        });

        // Product
        Route::namespace('Product')->name('product.')->prefix('product')->group(function () {
            Route::get('/', Index::class)->name('index');
            Route::get('create', Create::class)->name('create');
            Route::post('store', [App\Http\Controllers\ProductController::class, 'store'])->name('store');
            Route::get('edit/{id}', Edit::class)->name('edit');
            Route::post('update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('update');

            Route::namespace('Brand')->name('brand.')->prefix('brand')->group(function () {
                Route::get('index', Index::class)->name('index');
                Route::get('create', Create::class)->name('create');
                Route::get('edit/{id}', Edit::class)->name('edit');
            });

            Route::namespace('Category')->name('category.')->prefix('category')->group(function () {
                Route::get('index', Index::class)->name('index');
                Route::get('create', Create::class)->name('create');
                Route::get('edit/{id}', Edit::class)->name('edit');
            });

            Route::namespace('SubCategory')->name('sub-category.')->prefix('sub-category')->group(function () {
                Route::get('index', Index::class)->name('index');
                Route::get('create', Create::class)->name('create');
                Route::get('edit/{id}', Edit::class)->name('edit');
            });
        });

        // Slider
        Route::namespace('Slider')->name('slider.')->prefix('slider')->group(function () {
            Route::get('/', Index::class)->name('index');
            Route::get('create', Create::class)->name('create');
            Route::get('edit/{slider}', Edit::class)->name('edit');
        });

        // Banner
        Route::namespace('Banner')->name('banner.')->prefix('banner')->group(function () {
            Route::get('/', Index::class)->name('index');
            Route::get('create', Create::class)->name('create');
            Route::get('edit/{banner}', Edit::class)->name('edit');
        });

        // UiPages
        Route::namespace('UiPages')->name('page.')->prefix('page')->group(function () {
            Route::get('/', Index::class)->name('index');
            Route::get('create', Create::class)->name('create');
            Route::get('edit/{page}', Edit::class)->name('edit');
        });

        // Site Informations
        Route::get('site-informations', SiteInfo::class)->name('site-info');
    });
});
