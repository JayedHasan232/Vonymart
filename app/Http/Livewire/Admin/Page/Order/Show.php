<?php

namespace App\Http\Livewire\Admin\Page\Order;

use Livewire\Component;

// Models
use App\Models\Order;

class Show extends Component
{
    public function mount(Order $order)
    {
        $this->order = $order;
    }

    public function changeStatus($status)
    {
        $this->order->order_status = $status;
        $this->order->save();
    }

    public function render()
    {
        return view('livewire.admin.page.order.show')->extends('layouts.admin');
    }
}
