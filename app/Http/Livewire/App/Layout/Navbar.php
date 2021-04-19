<?php

namespace App\Http\Livewire\App\Layout;

use Livewire\Component;

class Navbar extends Component
{
    protected $listeners = ['cartUpdated' => '$refresh'];

    public function render()
    {
        return view('livewire.app.layout.navbar');
    }
}
