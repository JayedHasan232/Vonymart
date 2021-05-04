<?php

namespace App\Http\Livewire\Admin\Page\Product\Brand;

use Livewire\Component;

use Str;

// Models
use App\Models\ProductBrand as Brand;

class Edit extends Component
{
    public $brand;
    
    public $title;
    public $meta_title;
    public $url;
    
    public $description;
    public $meta_description;

    public function mount($id)
    {
        $this->brand = Brand::findOrFail($id);
    }

    public function updatedTitle()
    {
        $this->meta_title = $this->title;
        $this->url = Str::slug($this->title);
    }
    
    public function updatedDescription()
    {
        $this->meta_description = $this->description;
    }

    public function render()
    {
        return view('livewire.admin.page.product.brand.edit')->extends('layouts.admin');
    }
}
