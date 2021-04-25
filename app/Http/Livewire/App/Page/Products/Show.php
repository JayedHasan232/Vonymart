<?php

namespace App\Http\Livewire\App\Page\Products;

use Livewire\Component;
use Session;
use App\Helpers\CartManagementHelper as CMH;

class Show extends Component
{
    
    public $product;
    public $qty = 1;

    public function mount( $product )
    {
        $this->product = $product;
    }

    public function addToCart()
    {
        $currentCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new CMH($currentCart);
        $cart->add($this->product, $this->qty);

        Session::put('cart', $cart);

        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.app.page.products.show');
    }
}
