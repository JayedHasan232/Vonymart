<?php

namespace App\Http\Livewire\Admin\Page\Product\Brand;

use Livewire\Component;

// Models
use App\Models\ProductBrand as Brand;

class Edit extends Component
{
    public $brand;

    public function mount($id)
    {
        $this->brand = Brand::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.page.product.brand.edit')->extends('layouts.admin');
    }
}
