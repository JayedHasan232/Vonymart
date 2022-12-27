<?php

namespace App\Http\Livewire\App\Page\Home;

use Livewire\Component;

use App\Models\ProductCategory as Category;
use App\Models\Slider;

class Hero extends Component
{
    public $categories;
    public $sliders;

    public function mount()
    {
        $this->categories = Category::where('privacy', 1)->get();
        $this->sliders = Slider::where('privacy', 1)
            ->orderBy('position', 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.app.page.home.hero');
    }
}
