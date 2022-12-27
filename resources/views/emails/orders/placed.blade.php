@component('mail::message')

@component('mail::panel')
Order placed
@endcomponent

Dear {{ $order->customer->name }}, we have just received your order.

<table width="100%" style="text-align: left; margin: 0 auto">
    <tr>
        <th style="padding: 8px 16px; color: #333;border: 1px solid #f2f2f2">Order Id</th>
        <td style="padding: 8px 16px; color: #222; border: 1px solid #f2f2f2">{{strtoupper($order->order_id)}}</td>
    </tr>
    <tr>
        <th style="padding: 8px 16px; color: #333;border: 1px solid #f2f2f2">Order Items</th>
        <td style="padding: 8px 16px; color: #222; border: 1px solid #f2f2f2">
            <table>
                <tr>
                    @foreach($order->products as $product)
                    <td>
                        <a href="{{ route('frontend_product_show', $product->slug) }}" target="_blank">
                            <img height="50" width="50" src="{{ asset('storage/' . $product->image) }}"
                                alt="{{$product->name}}" title="{{$product->name}}">
                        </a>
                    </td>
                    @endforeach
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <th style="padding: 8px 16px; color: #333;border: 1px solid #f2f2f2">Payment Method</th>
        <td style="padding: 8px 16px; color: #222; border: 1px solid #f2f2f2">
            {{$order->payment_method == 1 ? 'Cash on Delivery' : ''}}
            {{$order->payment_method == 2 ? 'Credit Card' : ''}}
            {{$order->payment_method == 3 ? 'Sharqiya Points' : ''}}
        </td>
    </tr>
    <tr>
        <th style="padding: 8px 16px; color: #333;border: 1px solid #f2f2f2">Shipping Method</th>
        <td style="padding: 8px 16px; color: #222; border: 1px solid #f2f2f2">Standart Shipping (5 - 7 days)</td>
    </tr>
    <tr>
        <th style="padding: 8px 16px; color: #333;border: 1px solid #f2f2f2">Subtotal</th>
        <td style="padding: 8px 16px; color: #222; border: 1px solid #f2f2f2">
            KD {{$order->total_price - $order->packaging_charge - $order->shipping_charge - $order->tax}}
        </td>
    </tr>
    <tr>
        <th style="padding: 8px 16px; color: #333;border: 1px solid #f2f2f2">Tax</th>
        <td style="padding: 8px 16px; color: #222; border: 1px solid #f2f2f2">KD {{$order->tax}}</td>
    </tr>
    <tr>
        <th style="padding: 8px 16px; color: #333;border: 1px solid #f2f2f2">Packaging</th>
        <td style="padding: 8px 16px; color: #222; border: 1px solid #f2f2f2">KD {{$order->packaging_charge}}</td>
    </tr>
    <tr>
        <th style="padding: 8px 16px; color: #333;border: 1px solid #f2f2f2">Shipping</th>
        <td style="padding: 8px 16px; color: #222; border: 1px solid #f2f2f2">KD {{$order->shipping_charge}}</td>
    </tr>
    <tr>
        <th style="padding: 8px 16px; color: #333;border: 1px solid #f2f2f2">Total Amount</th>
        <td style="padding: 8px 16px; color: #222; border: 1px solid #f2f2f2">KD {{$order->total_price}}</td>
    </tr>
    <tr>
        <th style="padding: 8px 16px; color: #333;border: 1px solid #f2f2f2">Billing Address</th>
        <td style="padding: 8px 16px; color: #222; border: 1px solid #f2f2f2">
            <p class="text-gray-500">
                {{$order->billingAddress->address_line_1}},
                {{$order->billingAddress->city->name}},
                {{$order->billingAddress->country->name}}
            </p>
        </td>
    </tr>
    <tr>
        <th style="padding: 8px 16px; color: #333;border: 1px solid #f2f2f2">Shipping Address</th>
        <td style="padding: 8px 16px; color: #222; border: 1px solid #f2f2f2">
            <p class="text-gray-500">
                {{$order->shippingAddress->address_line_1}},
                {{$order->shippingAddress->city->name}},
                {{$order->shippingAddress->country->name}}
            </p>
        </td>
    </tr>
</table>

@endcomponent