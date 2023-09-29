<?php

namespace App\Http\Livewire\Admin\Page\UiPages;

use App\Models\UiPage;
use Livewire\Component;
use Str;

class Edit extends Component
{
    public $slug;

    public $article;

    public function mount(UiPage $page)
    {
        $this->page = $page;

        $this->slug = $this->page->slug;
        $this->article = $this->page->article;
    }

    public function store()
    {
        $this->validate([
            'slug' => 'required',
            'article' => 'required',
        ]);

        $this->page->update([
            'slug' => Str::slug($this->slug),
            'article' => $this->article,
            'updated_by' => auth()->id(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.page.index')->with('success', 'Success!');
    }

    public function render()
    {
        return view('livewire.admin.page.ui-pages.edit')->extends('layouts.admin');
    }
}
