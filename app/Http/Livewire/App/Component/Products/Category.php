<?php

namespace App\Http\Livewire\App\Component\Products;

use Livewire\Component;

class Category extends Component
{
    public $category;

    public function mount($category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.app.component.products.category');
    }
}
