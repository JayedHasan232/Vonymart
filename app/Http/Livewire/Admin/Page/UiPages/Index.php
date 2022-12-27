<?php

namespace App\Http\Livewire\Admin\Page\UiPages;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\UiPage;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $qty = 12;
    public $keyword;
    public $totalPages;

    public function mount()
    {
        $this->totalPages = UiPage::count();
    }

    public function updatingQty()
    {
        $this->resetPage();
    }

    public function updatingKeyword()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        UiPage::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.page.ui-pages.index', [
            'pages' => UiPage::where('slug', 'like', "%$this->keyword%")->paginate($this->qty)
        ])->extends('layouts.admin');
    }
}
