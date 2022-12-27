<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategory as Category;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('privacy', 1)
            ->select('id', 'title', 'url', 'image')
            ->get();
        return view('app.category.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('app.category.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($category)
    {
        $category = Category::where('url', $category)
            ->where('privacy', 1)
            ->firstOrFail();
        return view('app.category.show', ['category' => $category]);
    }

    public function edit($category)
    {
        return view('app.category.edit');
    }

    public function update(Request $request, $category)
    {
        //
    }

    public function destroy($category)
    {
        //
    }
}
