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
    <section class="section">
        <div class="container-xl">

            <div class="sec-head">
                <h2 class="sec-title">Categories</h2>
            </div>

            <div class="row g-4">
                <div class="col-6 col-md-3"></div>
            </div>
        </div>
    </section>
@endsection
