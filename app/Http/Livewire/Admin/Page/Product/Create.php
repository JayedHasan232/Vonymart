<?php

namespace App\Http\Livewire\Admin\Page\Product;

use Livewire\Component;
use Livewire\WithFileUploads;

use Str;

// Helpers
use App\Helpers\ImageResize as Image;

// Models
use App\Models\Product;
use App\Models\ProductBrand as Brand;
use App\Models\ProductCategory as Category;
use App\Models\ProductSubCategory as SubCategory;

class Create extends Component
{
    use WithFileUploads;

    public $brands;
    public $categories;
    public $sub_categories = [];

    public $title;
    public $url;
    public $description;
    public $privacy = 1;
    public $price;
    public $image;
    
    public $brand;
    public $category;
    public $sub_category;
    
    public $meta_title;
    public $meta_description;
    public $meta_keywords;

    public function mount()
    {
        $this->defaultData();
    }

    public function defaultData()
    {
        $this->brands = Brand::where('privacy', 1)
                            ->select('id', 'title')
                            ->orderBy('title')
                            ->get();
                            
        $this->categories = Category::where('privacy', 1)
                            ->select('id', 'title')
                            ->orderBy('title')
                            ->get();
    }

    public function updatedTitle()
    {
        $this->meta_title   = $this->title;
        $this->url          = Str::slug($this->title);
    }
    
    public function updatedCategory()
    {
        $this->sub_categories = SubCategory::where('privacy', 1)
                            ->where('category_id', $this->category)
                            ->select('id', 'title')
                            ->orderBy('title')
                            ->get();
    }

    public function updatedDescription()
    {
        $this->meta_description = $this->description;
    }

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'category' => 'required',
            'title' => 'required|string',
            'url' => 'required|string|unique:products',
        ]);

        $subcategory = Product::create([
            'privacy' => $this->privacy,
            'brand_id' => $this->brand,
            'category_id' => $this->category,
            'sub_category_id' => $this->sub_category,
            'title' => $this->title,
            'url' => $this->url,
            'description' => $this->description,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        if($subcategory && $this->image){

            $image = $this->image;
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

            $subcategory->update([
                "image" => $result->image,
                "image_medium" => $result->image_medium,
                "image_small" => $result->image_small,

                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);
        }

        $this->reset();

        $this->defaultData();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.page.product.create')->extends('layouts.admin');
    }
}
