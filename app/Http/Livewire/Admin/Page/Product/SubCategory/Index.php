<?php

namespace App\Http\Livewire\Admin\Page\Product\SubCategory;

use App\Models\ProductSubCategory as SubCategory;
// Models
use Livewire\Component;

class Index extends Component
{
    public $subcategories;

    public function mount()
    {
        // Loading data
        $this->subcategoryWithTrashed();
    }

    public function deleteSubCategory($id)
    {
        // Finding subcategory
        $subcategories = SubCategory::findOrFail($id);

        // Soft deleting products
        foreach ($subcategories->products as $product) {
            $product->delete();
        }

        // Deleting subcategory
        $subcategories->delete();

        // Reloading data
        $this->subcategoryWithTrashed();

        return back()->with('success', 'Success');
    }

    public function deleteSubCategoryPermanently($id)
    {
        // Finding subcategory
        $subcategories = SubCategory::withTrashed()->findOrFail($id);

        // Permanently deleting products
        $products = $subcategories->products()->withTrashed()->get();
        foreach ($products as $product) {
            $product->forceDelete();
        }

        // Permanently deleting subcategory
        $subcategories->forceDelete();

        // Reloading data
        $this->subcategoryWithTrashed();

        return back()->with('success', 'Success');
    }

    public function restoreSubCategory($id)
    {
        // Finding subcategory
        $subcategories = SubCategory::withTrashed()->findOrFail($id);

        // Restoring subcategory
        $subcategories->restore();

        // Restoring products
        $products = $subcategories->products()->withTrashed()->get();
        foreach ($products as $product) {
            $product->restore();
        }

        // Reloading data
        $this->subcategoryWithTrashed();

        return back()->with('success', 'Success');
    }

    public function subcategoryWithTrashed()
    {
        $this->subcategories = SubCategory::withTrashed()->get();
    }

    public function render()
    {
        return view('livewire.admin.page.product.sub-category.index')->extends('layouts.admin');
    }
}
