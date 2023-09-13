<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubCategory;
use Exception;

class ShortUrlDynamicDataController extends Controller
{
    public function show($url)
    {
        try {
            $product = Product::where('url', $url)
                ->where('privacy', 1)
                ->firstOrFail();

            $product->view_count += 1;
            $product->save();

            return view('app.products.show', compact('product'));
        } catch (Exception $e) {
            // dd('Product', $e->getMessage());

            try {
                $category = ProductCategory::with(['sub_categories' => function ($query) {
                    $query->where('privacy', 1);
                }])
                    ->where('url', $url)
                    ->where('privacy', 1)
                    ->firstOrFail();

                return view('app.category.show', compact('category'));
            } catch (Exception $e) {
                // dd('Category', $e->getMessage());

                try {
                    $sub_category = ProductSubCategory::with('parent')
                        ->where('url', $url)
                        ->where('privacy', 1)
                        ->firstOrFail();

                    return view('app.sub_category.show', compact('sub_category'));
                } catch (Exception $e) {
                    // dd('Subcategory', $e->getMessage());
                    abort(404);
                }
            }
        }
    }
}
