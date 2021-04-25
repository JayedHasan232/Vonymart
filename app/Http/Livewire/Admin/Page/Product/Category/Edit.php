<?php

namespace App\Http\Livewire\Admin\Page\Product\Category;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('livewire.admin.page.product.category.edit')->extends('layouts.admin');
    }
}
