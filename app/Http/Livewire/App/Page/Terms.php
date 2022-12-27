<?php

namespace App\Http\Livewire\App\Page;

use App\Models\UiPage;
use Livewire\Component;

class Terms extends Component
{
    public function mount()
    {
        $this->article = UiPage::where('slug', 'terms-and-conditions')->firstOrFail()->article;
    }

    public function render()
    {
        return view('livewire.app.page.terms')
            ->extends('layouts.app');
    }
}
