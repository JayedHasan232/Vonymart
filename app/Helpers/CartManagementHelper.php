<?php

namespace App\Helpers;

class CartManagementHelper
{
    // Initializing
    public $items = null;

    public $totalQty = 0;

    public $totalPrice = 0;

    public $totalDiscount = 0;

    // Receiving passed data from the cart Controller
    public function __construct($oldCart)
    {
        // Checking if $cart has value(s)
        if ($oldCart) {
            // Setting data to the properties
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalDiscount = $oldCart->totalDiscount;
        }
    }

    // Execute item adding commands
    public function add($product, $qty)
    {
        // Defining $id to add the product
        $id = $product->id;

        // Selecting parameters for the product to be stored in the item field
        $proInfo = (object) ['id' => $product->id, 'price' => $product->price, 'discount_rate' => $product->discount_rate, 'title' => $product->title, 'url' => $product->url, 'image' => $product->image_small];

        // Making array to be stored if there is no items/this item not exists in the $items property
        $item = ['qty' => 0, 'price' => $product->price, 'item' => $proInfo];

        // Checking if $items property has any value
        if ($this->items) {
            // Checking if $items property has this product already
            if (array_key_exists($id, $this->items)) {
                // Setting the product in the declared array
                $item = $this->items[$id];
            }
        }
        // Increasing qty
        $item['qty'] += $qty;
        // Adjusting total price for the product
        $item['price'] = $product->price * $item['qty'];
        // Storing new value in the existing product entry
        $this->items[$id] = $item;
        // Adjusting total qty in the entire cart
        $this->totalQty += $qty;
        // Adjusting total price in the entire cart
        $this->totalPrice += $product->price * $qty;
        $this->totalDiscount += ($product->price / 100 * $product->discount_rate);
    }

    // Execute item decrease commands
    public function cartMinus($id)
    {
        if ($this->items[$id]['qty'] > 1) {
            $this->items[$id]['qty']--;
            $this->items[$id]['price'] -= $this->items[$id]['item']->price;
            $this->totalQty--;
            $this->totalPrice -= $this->items[$id]['item']->price;
            $this->totalDiscount -= ($this->items[$id]['item']->price / 100 * $this->items[$id]['item']->discount_rate);
        }
    }

    // Execute item increase commands
    public function cartPlus($id)
    {
        if ($this->items[$id]['qty'] >= 1) {
            $this->items[$id]['qty']++;
            $this->items[$id]['price'] += $this->items[$id]['item']->price;
            $this->totalQty++;
            $this->totalPrice += $this->items[$id]['item']->price;
            $this->totalDiscount += ($this->items[$id]['item']->price / 100 * $this->items[$id]['item']->discount_rate);
        }
    }

    // Execute item remove commands
    public function cartItemRemove($id)
    {
        $oldUnitQty = $this->items[$id]['qty'];
        $oldPrice = $this->items[$id]['price'];
        $oldDiscount = ($this->items[$id]['item']->price / 100 * $this->items[$id]['item']->discount_rate);

        unset($this->items[$id]);

        $this->totalQty -= $oldUnitQty;
        $this->totalPrice -= $oldPrice;
        $this->totalDiscount -= $oldDiscount;
    }
}
