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
        // Loading data
        $this->brandWithTrashed();
    }

    public function deleteBrand($id)
    {
        // Finding brand
        $brand = Brand::findOrFail($id);
        
        // Soft deleting products
        foreach($brand->products as $product){
            $product->delete();
        }
        
        // Deleting brand
        $brand->delete();

        // Reloading data
        $this->brandWithTrashed();

        return back()->with('success', 'Success');
    }

    public function deleteBrandPermanently($id)
    {
        // Finding brand
        $brand = Brand::withTrashed()->findOrFail($id);

        // Permanently deleting products
        $products = $brand->products()->withTrashed()->get();
        foreach($products as $product){
            $product->forceDelete();
        }
        
        // Permanently deleting brand
        $brand->forceDelete();

        // Reloading data
        $this->brandWithTrashed();

        return back()->with('success', 'Success');
    }

    public function restoreBrand($id)
    {
        // Finding brand
        $brand = Brand::withTrashed()->findOrFail($id);

        // Restoring brand
        $brand->restore();

        // Restoring products
        $products = $brand->products()->withTrashed()->get();
        foreach($products as $product){
            $product->restore();
        }
        
        // Reloading data
        $this->brandWithTrashed();

        return back()->with('success', 'Success');
    }

    public function brandWithTrashed()
    {
        $this->brands = Brand::withTrashed()->get();
    }

    public function render()
    {
        return view('livewire.admin.page.product.brand.index')->extends('layouts.admin');
    }
}
