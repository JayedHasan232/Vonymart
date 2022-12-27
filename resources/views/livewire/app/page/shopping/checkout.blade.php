@push('meta')
<!-- Primary Meta Tags -->
<title>{{ config('app.name', 'Laravel') }}</title>
<meta name="title" content="">
<meta name="description" property="og:description" content="">
<meta name="keywords" content="">

<!-- Open Graph / Facebook -->
<meta property="og:url" content="">
<meta property="og:title" content="">
<meta property="og:description" content="">
<meta property="og:image" content="">

<!-- Twitter -->
<meta property="twitter:url" content="">
<meta property="twitter:title" content="">
<meta property="twitter:description" content="">
<meta property="twitter:image" content="">
@endpush

<section class="py-5">
    <div class="{{ env('BS_CONTAINER') }}">
        <form class="row g-5" action="{{route('place_order')}}" method="post">
            @csrf
            <div class="col-md-7">
                <div class="billing-details">
                    <h3 class="d-block">Billing Details</h3>
                    <small class="text-muted mb-5">Edit informations, if you want to ship to a different address</small>
                    <div class="row g-3 mt-3">
                        <div class="form-group col-md-6">
                            <label class="form-label" for="name">Name*</label>
                            <input class="form-control" type="text" name="name" placeholder="Name"
                                value="{{ old('name', auth()->user()->name) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="email">Email*</label>
                            <input class="form-control" type="text" name="email" placeholder="Email"
                                value="{{ old('email', auth()->user()->email) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="phone">Phone*</label>
                            <input class="form-control" type="text" name="phone" placeholder="Phone" value="01871030727"
                                value="{{ old('phone', auth()->user()->phone) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="alt_phone">Alternative phone</label>
                            <input class="form-control" type="text" name="alt_phone" placeholder="(Optional)"
                                value="{{ old('alt_phone', auth()->user()->alt_phone) }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="address">Address*</label>
                            <textarea class="form-control" name="address" placeholder="Address"
                                required>Mirpur {{ old('address') }}</textarea>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label" for="shipping_alt_address">Alternative shipping address</label>
                            <textarea class="form-control" name="shipping_alt_address"
                                placeholder="(Optional)">{{ old('shipping_alt_address') }}</textarea>
                        </div>
                        <div class="form-group col-md-8">
                            <label class="form-label" for="note">Your note</label>
                            <textarea class="form-control" name="note"
                                placeholder="(Optional)">{{ old('note') }}</textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label" for="payment_method">Payment method*</label>
                            <select class="form-control" name="payment_method" required>
                                <option value="1">Cash on Delivery</option>
                                <option value="2">Mobile Banking</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="order-details">
                    <h3 class="my-3">Order Details</h3>
                    <table class="table table-bordered">
                        <thead>
                            <th>Products</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </thead>
                        <tbody>
                            @foreach($items as $product)
                            <tr>
                                <td class="font-weight-bold">{{ $product['item']->title }}</td>
                                <td>{{ $product['qty'] }}</td>
                                <td>৳ {{ $product['item']->price }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="font-weight-bold">Shipping</td>
                                <td colspan="2">Call us</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Sub Total</td>
                                <td colspan="2">৳ {{ round($totalPrice) }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Discount</td>
                                <td colspan="2">৳ {{ round($totalDiscount) }}</td>
                            </tr>
                            <tr>
                                <td class="font-weight-bold">Grand Total</td>
                                <td colspan="2">৳ {{ round($totalPrice - $totalDiscount) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="btn bg-great text-white mt-3" type="submit">Place Order</button>
                </div>
            </div>
        </form>
    </div>
</section>