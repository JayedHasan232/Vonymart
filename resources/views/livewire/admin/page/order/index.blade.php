@push('meta')
<title>{{ 'Orders | ' . config('app.name', 'Laravel') }}</title>
@endpush

<div class="box mb-5">
    <div class="header">
        Orders - ({{ $totalOrders }})
    </div>
    <div class="body table-responsive-sm">
        <div class="mb-3">
            <div class="row justify-content-start">
                <div class="col-md-2">
                    <label for="qty" class="me-2">Items:</label>
                    <div>
                        <input wire:model.lazy="qty" type="text" class="form-control" id="qty">
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="searech" class="me-2">Search:</label>
                    <div>
                        <input wire:model.debounce.1000ms="keyword" type="text" class="form-control" id="searech"
                            placeholder="Type title">
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-striped table-bordered align-middle">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Status</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Total Quantity</th>
                    <th scope="col" class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>
                        <a href="{{route('admin.orders.show', $order->id)}}"
                            class="text-decoration-none text-dark fw-bold">
                            {{ strtoupper($order->tracking_id) }}
                        </a>
                    </td>
                    <td>
                        {{$order->order_status == 0 ? 'Pending' : ''}}
                        {{$order->order_status == 1 ? 'Processing' : ''}}
                        {{$order->order_status == 2 ? 'Shipped' : ''}}
                        {{$order->order_status == 3 ? 'Delivered' : ''}}
                    </td>
                    <td>{{$order->total_price}}</td>
                    <td>{{$order->total_quantity}}</td>
                    <td class="text-end">
                        <div class="">
                            <a href="{{route('admin.orders.show', $order->id)}}" class="btn rounded-pill bg-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if( method_exists($orders,'links') )
        {{ $orders->links() }}
        @endif
    </div>
</div>