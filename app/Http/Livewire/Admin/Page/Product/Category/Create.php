<?php

namespace App\Http\Livewire\Admin\Page\Product\Category;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.admin.page.product.category.create')->extends('layouts.admin');
    }
}
