<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

class AppController extends Controller
{
    public function welcome()
    {
        return view('app.welcome');
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
