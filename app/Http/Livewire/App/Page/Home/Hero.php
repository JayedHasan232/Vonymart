<?php

namespace App\Http\Livewire\App\Page\Home;

use App\Models\Slider;
use Livewire\Component;

class Hero extends Component
{
    public $sliders;

    public function mount()
    {
        $this->sliders = Slider::where('privacy', 1)
            ->orderBy('position', 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.app.page.home.hero');
    }
}
