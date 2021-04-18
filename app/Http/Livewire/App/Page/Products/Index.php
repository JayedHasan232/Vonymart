<?php

namespace App\Http\Livewire\App\Page\Products;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Product;
use App\Models\ProductBrand as Brand;
use App\Models\ProductCategory as Category;
use App\Models\ProductSubCategory as SubCategory;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public $brands;
    public $categories;
    public $sub_categories = [];
    
    public $totalProducts;
    public $initialQty = 12;
    public $qty = 12;
    public $brand = '';
    public $sub_category = '';
    public $category = '';

    public function mount()
    {
        $this->totalProducts = Product::where('privacy', 1)->count();
        $this->brands = Brand::where('privacy', 1)->get();
        $this->categories = Category::where('privacy', 1)->get();
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

    public function updatingCategory()
    {
        $this->qty = $this->initialQty;
        $this->resetPage();
        $this->sub_categories = SubCategory::where('privacy', 1)
                                            ->where('category_id', $this->category)
                                            ->get();
    }

    public function updatingSubCategory()
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
                            ->where(function($query){
                                if($this->brand != ''){
                                    $query->where('brand_id', $this->brand);
                                }
                            })
                            ->where(function($query){
                                if($this->category != ''){
                                    $query->where('category_id', $this->category);
                                }
                            })
                            ->where(function($query){
                                if($this->sub_category != ''){
                                    $query->where('sub_category_id', $this->sub_category);
                                }
                            })
                            ->select('id', 'title', 'url', 'price', 'brand_id', 'category_id', 'sub_category_id')
                            ->latest()
                            ->paginate($this->qty);

        return view('livewire.app.page.products.index', ['products' => $products]);
    }
}
