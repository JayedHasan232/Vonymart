<?php

namespace App\Http\Livewire\Admin\Page\Product\Brand;

use Livewire\Component;
use Livewire\WithFileUploads;

use Str;
use Storage;

// Helpers
use App\Helpers\ImageResize as Image;

// Models
use App\Models\ProductBrand as Brand;

class Edit extends Component
{
    use WithFileUploads;

    public $brand;

    public $privacy;
    public $title;
    public $url;
    public $description;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;
    public $image;

    public function mount($id)
    {
        $this->brand = Brand::findOrFail($id);

        $this->privacy = $this->brand->privacy;
        $this->title = $this->brand->title;
        $this->url = $this->brand->url;
        $this->description = $this->brand->description;
        $this->meta_title = $this->brand->meta_title;
        $this->meta_description = $this->brand->meta_description;
        $this->meta_keywords = $this->brand->meta_keywords;
    }

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
            'url' => 'required|string',
        ]);

        if($this->url != $this->brand->url){
            $this->validate([
                'url' => 'unique:product_brands',
            ]);
        }

        $this->brand->update([
            'privacy' => $this->privacy,
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
            
            Storage::delete($this->brand->image);
            Storage::delete($this->brand->image_medium);
            Storage::delete($this->brand->image_small);

            $image = $this->image;
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
            $path = "products/brands";

            $result = Image::store($image, $dimension, $path);

            $this->brand->update([
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
        return view('livewire.admin.page.product.brand.edit')->extends('layouts.admin');
    }
}
