<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(\App\Models\ProductCategory::class, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(\App\Models\Product::class, 'sub_category_id');
    }
}
