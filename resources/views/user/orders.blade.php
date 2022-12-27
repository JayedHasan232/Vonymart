@extends('layouts.app')

@push('stylesheets')

@endpush

@push('scripts')

@endpush

@push('meta')
<title>{{ config('app.name', 'Laravel') }}</title>
@endpush

@push('schema')

@endpush

@section('content')
<section class="py-5">
    <div class="container-xl">
        <div class="row">
            <div class="col-12 text-center">
                <h3 class="mb-5">Orders</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                @livewire('user.layout.sidebar')
            </div>

            <div class="col-md-9">
                @foreach ($orders as $order)
                <div class="card mb-3">
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
                                <p class="mb-lg-0 fs-sm fw-bold">{{$order->created_at}}</p>
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

                    <div class="card-footer bg-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="w-100 d-flex align-items-center gap-2">
                                @foreach($order->products as $product)
                                <div class="" style="height: 75px; width: 75px">
                                    <img src="{{asset('storage/' . $product->image_small)}}"
                                        class="flex-shrink-0 ratio ratio-1x1">
                                </div>
                                @endforeach
                            </div>

                            {{-- <div class="flex-shrink-0">
                                <a class="btn width-fit btn-outline-dark" href="">
                                    Order Details
                                </a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection