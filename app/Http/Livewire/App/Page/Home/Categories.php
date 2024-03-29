<?php

namespace App\Http\Livewire\App\Page\Home;

use App\Models\ProductCategory as Category;
use Livewire\Component;

class Categories extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::where('privacy', 1)
            ->where('isFeatured', 1)
            ->select('id', 'title', 'url', 'image')
            ->get()
            ->take(6);
    }

    public function render()
    {
        return view('livewire.app.page.home.categories');
    }
}
