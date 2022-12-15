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
        if (!session()->has('cart')) return redirect('/');

        $cart = new CMH(session()->get('cart'));
        $this->items = $cart->items;
        $this->totalQty = $cart->totalQty;
        $this->totalPrice = $cart->totalPrice;
    }

    public function render()
    {
        return view('livewire.app.page.shopping.checkout')->extends('layouts.app');
    }
}
