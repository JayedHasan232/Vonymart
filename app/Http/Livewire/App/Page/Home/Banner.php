<?php

namespace App\Http\Livewire\App\Page\Home;

use Livewire\Component;

class Banner extends Component
{
    public function mount($banner)
    {
        $this->banner = $banner;
    }

    public function render()
    {
        return view('livewire.app.page.home.banner');
    }
}
