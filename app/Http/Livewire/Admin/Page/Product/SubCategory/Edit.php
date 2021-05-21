<?php

namespace App\Http\Livewire\Admin\Page\Product\SubCategory;

use Livewire\Component;
use Livewire\WithFileUploads;

use Str;
use Storage;

// Helpers
use App\Helpers\ImageResize as Image;

// Models
use App\Models\ProductCategory as Category;
use App\Models\ProductSubCategory as SubCategory;

class Edit extends Component
{
    use WithFileUploads;
    
    public $categories;
    public $subcategory;

    public $privacy;
    public $category;
    public $title;
    public $url;
    public $description;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;
    public $image;

    public function mount($id)
    {
        $this->categories = Category::where('privacy', 1)->get();
        $this->subcategory = SubCategory::findOrFail($id);

        $this->privacy = $this->subcategory->privacy;
        $this->category = $this->subcategory->category_id;
        $this->title = $this->subcategory->title;
        $this->url = $this->subcategory->url;
        $this->description = $this->subcategory->description;
        $this->meta_title = $this->subcategory->meta_title;
        $this->meta_description = $this->subcategory->meta_description;
        $this->meta_keywords = $this->subcategory->meta_keywords;
    }

    public function updatedTitle()
    {
        $this->url = Str::slug($this->title);
        $this->meta_title = $this->title;
    }

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'category' => 'required',
            'title' => 'required|string',
            'url' => 'required|string',
        ]);

        if($this->url != $this->subcategory->url){
            $this->validate([
                'url' => 'unique:product_sub_categories',
            ]);
        }
        
        $this->subcategory->update([
            'privacy' => $this->privacy,
            'category_id' => $this->category,
            'title' => $this->title,
            'url' => $this->url,
            'description' => $this->description,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        if($this->image){
            
            Storage::delete($this->subcategory->image);
            Storage::delete($this->subcategory->image_medium);
            Storage::delete($this->subcategory->image_small);

            $image = $this->image;
            $dimension = (object) [
                'medium' => (object) [
                    'width' => 150,
                    'height' => 150,
                ],
                'small' => (object) [
                    'width' => 75,
                    'height' => 75,
                ]
            ];
            $path = "products/subcategories";

            $result = Image::store($image, $dimension, $path);

            $this->subcategory->update([
                "image" => $result->image,
                "image_medium" => $result->image_medium,
                "image_small" => $result->image_small,

                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);
        }

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.page.product.sub-category.edit')->extends('layouts.admin');
    }
}
