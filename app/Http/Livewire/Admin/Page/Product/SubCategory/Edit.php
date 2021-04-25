<?php

namespace App\Http\Livewire\Admin\Page\Product\SubCategory;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('livewire.admin.page.product.sub-category.edit')->extends('layouts.admin');
    }
}
