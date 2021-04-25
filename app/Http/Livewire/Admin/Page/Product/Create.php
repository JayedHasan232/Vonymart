<?php

namespace App\Http\Livewire\Admin\Page\Product;

use Livewire\Component;

use Str;

// Models
use App\Models\ProductBrand as Brand;
use App\Models\ProductCategory as Category;
use App\Models\ProductSubCategory as SubCategory;

class Create extends Component
{
    public $brands;
    public $categories;
    public $sub_categories = [];

    public $title;
    public $meta_title;
    public $url;
    
    public $brand;
    public $category;
    public $sub_category;
    
    public $description;
    public $meta_description;

    public function mount()
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
        $this->meta_title = $this->title;
        $this->url = Str::slug($this->title);
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

    public function render()
    {
        return view('livewire.admin.page.product.create')->extends('layouts.admin');
    }
}
