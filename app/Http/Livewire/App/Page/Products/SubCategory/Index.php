<?php

namespace App\Http\Livewire\App\Page\Products\SubCategory;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductBrand as Brand;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $sub_category;
    public $brands;

    public $totalProducts;
    public $initialQty = 12;
    public $qty = 12;
    public $brand = '';
    public $category;

    public function mount($sub_category)
    {
        $this->totalProducts = Product::where('privacy', 1)->count();
        $this->sub_category = $sub_category;
        $this->brands = Product::with(['brand' => function ($query) {
            $query->select('id', 'title');
        }])
            ->select('id', 'brand_id')
            ->where('sub_category_id', $sub_category->id)
            ->where('privacy', 1)
            ->get()->unique('brand_id')->pluck('brand');
    }

    public function loadMore()
    {
        $this->qty += $this->initialQty;
    }

    public function updatingBrand()
    {
        $this->qty = $this->initialQty;
        $this->resetPage();
    }

    public function resetFilter()
    {
        $this->brand = '';
        $this->category = '';
        $this->qty = $this->initialQty;
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::where('privacy', 1)
            ->where(function ($query) {
                $query->where('sub_category_id', $this->sub_category->id);
            })
            ->where(function ($query) {
                if ($this->brand != '') {
                    $query->where('brand_id', $this->brand);
                }
            })
            ->select('id', 'title', 'url', 'price', 'brand_id', 'category_id', 'sub_category_id', 'image')
            ->latest()
            ->paginate($this->qty);

        return view('livewire.app.page.products.sub-category.index', ['products' => $products]);
    }
}
