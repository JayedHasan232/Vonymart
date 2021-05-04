<?php

namespace App\Http\Livewire\Admin\Page\Product\Brand;

use Livewire\Component;

use Str;

// Models
use App\Models\ProductBrand as Brand;

class Create extends Component
{
    public $title;
    public $meta_title;
    public $url;
    
    public $description;
    public $meta_description;

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
        return view('livewire.admin.page.product.brand.create')->extends('layouts.admin');
    }
}
