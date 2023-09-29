<?php

namespace App\Http\Livewire\Admin\Page\Banner;

use App\Models\Banner;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $qty = 12;

    public $keyword;

    public $totalBanners;

    public function mount()
    {
        $this->totalBanners = Banner::count();
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
        Banner::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.page.banner.index', [
            'banners' => Banner::where('title', 'like', "%$this->keyword%")->paginate($this->qty),
        ])->extends('layouts.admin');
    }
}
