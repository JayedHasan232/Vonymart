<?php

namespace App\Http\Livewire\App\Component\Products;

use Livewire\Component;

class SubCategory extends Component
{
    public $sub_category;

    public function mount($sub_category)
    {
        $this->sub_category = $sub_category;
    }

    public function render()
    {
        return view('livewire.app.component.products.sub-category');
    }
}
