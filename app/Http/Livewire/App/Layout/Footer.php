<?php

namespace App\Http\Livewire\App\Layout;

use App\Models\SiteInfo as Info;
use Livewire\Component;

class Footer extends Component
{
    public $info;

    public function mount()
    {
        $this->info = Info::find(1);
    }

    public function render()
    {
        return view('livewire.app.layout.footer');
    }
}
