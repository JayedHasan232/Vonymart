<?php

namespace App\Http\Livewire\App\Layout;

use Livewire\Component;

use App\Models\SiteInfo as Info;

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
