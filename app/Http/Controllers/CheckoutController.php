<?php

namespace App\Http\Controllers;

use App\Mail\NewOrder;
use App\Mail\OrderPlaced;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function place_order(Request $request)
    {
        try {
            $cart = session()->has('cart') ? session()->get('cart') : null;
            $items = $cart ? $cart->items : null;

            // Preparing order products
            $order_products = collect();
            $discount = 0;

            if (count($items)) {
                foreach ($items as $key => $item) {
                    $product = Product::find($key);

                    $order_products = $order_products->push([
                        "product_id" => $product->id,
                        "quantity" => $item['qty'],
                        "unit_price" => $product->price,
                        "total_price" => $product->price * $item['qty'],
                    ]);

                    $discount += ($product->price / 100 * $product->discount_rate) * $item['qty'];
                }
            }

            DB::beginTransaction();
            $order = Order::create([
                'user_id' => auth()->id(),
                'tracking_id' => Str::lower(Str::random(2)) . rand(1, 9999),
                'total_quantity' => $order_products->sum('quantity'),
                'discount' => $discount,
                'total_price' => $order_products->sum('total_price') - $discount,
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

                // Decrease stock_count
                $product = Product::find($item['product_id'])->decrement('stock_count', $item['quantity']);
            }

            DB::commit();
            Mail::to(auth()->user()->email)->send(new OrderPlaced($order));
            Mail::to('admin@alokmart.com')->send(new NewOrder($order));

            session()->forget('cart');
            return redirect()->route('thanks', $order);
        } catch (Exception $exception) {
            DB::rollBack();
            dd($exception->getMessage());
            return abort(500);
        }
    }

    public function thanks($order)
    {
        $order = Order::latest()->first();
        return view('livewire.app.page.shopping.thanks', compact('order'));
    }
}
