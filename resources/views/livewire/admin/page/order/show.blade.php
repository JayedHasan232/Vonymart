@push('meta')
<title>{{ 'Order: ' . strtoupper($order->tracking_id) . ' | ' . config('app.name', 'Laravel') }}</title>
@endpush

<div class="">

    <div class="mb-4">
        <button wire:click="changeStatus(1)" class="btn btn-outline-dark" {{$order->order_status < 1 ? '' : 'disabled' }}>Mark as Processing</button>
        <button wire:click="changeStatus(2)" class="btn btn-outline-dark" {{$order->order_status < 2 ? '' : 'disabled' }}>Mark as Shipped</button>
        <button wire:click="changeStatus(3)" class="btn btn-outline-dark" {{$order->order_status < 3 ? '' : 'disabled' }}>Mark as Delivered</button>
    </div>

    <div class="card card-lg mb-5 border">
        <div class="card-body">
            <div class="card card-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 col-md">
                            <h6 class="heading-xxxs text-muted">Order No:</h6>
                            <p class="mb-lg-0 fs-sm fw-bold">
                                {{strtoupper($order->tracking_id)}}
                            </p>
                        </div>

                        <div class="col-6 col-md">
                            <h6 class="heading-xxxs text-muted">Order date:</h6>
                            <p class="mb-lg-0 fs-sm fw-bold">{{$order->created_at->format('d M, Y')}}</p>
                        </div>

                        <div class="col-6 col-md">
                            <h6 class="heading-xxxs text-muted">Status:</h6>
                            <p class="mb-0 fs-sm fw-bold">
                                {{$order->order_status == 0 ? 'Pending' : ''}}
                                {{$order->order_status == 1 ? 'Processing' : ''}}
                                {{$order->order_status == 2 ? 'Shipped' : ''}}
                                {{$order->order_status == 3 ? 'Delivered' : ''}}
                            </p>
                        </div>

                        <div class="col-6 col-md">
                            <h6 class="heading-xxxs text-muted">Order Amount:</h6>
                            <p class="mb-0 fs-sm fw-bold">BDT {{$order->total_price}}</p>
                        </div>

                        <div class="col-6 col-md">
                            <h6 class="heading-xxxs text-muted">Total Quantity:</h6>
                            <p class="mb-0 fs-sm fw-bold">{{$order->total_quantity}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <h6 class="my-3">Order Items ({{$order->total_quantity}})</h6>

            <ul class="list-group list-group-lg list-group-flush-y list-group-flush-x">
                @foreach($order->products as $product)
                <li class="list-group-item">
                    <div class="row align-items-center">
                        <div class="" style="height: 100px; width: 100px">
                            <img src="{{asset('storage/' . $product->image_small)}}"
                                class="flex-shrink-0 ratio ratio-1x1">
                        </div>
                        <div class="col">
                            <p class="fs-sm fw-bold">
                                {{$product->title}} x {{$product->pivot->quantity}}
                                <br>
                                <span class="text-muted">
                                    BDT {{$product->pivot->unit_price}}
                                </span>
                            </p>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="card card-lg mb-5 border">
        <div class="card-body">
            <h6 class="mb-3">Order Total</h6>

            <ul class="list-group list-group-sm list-group-flush-y list-group-flush-x">
                {{-- <li class="list-group-item d-flex">
                    <span>Subtotal</span>
                    <span class="ms-auto">
                        KD 332
                    </span>
                </li>
                <li class="list-group-item d-flex">
                    <span>Tax</span>
                    <span class="ms-auto">KD 6.64</span>
                </li>
                <li class="list-group-item d-flex">
                    <span>Packaging</span>
                    <span class="ms-auto">KD 1</span>
                </li>
                <li class="list-group-item d-flex">
                    <span>Shipping</span>
                    <span class="ms-auto">KD 15</span>
                </li> --}}
                <li class="list-group-item d-flex fs-lg fw-bold">
                    <span>Total</span>
                    <span class="ms-auto">BDT {{$order->total_price}}</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="card card-lg border">
        <div class="card-body">
            <h6 class="mb-3">Billing &amp; Shipping Details</h6>

            <div class="row">
                {{-- <div class="col-12 col-md-4">
                    <p class="mb-2 fw-bold">
                        Billing Address:
                    </p>

                    <p class="mb-7 mb-md-0 text-gray-500">
                        Jayed Hasan, <br>
                        Usthi, Gafargaon,
                        Mymensingh,
                        Bangladesh,
                        01871030727
                    </p>
                </div> --}}

                <div class="col-12 col-md-4">
                    <p class="mb-2 fw-bold">
                        Shipping Address:
                    </p>

                    <p class="mb-7 mb-md-0 text-gray-500">
                        {{$order->name}}, <br>
                        {{$order->shipping_address}},
                        {{$order->email}},
                        {{$order->phone}}
                    </p>
                </div>

                {{-- <div class="col-12 col-md-4">
                    <p class="mb-2 fw-bold">
                        Shipping Method:
                    </p>

                    <p class="mb-7 text-gray-500">
                        Standart Shipping <br>
                        (5 - 7 days)
                    </p>
                </div> --}}

                {{-- <div class="col-12 col-md-4">
                    <p class="mb-4 fw-bold">
                        Payment Method:
                    </p>

                    <p class="mb-0 text-gray-500">
                        Cash on Delivery
                    </p>
                </div> --}}
            </div>
        </div>
    </div>
</div>