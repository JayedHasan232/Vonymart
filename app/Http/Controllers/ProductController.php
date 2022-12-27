<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Helpers
use App\Helpers\ImageResize as Image;

// Models
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        return view('app.products.index');
    }

    public function trendingProducts()
    {
        return view('app.products.trending');
    }

    public function newProducts()
    {
        return view('app.products.new');
    }

    public function store(Request $request)
    {
        $request->validate([
            'privacy' => 'required',
            'category' => 'required',
            'title' => 'required|string',
            'url' => 'required|string|unique:products',
        ]);

        $product = Product::create([
            'privacy' => $request->privacy,
            'brand_id' => $request->brand,
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'title' => $request->title,
            'url' => $request->url,
            'price' => $request->price,
            'sku' => $request->sku,
            'stock_count' => $request->stock_count,
            'show_in_trending' => $request->show_in_trending,
            'discount_rate' => $request->discount_rate,
            'description' => $request->description,
            'specification' => $request->specification,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        if ($request->hasFile('image')) {

            $image = $request->image;
            $dimension = (object) [
                'medium' => (object) [
                    'width' => 255,
                    'height' => 255,
                ],
                'small' => (object) [
                    'width' => 102,
                    'height' => 102,
                ]
            ];
            $path = "products";

            $result = Image::store($image, $dimension, $path);

            $product->update([
                "image" => $result->image,
                "image_medium" => $result->image_medium,
                "image_small" => $result->image_small,

                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);
        }

        return back()->with('success', 'Success!');
    }

    public function show($product)
    {
        $product = Product::where('url', $product)
            ->where('privacy', 1)
            ->firstOrFail();

        $product->view_count += 1;
        $product->save();

        return view('app.products.show', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'privacy' => 'required',
            'category' => 'required',
            'title' => 'required|string',
            'url' => 'required|string',
        ]);

        if ($request->url != $product->url) {
            $request->validate([
                'url' => 'unique:products',
            ]);
        }

        $product->update([
            'privacy' => $request->privacy,
            'brand_id' => $request->brand,
            'category_id' => $request->category,
            'sub_category_id' => $request->sub_category,
            'title' => $request->title,
            'url' => $request->url,
            'price' => $request->price,
            'sku' => $request->sku,
            'stock_count' => $request->stock_count,
            'show_in_trending' => $request->show_in_trending,
            'discount_rate' => $request->discount_rate,
            'description' => $request->description,
            'specification' => $request->specification,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        if ($request->hasFile('image')) {

            Storage::delete($product->image);
            Storage::delete($product->image_medium);
            Storage::delete($product->image_small);

            $image = $request->image;
            $dimension = (object) [
                'medium' => (object) [
                    'width' => 150,
                    'height' => 80,
                ],
                'small' => (object) [
                    'width' => 75,
                    'height' => 40,
                ]
            ];
            $path = "products";

            $result = Image::store($image, $dimension, $path);

            $product->update([
                "image" => $result->image,
                "image_medium" => $result->image_medium,
                "image_small" => $result->image_small,

                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);
        }

        return back()->with('success', 'Success!');
    }
}
