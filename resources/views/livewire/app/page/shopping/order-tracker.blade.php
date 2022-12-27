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
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h1>Order Tracker</h1>
            <p>Track your order status.</p>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-md-6 d-flex justify-content-center align-items-center gap-4 border p-5">
                <form wire:submit.prevent="track">
                    <div class="input-group">
                        <input wire:model.lazy="order_id" type="text" class="form-control" placeholder="Order Id"
                            required>
                        <button type="submit" class="btn btn-dark">Track Now</button>
                    </div>
                </form>
            </div>

            @if($order)
            <div class="col-md-6 d-flex align-items-center gap-2 border-top border-bottom border-end p-5">
                <span class="">Order Status:</span>
                <h2 class="">
                    {{$order->order_status == 1 ? 'Processsing' : ''}}
                    {{$order->order_status == 2 ? 'Shipped' : ''}}
                    {{$order->order_status == 3 ? 'Delivered' : ''}}
                </h2>
            </div>
            <div class="col-12 border-bottom border-start border-end pt-3">
                <table class="table table-bordered table-hover">
                    <tr>
                        <th width="50%">Order Id</th>
                        <td>{{$order->tracking_id}}</td>
                    </tr>
                    <tr>
                        <th width="50%">Payment Status</th>
                        <td>{{$order->payment_status ? 'Paid' : 'UnPaid'}}</td>
                    </tr>
                    <tr>
                        <th width="50%">Order Status</th>
                        <td>
                            {{$order->order_status == 1 ? 'Processsing' : ''}}
                            {{$order->order_status == 2 ? 'Shipped' : ''}}
                            {{$order->order_status == 3 ? 'Delivered' : ''}}
                        </td>
                    </tr>
                    <tr>
                        <th width="50%">Order Items</th>
                        <td>{{$order->total_quantity}}</td>
                    </tr>
                    <tr>
                        <th width="50%">Order Total</th>
                        <td>{{$order->total_price}}</td>
                    </tr>
                </table>
            </div>
            @endif
        </div>
    </div>
</section>