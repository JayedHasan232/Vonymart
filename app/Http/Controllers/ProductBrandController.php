<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Storage;
use App\Helpers\ImageResize as Image;

use App\Models\ProductBrand as Brand;

class ProductBrandController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'url' => 'required|unique:product_brands',
        ]);

        $brand = Brand::create([
            'privacy' => $request->privacy,

            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,

            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,

            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        // Checking if request has image
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $path = "products/brands/$brand->id";

            $size = ['m' => ['x' => 150, 'y' => 80], 's' => ['x' => 75, 'y' => 40]];

            $result = Image::storeIt($image, $path, $size);

            $brand->update([
                "image" => $result->image,
                "img_medium" => $result->img_medium,
                "img_small" => $result->img_small,

                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);
        }

        return back()->with('success', 'Success!');
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'url' => 'required',
        ]);        

        // Checking url existance
        if ($brand->url != $request->url) {
          $request->validate([
            'url' => 'unique:product_brands',
          ]);
        }

        // Changing products privacy
        if($brand->privacy != $request->privacy){
            
            $products = $brand->products()->where('privacy', $brand->privacy)->get();

            foreach($products as $product){
                $product->update(['privacy' => $request->privacy]);
            }
        }

        $brand->update([
            'privacy' => $request->privacy,

            'title' => $request->title,
            'url' => $request->url,
            'description' => $request->description,

            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,

            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        // Checking if request has image
        if ($request->hasFile('image')) {

            // Deleting old image
            Storage::delete($brand->image);
            Storage::delete($brand->img_medium);
            Storage::delete($brand->img_small);

            $image = $request->file('image');
            $path = "products/brands/$brand->id";

            $size = ['m' => ['x' => 150, 'y' => 80], 's' => ['x' => 75, 'y' => 40]];

            $result = Image::storeIt($image, $path, $size);

            $brand->update([
                "image" => $result->image,
                "img_medium" => $result->img_medium,
                "img_small" => $result->img_small,

                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);
        }

        return back()->with('success', 'Success!');
    }
}
