<?php

namespace App\Http\Livewire\Admin\Page\UiPages;

use Livewire\Component;
use App\Models\UiPage;
use Str;

class Create extends Component
{
    public $slug;
    public $article;

    public function store()
    {
        $this->validate([
            'slug' => 'required',
            'article' => 'required',
        ]);

        UiPage::create([
            'slug' => Str::slug($this->slug),
            'article' => $this->article,
            'created_by' => auth()->id(),
            'created_at' => now(),
        ]);

        $this->reset();

        return redirect()->route('admin.page.index')->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.page.ui-pages.create')->extends('layouts.admin');
    }
}
