<?php

namespace App\Http\Livewire\Admin\Page\Product\Category;

use Livewire\Component;
use Livewire\WithFileUploads;

use Str;
use Storage;

// Helpers
use App\Helpers\ImageResize as Image;

// Models
use App\Models\ProductCategory as Category;

class Create extends Component
{
    use WithFileUploads;
    
    public $privacy = 1;
    public $isFeatured = 0;
    public $title;
    public $url;
    public $description;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;
    public $image;

    public function updatedTitle()
    {
        $this->url = Str::slug($this->title);
        $this->meta_title = $this->title;
    }

    public function updatedDescription()
    {
        $this->meta_description = $this->description;
    }

    public function store()
    {
        $this->validate([
            'privacy' => 'required',
            'title' => 'required|string',
            'url' => 'required|string|unique:product_categories',
        ]);

        $category = Category::create([
            'privacy' => $this->privacy,
            'isFeatured' => $this->isFeatured,
            'title' => $this->title,
            'url' => $this->url,
            'description' => $this->description,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        if($category && $this->image){

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
            $path = "products/categories";

            $result = Image::store($image, $dimension, $path);

            $category->update([
                "image" => $result->image,
                "image_medium" => $result->image_medium,
                "image_small" => $result->image_small,

                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);
        }

        $this->reset();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.page.product.category.create')->extends('layouts.admin');
    }
}
