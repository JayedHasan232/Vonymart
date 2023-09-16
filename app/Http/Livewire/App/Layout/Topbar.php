<?php

namespace App\Http\Livewire\App\Layout;

use Livewire\Component;
use App\Models\ProductCategory;

class Topbar extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = ProductCategory::where('privacy', 1)->get();
    }

    public function render()
    {
        return view('livewire.app.layout.topbar');
    }
}
