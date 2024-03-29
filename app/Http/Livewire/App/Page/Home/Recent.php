<?php

namespace App\Http\Livewire\App\Page\Home;

use App\Models\Product;
use Livewire\Component;

class Recent extends Component
{
    public $qty;

    public $link;

    public $products;

    public function mount($qty, $link = '')
    {
        $this->qty = $qty;
        $this->link = $link == 'visible' ? 1 : 0;
        $this->products = Product::where('privacy', 1)
            ->select('id', 'title', 'url', 'price', 'category_id', 'image')
            ->latest()
            ->get()
            ->take($this->qty);
    }

    public function render()
    {
        return view('livewire.app.page.home.recent');
    }
}
