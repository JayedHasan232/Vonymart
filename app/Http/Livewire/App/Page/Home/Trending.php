<?php

namespace App\Http\Livewire\App\Page\Home;

use Livewire\Component;

use App\Models\Product;

class Trending extends Component
{
    public $qty;
    public $link;
    public $classNames;
    public $products;

    public function mount($qty, $link = '', $classNames = '')
    {
        $this->qty = $qty;
        $this->link = $link == 'visible' ? 1 : 0;
        $this->classNames = $classNames;
        $this->products = Product::where('privacy', 1)
                                ->select('id', 'title', 'url', 'price', 'category_id', 'image_medium')
                                ->latest()
                                ->get()
                                ->take($this->qty);
    }

    public function render()
    {
        return view('livewire.app.page.home.trending');
    }
}
