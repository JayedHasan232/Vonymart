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

class Edit extends Component
{
    use WithFileUploads;

    public $brands;
    public $categories;
    public $sub_categories = [];
    public $product;

    public $title;
    public $url;
    public $description;
    public $specification;
    public $privacy;
    public $price;
    public $image;
    
    public $brand;
    public $category;
    public $sub_category;
    
    public $meta_title;
    public $meta_description;
    public $meta_keywords;

    public function mount($id)
    {
        $this->product = Product::findOrFail($id);
        $this->defaultData();

        $this->title = $this->product->title;
        $this->url = $this->product->url;
        $this->description = $this->product->description;
        $this->specification = $this->product->specification;
        $this->privacy = $this->product->privacy;
        $this->price = $this->product->price;
        $this->brand = $this->product->brand_id;
        $this->category = $this->product->category_id;
        $this->sub_category = $this->product->sub_category_id;
        $this->meta_title = $this->product->meta_title;
        $this->meta_description = $this->product->meta_description;
        $this->meta_keywords = $this->product->meta_keywords;
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

        $this->sub_categories = SubCategory::where('privacy', 1)
                            ->where('category_id', $this->product->category_id)
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

    public function render()
    {
        return view('livewire.admin.page.product.edit')->extends('layouts.admin');
    }
}
