<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\ImageResize as Image;

use App\Models\ProductBrand as Brand;

class ProductBrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $path = "products/brands/$brand->url";

            $size = ['m' => ['x' => 150, 'y' => 80], 's' => ['x' => 75, 'y' => 40]];

            $result = Image::storeIt($image, $path, $size);

            Brand::findOrfail($id)->update([
            "image" => $result->image,
            "img_medium" => $result->img_medium,
            "img_small" => $result->img_small,
            "updated_by" => Auth::id(),
            "updated_at" => Carbon::now(),
            ]);
        }

        return back()->with('success', 'Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function show(ProductBrand $productBrand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductBrand $productBrand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductBrand $productBrand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductBrand  $productBrand
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductBrand $productBrand)
    {
        //
    }
}
