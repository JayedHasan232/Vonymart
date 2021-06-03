<?php

namespace App\Http\Livewire\Admin\Page\Product\Category;

use Livewire\Component;

// Models
use App\Models\ProductCategory as Category;

class Index extends Component
{
    public $categories;

    public function mount()
    {
        // Loading data
        $this->categoryWithTrashed();
    }

    public function deleteCategory($id)
    {
        // Finding category
        $categories = Category::findOrFail($id);
        
        // Soft deleting products
        foreach($categories->products as $product){
            $product->delete();
        }
        
        // Deleting category
        $categories->delete();

        // Reloading data
        $this->categoryWithTrashed();

        return back()->with('success', 'Success');
    }

    public function deleteCategoryPermanently($id)
    {
        // Finding category
        $categories = Category::withTrashed()->findOrFail($id);

        // Permanently deleting products
        $products = $categories->products()->withTrashed()->get();
        foreach($products as $product){
            $product->forceDelete();
        }
        
        // Permanently deleting category
        $categories->forceDelete();

        // Reloading data
        $this->categoryWithTrashed();

        return back()->with('success', 'Success');
    }

    public function restoreCategory($id)
    {
        // Finding category
        $categories = Category::withTrashed()->findOrFail($id);

        // Restoring category
        $categories->restore();

        // Restoring products
        $products = $categories->products()->withTrashed()->get();
        foreach($products as $product){
            $product->restore();
        }
        
        // Reloading data
        $this->categoryWithTrashed();

        return back()->with('success', 'Success');
    }

    public function categoryWithTrashed()
    {
        $this->categories = Category::withTrashed()->get();
    }

    public function render()
    {
        return view('livewire.admin.page.product.category.index')->extends('layouts.admin');
    }
}
