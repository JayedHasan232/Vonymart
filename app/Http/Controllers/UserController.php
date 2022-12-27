<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function changePassword()
    {
        return view('user.change-password');
    }

    public function orders()
    {
        return view('user.orders', [
            'orders' => auth()->user()->orders
        ]);
    }

    public function wishlist()
    {
        return view('user.wishlist', [
            'wishlist' => auth()->user()->wishlist
        ]);
    }
}
