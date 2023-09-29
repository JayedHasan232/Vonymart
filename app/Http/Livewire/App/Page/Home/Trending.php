<?php

namespace App\Http\Livewire\App\Page\Home;

use App\Models\Product;
use Livewire\Component;

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
            ->where('show_in_trending', 1)
            ->select('id', 'view_count', 'title', 'url', 'price', 'category_id', 'image')
            ->orderByDesc('view_count')
            ->get()
            ->take($this->qty);
    }

    public function render()
    {
        return view('livewire.app.page.home.trending');
    }
}
