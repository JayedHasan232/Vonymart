<?php

namespace App\Http\Livewire\Admin\Page\Product\Brand;

use App\Helpers\ImageResize as Image;
use App\Models\ProductBrand as Brand;
use Livewire\Component;
// Helpers
use Livewire\WithFileUploads;
// Models
use Str;

class Create extends Component
{
    use WithFileUploads;

    public $privacy = 1;

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
            'url' => 'required|string|unique:product_brands',
        ]);

        $brand = Brand::create([
            'privacy' => $this->privacy,
            'title' => $this->title,
            'url' => $this->url,
            'description' => $this->description,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        if ($brand && $this->image) {

            $image = $this->image;
            $dimension = (object) [
                'medium' => (object) [
                    'width' => 150,
                    'height' => 150,
                ],
                'small' => (object) [
                    'width' => 75,
                    'height' => 75,
                ],
            ];
            $path = 'products/brands';

            $result = Image::store($image, $dimension, $path);

            $brand->update([
                'image' => $result->image,
                'image_medium' => $result->image_medium,
                'image_small' => $result->image_small,

                'updated_by' => auth()->id(),
                'updated_at' => now(),
            ]);
        }

        $this->reset();

        return back()->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.page.product.brand.create')->extends('layouts.admin');
    }
}
