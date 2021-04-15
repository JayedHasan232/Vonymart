<?php

namespace App\Http\Livewire\App\Component\Products;

use Livewire\Component;

class Product extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }
    
    public function render()
    {
        return view('livewire.app.component.products.product');
    }
}
