<?php

namespace App\Http\Livewire\App\Page\Products;

use Livewire\Component;

class Show extends Component
{
    public $product;

    public function mount($product)
    {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.app.page.products.show');
    }
}
