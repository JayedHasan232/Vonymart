<?php

namespace App\Http\Livewire\App\Layout;

use Livewire\Component;

class Navbar extends Component
{
    public $cart;

    protected $listeners = ['addedToCart' => 'updateCart'];

    public function updateCart()
    {
        $this->cart += 1;
    }

    public function render()
    {
        return view('livewire.app.layout.navbar');
    }
}
