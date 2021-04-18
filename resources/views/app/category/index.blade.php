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

            <div class="sec-head d-block">
                <div class="breadcrumb m-0">
                    <a href="{{ route('welcome') }}" class="me-2 text-muted text-capitalize">
                        {{ __( 'Home' ) }}
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </a>
                </div>
                <h2 class="sec-title">Categories</h2>
            </div>

            <div class="row g-4">

            @foreach($categories as $category)
            
            <div class="col-6 col-md-3">

                @livewire('app.component.products.category', ['category' => $category])
                
            </div>
            
            @endforeach

            </div>
        </div>
    </section>
@endsection
