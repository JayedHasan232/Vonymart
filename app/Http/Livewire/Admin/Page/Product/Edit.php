<?php

namespace App\Http\Livewire\Admin\Page\Product;

use Livewire\Component;

class Edit extends Component
{
    public function render()
    {
        return view('livewire.admin.page.product.edit')->extends('layouts.admin');
    }
}
