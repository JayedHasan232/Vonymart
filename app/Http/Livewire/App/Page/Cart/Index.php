<?php

namespace App\Http\Livewire\App\Page\Cart;

use Livewire\Component;
use Session;
use App\Helpers\CartManagementHelper as CMH;

class Index extends Component
{
    public $items;
    public $totalQty;
    public $totalPrice;

    public function mount()
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new CMH($oldCart);
        $this->items = $cart->items;
        $this->totalQty = $cart->totalQty;
        $this->totalPrice = $cart->totalPrice;
    }

    public function plus($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new CMH($oldCart);
        $cart->cartPlus($id);
        Session::put('cart', $cart);
        
        $this->items = $cart->items;
        $this->totalQty = $cart->totalQty;
        $this->totalPrice = $cart->totalPrice;
    }

    public function minus($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : NULL;
        $cart = new CMH($oldCart);
        $cart->cartMinus($id);
        Session::put('cart', $cart);
        
        $this->items = $cart->items;
        $this->totalQty = $cart->totalQty;
        $this->totalPrice = $cart->totalPrice;
    }
    
    public function removeItem($id)
    {
      // Check Cart Availablity
      $oldCart = Session::has('cart') ? Session::get('cart') : NULL;
      
      // Send Data to Cart Model
      $cart = new CMH($oldCart);
      $cart->cartItemRemove($id);
      Session::put('cart', $cart);

      // Destroy cart if empty
      if ($cart->items == NULL) {
        Session::forget('cart', $cart);
        $this->totalQty = 0;
      }else{
        $this->items = $cart->items;
        $this->totalQty = $cart->totalQty;
        $this->totalPrice = $cart->totalPrice;
      }
      return back()->with('status', 'Successfully removed!');
    }

    public function render()
    {
        return view('livewire.app.page.cart.index');
    }
}
