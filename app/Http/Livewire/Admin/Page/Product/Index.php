<?php

namespace App\Http\Livewire\Admin\Page\Product;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Product;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $qty = 12;
    public $keyword;
    public $totalProducts;

    public function mount()
    {
        $this->totalProducts = Product::count();
    }

    public function updatingQty()
    {
        $this->resetPage();
    }

    public function updatingKeyword()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.page.product.index', [
            'products' => Product::where('title', 'like', "%$this->keyword%")->paginate($this->qty)
        ])->extends('layouts.admin');
    }
}
