<?php

namespace App\Http\Livewire\App\Page;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.app.page.about')
            ->extends('layouts.app');
    }
}
