<?php

namespace App\Http\Livewire\Admin\Page\Slider;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $qty = 12;

    public $keyword;

    public $totalSliders;

    public function mount()
    {
        $this->totalSliders = Slider::count();
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
        Slider::findOrFail($id)->delete();
    }

    public function render()
    {
        return view('livewire.admin.page.slider.index', [
            'sliders' => Slider::where('title', 'like', "%$this->keyword%")->paginate($this->qty),
        ])->extends('layouts.admin');
    }
}
