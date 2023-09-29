<?php

namespace App\Http\Livewire\App\Page\Search;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Result extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $totalProducts;

    public $initialQty = 12;

    public $qty = 12;

    public $keyword = '';

    public function mount($keyword)
    {
        $this->keyword = $keyword;
        $this->totalProducts = Product::where('privacy', 1)
            ->where(function ($query) {
                $query->where('title', 'like', '%'.$this->keyword.'%')
                    ->orWhere('description', 'like', '%'.$this->keyword.'%');
            })
            ->count();
    }

    public function loadMore()
    {
        $this->qty += $this->initialQty;
    }

    public function render()
    {
        $products = Product::where('privacy', 1)
            ->where(function ($query) {
                $query->where('title', 'like', '%'.$this->keyword.'%')
                    ->orWhere('description', 'like', '%'.$this->keyword.'%');
            })
            ->select('id', 'image', 'title', 'url', 'price', 'brand_id', 'category_id', 'sub_category_id')
            ->paginate($this->qty);

        return view('livewire.app.page.search.result', ['products' => $products]);
    }
}
