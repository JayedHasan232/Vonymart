<?php

namespace App\Http\Livewire\App\Page;

use App\Models\UiPage;
use Livewire\Component;

class Policy extends Component
{
    public function mount()
    {
        $this->article = UiPage::where('slug', 'privacy-policy')->firstOrFail()->article;
    }

    public function render()
    {
        return view('livewire.app.page.policy')
            ->extends('layouts.app');
    }
}
