<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_products')->withPivot('id', 'product_variation_id', 'unit_price', 'quantity');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
