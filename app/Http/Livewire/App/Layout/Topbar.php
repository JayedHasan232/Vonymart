<?php

namespace App\Http\Livewire\App\Layout;

use App\Models\ProductCategory;
use Livewire\Component;

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
