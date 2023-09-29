<?php

namespace App\Http\Livewire\App\Page\Shopping;

use App\Models\Order;
use Livewire\Component;

class OrderTracker extends Component
{
    public $order_id = 'zw726';

    public $order = null;

    public function mount()
    {
        // $this->order = Order::select('id', 'tracking_id', 'order_status', )->where('tracking_id', $this->order_id)->first();
        $this->order = Order::where('tracking_id', $this->order_id)->first();
    }

    public function track()
    {
        // $this->order = Order::select('id', 'tracking_id', 'order_status')->where('tracking_id', $this->order_id)->first();
        $this->order = Order::where('tracking_id', $this->order_id)->first();
    }

    public function render()
    {
        return view('livewire.app.page.shopping.order-tracker')->extends('layouts.app');
    }
}
