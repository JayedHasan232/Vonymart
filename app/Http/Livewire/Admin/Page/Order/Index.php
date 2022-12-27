<?php

namespace App\Http\Livewire\Admin\Page\Order;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Order;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $qty = 12;
    public $keyword;
    public $totalOrders;

    public function mount()
    {
        $this->totalOrders = Order::count();
    }

    public function updating()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.page.order.index', [
            'orders' => Order::paginate($this->qty)
        ])->extends('layouts.admin');
    }
}
