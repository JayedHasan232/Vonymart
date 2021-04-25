<?php

namespace App\Http\Livewire\App\Page;

use Livewire\Component;

class Contact extends Component
{
    public function render()
    {
        return view('livewire.app.page.contact')
            ->extends('layouts.app');
    }
}
