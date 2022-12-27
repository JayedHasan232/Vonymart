@extends('layouts.app')

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

@section('content')
<section class="py-5">
    <div class="{{ env('BS_CONTAINER') }}">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h1>Thanks!</h1>
            <p>Your order has been placed successfully.</p>
        </div>

        <div class="row justify-content-center mt-5">
            <div class="col-6 d-flex flex-column justify-content-center align-items-center">
                <strong class="text-muted">Order ID</strong>
                <h2 class="text-uppercase">{{$order->tracking_id}}</h2>
                <p class="text-muted">Please copy the order Id to track status.</p>
            </div>
        </div>
    </div>
</section>
@endsection