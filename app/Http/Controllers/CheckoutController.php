<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function place_order(Request $request)
    {
        try {

            $cart = session()->has('cart') ? session()->get('cart') : null;
            $items = $cart ? $cart->items : null;

            // Preparing order products
            $order_products = collect();
            if (count($items)) {
                foreach ($items as $key => $item) {
                    $product = Product::find($key);

                    $order_products = $order_products->push([
                        "product_id" => $product->id,
                        "quantity" => $item['qty'],
                        "unit_price" => $product->price,
                        "total_price" => $product->price * $item['qty'],
                    ]);
                }
            }

            DB::beginTransaction();
            $order = Order::create([
                'user_id' => auth()->id(),
                'tracking_id' => Str::lower(Str::random(2)) . rand(1, 9999),
                'total_quantity' => $order_products->sum('quantity'),
                'total_price' => $order_products->sum('total_price'),
                'payment_method' => $request->payment_method,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'alt_phone' => $request->alt_phone,
                'billing_address' => $request->address,
                'shipping_address' => $request->address,
                'shipping_alt_address' => $request->shipping_alt_address,
                'note' => $request->note,
            ]);

            $order_products = $order_products->map(function ($order_product) use ($order) {
                return collect($order_product)->merge(['order_id' => $order->id])->toArray();
            });

            foreach ($order_products as $item) {
                OrderProduct::create($item);
            }

            DB::commit();
            session()->forget('cart');

            return redirect('/');
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
        }
    }
}
