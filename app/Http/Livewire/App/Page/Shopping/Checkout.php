<?php

namespace App\Http\Livewire\App\Page\Shopping;

use Livewire\Component;
use Session;
use App\Helpers\CartManagementHelper as CMH;

class Checkout extends Component
{
    public $items;
    public $totalQty;
    public $totalPrice;

    public function mount()
    {
        $currentCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new CMH($currentCart);
        $this->items = $cart->items;
        $this->totalQty = $cart->totalQty;
        $this->totalPrice = $cart->totalPrice;
    }

    public function render()
    {
        return view('livewire.app.page.shopping.checkout')->extends('layouts.app');
    }
}
