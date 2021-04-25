<?php

namespace App\Http\Livewire\Admin\Page\Product\SubCategory;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.admin.page.product.sub-category.create')->extends('layouts.admin');
    }
}
