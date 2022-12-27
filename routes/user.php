<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::prefix('user')
    ->name('user.')
    ->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('profile', 'profile')->name('profile');
            Route::get('change-password', 'changePassword')->name('change-password');
            Route::get('orders', 'orders')->name('orders');
            Route::get('wishlist', 'wishlist')->name('wishlist');
        });
    });
