<?php

namespace App\Http\Livewire\App\Component\Products;

use Livewire\Component;
use Session;
use App\Helpers\CartManagementHelper as CMH;

class Product extends Component
{
    public $product;
    public $qty = 1;

    public function mount( $product )
    {
        $this->product = $product;
    }

    public function addToCart()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new CMH( $oldCart );
        $cart->add($this->product, $this->qty);

        Session::put('cart', $cart);

        $this->emit('cartUpdated');
    }
    
    public function render()
    {
        return view('livewire.app.component.products.product');
    }
}
