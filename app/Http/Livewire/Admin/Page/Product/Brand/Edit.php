<?php

namespace App\Http\Livewire\Admin\Page\Product\Brand;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('livewire.admin.page.product.brand.edit')->extends('layouts.admin');
    }
}
