<?php

namespace App\Http\Livewire\App\Page\Home;

use Livewire\Component;

use App\Models\Product;

class Recent extends Component
{
    public $products;

    public function mount()
    {
        $this->products = Product::where('privacy', 1)
                                    ->select('id', 'title', 'url', 'price', 'category_id')
                                    ->latest()
                                    ->get()
                                    ->take(4);
    }
    
    public function render()
    {
        return view('livewire.app.page.home.recent');
    }
}
