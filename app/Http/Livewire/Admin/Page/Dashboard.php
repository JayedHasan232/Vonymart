<?php

namespace App\Http\Livewire\Admin\Page;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.page.dashboard')->extends('layouts.admin');
    }
}
