<?php

namespace App\Http\Livewire\App\Component\Products;

use Livewire\Component;

class SubCategory extends Component
{
    public $subCategory;

    public function mount($subCategory)
    {
        $this->subCategory = $subCategory;
    }

    public function render()
    {
        return view('livewire.app.component.products.sub_category');
    }
}
