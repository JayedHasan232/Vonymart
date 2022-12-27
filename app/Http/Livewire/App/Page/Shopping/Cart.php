<?php

namespace App\Http\Livewire\App\Page\Shopping;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Helpers\CartManagementHelper as CMH;

class Cart extends Component
{
    public $items;
    public $totalQty;
    public $totalPrice;
    public $totalDiscount;

    public function mount()
    {
        $currentCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new CMH($currentCart);
        $this->items = $cart->items;
        $this->totalQty = $cart->totalQty;
        $this->totalPrice = $cart->totalPrice;
        $this->totalDiscount = $cart->totalDiscount;
    }

    public function plus($id)
    {
        $currentCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new CMH($currentCart);
        $cart->cartPlus($id);
        Session::put('cart', $cart);

        $this->items = $cart->items;
        $this->totalQty = $cart->totalQty;
        $this->totalPrice = $cart->totalPrice;
        $this->totalDiscount = $cart->totalDiscount;

        $this->emit('cartUpdated');
    }

    public function minus($id)
    {
        $currentCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new CMH($currentCart);
        $cart->cartMinus($id);
        Session::put('cart', $cart);

        $this->items = $cart->items;
        $this->totalQty = $cart->totalQty;
        $this->totalPrice = $cart->totalPrice;
        $this->totalDiscount = $cart->totalDiscount;

        $this->emit('cartUpdated');
    }

    public function removeItem($id)
    {
        // Check Cart Availablity
        $currentCart = Session::has('cart') ? Session::get('cart') : NULL;

        // Send Data to Cart Model
        $cart = new CMH($currentCart);
        $cart->cartItemRemove($id);
        Session::put('cart', $cart);

        // Destroy cart if empty
        if ($cart->items == NULL) {
            Session::forget('cart', $cart);
            $this->totalQty = 0;
        } else {
            $this->items = $cart->items;
            $this->totalQty = $cart->totalQty;
            $this->totalPrice = $cart->totalPrice;
            $this->totalDiscount = $cart->totalDiscount;
        }

        $this->emit('cartUpdated');

        return back()->with('status', 'Successfully removed!');
    }

    public function render()
    {
        return view('livewire.app.page.shopping.cart')->extends('layouts.app');
    }
}
