<?php

namespace App\Http\Livewire\App\Page\Home;

use Livewire\Component;

use App\Models\ProductCategory as Category;

class Hero extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::where('privacy', 1)->get();
    }
    
    public function render()
    {
        return view('livewire.app.page.home.hero');
    }
}
