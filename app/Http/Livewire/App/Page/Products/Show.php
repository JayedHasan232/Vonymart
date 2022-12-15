<?php

namespace App\Http\Livewire\App\Page\Products;

use Livewire\Component;
use Session;
use App\Helpers\CartManagementHelper as CMH;
use App\Models\Wishlist;

class Show extends Component
{

    public $product;
    public $alreadyExists;
    public $qty = 1;

    public function mount($product)
    {
        $this->product = $product;
        $this->product->increment('view_count');
        $this->alreadyExists = Wishlist::where('product_id', $this->product->id)
            ->where('created_by', auth()->id())
            ->exists();
    }

    public function addToWishlist()
    {
        if (auth()->check()) {

            if (!$this->alreadyExists) {
                Wishlist::create([
                    'product_id' => $this->product->id,
                    'created_by' => auth()->id(),
                    'created_at' => now(),
                ]);
            }

            $this->alreadyExists = Wishlist::where('product_id', $this->product->id)
                ->where('created_by', auth()->id())
                ->exists();

            $this->emit('wishlistUpdated');
        } else {
            return redirect(route('login'));
        }
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
