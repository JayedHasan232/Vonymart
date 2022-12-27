<?php

namespace App\Http\Livewire\App\Layout;

use Livewire\Component;
use App\Models\Wishlist;
use App\Models\SiteInfo;
use Illuminate\Support\Facades\Session;

class Navbar extends Component
{
    public $productsInWishlist = 0;
    public $productsInCart = 0;

    protected $listeners = ['wishlistUpdated', 'cartUpdated'];

    public function mount()
    {
        $this->productsInWishlist = Wishlist::where('created_by', auth()->id())->count();
        $this->productsInCart = Session::get('cart')->totalQty ?? 0;
    }

    public function wishlistUpdated()
    {
        $this->productsInWishlist = Wishlist::where('created_by', auth()->id())->count();
    }

    public function cartUpdated()
    {
        $this->productsInCart = Session::has('cart') ? Session::get('cart')->totalQty : NULL;
    }

    public function render()
    {
        return view('livewire.app.layout.navbar');
    }
}
