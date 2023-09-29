<?php

namespace App\Http\Controllers;

use App\Models\ProductSubCategory as SubCategory;
use Illuminate\Http\Request;

class ProductSubCategoryController extends Controller
{
    public function index()
    {
        return view('app.sub_category.index');
    }

    public function create()
    {
        return view('app.sub_category.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($category, $subcategory)
    {
        $sub_category = SubCategory::where('url', $subcategory)
            ->where('privacy', 1)
            ->firstOrFail();

        return view('app.sub_category.show', compact('sub_category'));
    }

    public function edit($sub_category)
    {
        return view('app.sub_category.edit');
    }

    public function update(Request $request, $sub_category)
    {
        //
    }

    public function destroy($sub_category)
    {
        //
    }
}
