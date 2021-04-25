<?php

namespace App\Http\Livewire\App\Page;

use Livewire\Component;

class Developer extends Component
{
    public function render()
    {
        return view('livewire.app.page.developer')
            ->extends('layouts.app');
    }
}
