<?php

namespace App\Http\Livewire\Admin\Page\Product;

use App\Models\ProductBrand as Brand;
use App\Models\ProductCategory as Category;
use App\Models\ProductSubCategory as SubCategory;
// Models
use Livewire\Component;
use Livewire\WithFileUploads;
use Str;

class Create extends Component
{
    use WithFileUploads;

    public $brands;

    public $categories;

    public $sub_categories = [];

    public $title;

    public $url;

    public $brand;

    public $category;

    public $sub_category;

    public $meta_title;

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

    public function render()
    {
        return view('livewire.admin.page.product.create')->extends('layouts.admin');
    }
}
