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

class Edit extends Component
{
    use WithFileUploads;
    
    public $category;

    public $privacy;
    public $isFeatured;
    public $title;
    public $url;
    public $meta_title;
    public $description;
    public $meta_description;
    public $meta_keywords;
    public $image;

    public function mount($id)
    {
        $this->category = Category::findOrFail($id);

        $this->privacy = $this->category->privacy;
        $this->isFeatured = $this->category->isFeatured;
        $this->title = $this->category->title;
        $this->url = $this->category->url;
        $this->description = $this->category->description;
        $this->meta_title = $this->category->meta_title;
        $this->meta_description = $this->category->meta_description;
        $this->meta_keywords = $this->category->meta_keywords;
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
            'title' => 'required|string',
            'url' => 'required|string',
        ]);

        if($this->url != $this->category->url){
            $this->validate([
                'url' => 'unique:product_categories',
            ]);
        }

        $this->category->update([
            'privacy' => $this->privacy,
            'isFeatured' => $this->isFeatured,
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
            
            Storage::delete($this->category->image);
            Storage::delete($this->category->image_medium);
            Storage::delete($this->category->image_small);

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

            $this->category->update([
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
        return view('livewire.admin.page.product.category.edit')->extends('layouts.admin');
    }
}
