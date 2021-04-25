<?php

namespace App\Http\Livewire\Admin\Page\Product\Brand;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.admin.page.product.brand.create')->extends('layouts.admin');
    }
}
