<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function welcome()
    {
        return view('app.welcome', ['banners' => Banner::where('privacy', 1)->get()]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'keyword' => 'required|string',
        ]);

        return view('app.search', ['keyword' => $request->keyword]);
    }

    public function cart()
    {
        return view('app.cart.index');
    }
}
