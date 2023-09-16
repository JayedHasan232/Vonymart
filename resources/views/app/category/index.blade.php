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
    <div class="{{ env('BS_CONTAINER') }}">

        <div class="sec-head d-block">
            <div class="tw-flex tw-items-center tw-gap-2">
                <a href="{{ route('welcome') }}" class="tw-flex tw-items-center tw-gap-1">
                    {{ __( 'Home' ) }}
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                    </svg>
                </a>
            </div>
            <h2 class="sec-title">Categories</h2>
        </div>

        <div class="row g-2 g-md-4">
            @foreach($categories as $category)
            <div class="col-6 col-md-2">
                <a href="{{ route('short-url-dynamic-data-show', $category->url) }}"
                    class="d-flex flex-column justify-content-center align-items-center border"
                    style="border-radius: 1em; padding: 0.5em 1em" title="{{ __( $category->title ) }}">
                    <img style="height: 50px" src="{{ asset('storage/' . $category->image) }}">
                    <div class="">{{ __( $category->title ) }}</div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection