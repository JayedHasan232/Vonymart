<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function sub_categories()
    {
        return $this->hasMany(\App\Models\ProductSubCategory::class, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'category_id');
    }
}
