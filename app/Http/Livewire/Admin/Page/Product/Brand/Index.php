<?php

namespace App\Http\Livewire\Admin\Page\Product\Brand;

use Livewire\Component;

// Models
use App\Models\ProductBrand as Brand;

class Index extends Component
{
    public $brands;

    public function mount()
    {
        $this->withTrashed();
    }

    public function deleteBrand($id)
    {
        Brand::findOrFail($id)->delete();
        $this->withTrashed();

        return back()->with('success', 'Success');
    }

    public function deleteBrandPermanently($id)
    {
        Brand::withTrashed()->findOrFail($id)->forceDelete();
        $this->withTrashed();

        return back()->with('success', 'Success');
    }

    public function restoreBrand($id)
    {
        Brand::withTrashed()->findOrFail($id)->restore();
        $this->withTrashed();

        return back()->with('success', 'Success');
    }

    public function withTrashed()
    {
        $this->brands = Brand::withTrashed()->get();
    }

    public function render()
    {
        return view('livewire.admin.page.product.brand.index')->extends('layouts.admin');
    }
}
