<?php

use App\Http\Controllers\AppController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

require __DIR__ . '/admin.php';
require __DIR__ . '/user.php';

// Livewire
Route::namespace('App\Http\Livewire')
    ->group(function () {
        // App
        Route::namespace('App\Page')
            ->group(function () {
                // App: Order
                Route::namespace('Shopping')
                    ->group(function () {
                        Route::get('cart', Cart::class)->name('cart');
                        Route::get('checkout', Checkout::class)->name('checkout')->middleware('auth');
                        Route::get('order-tracker', OrderTracker::class)->name('order-tracker');
                    });

                // App: About, Contact
                Route::get('about', About::class)->name('about');
                Route::get('contact', Contact::class)->name('contact');
                Route::get('privacy-policy', Policy::class)->name('policy');
                Route::get('terms-and-conditions', Terms::class)->name('terms');
                Route::get('developer', Developer::class)->name('developer');
            });
    });

Route::namespace('\App\Http\Controllers')
    ->group(function () {
        // Auth
        Route::name('verification.')
            ->prefix('email')
            ->group(function () {
                Route::get('verify', 'AuthController@verify')->middleware('auth')->name('notice');
                Route::get('verify/{id}/{hash}', 'AuthController@verifyCheck')->middleware(['auth', 'signed'])->name('verify');
                Route::post('verification-notification', 'AuthController@verificationNotification')->middleware(['auth', 'throttle:6,1'])->name('resend');
            });

        // App
        Route::get('/', [AppController::class, 'welcome'])->name('welcome');

        // App: Search
        Route::get('search', [AppController::class, 'search'])->name('search');
        Route::controller(CheckoutController::class)
            ->group(function () {
                Route::post('place-order', 'place_order')->name('place_order');
                Route::get('thanks/{order}', 'thanks')->name('thanks');
            });

        // Products
        Route::controller(ProductController::class)
            ->group(function () {
                Route::prefix('products')
                    ->name('products.')
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('trending', 'trendingProducts')->name('trending');
                        Route::get('recent', 'newProducts')->name('recent');
                        Route::get('/{product}', 'show')->name('show');
                    });
            });

        // Category
        Route::controller(ProductCategoryController::class)
            ->group(function () {
                Route::name('categories.')
                    ->group(function () {
                        Route::get('categories', 'index')->name('index');
                        Route::get('/{category}', 'show')->name('show');
                    });
            });

        // Subcategory
        Route::controller(ProductSubCategoryController::class)
            ->group(function () {
                Route::name('sub-categories.')
                    ->group(function () {
                        Route::get('sub-categories', 'index')->name('index');
                        Route::get('/{category}/{subcategory}', 'show')->name('show');
                    });
            });
    });
